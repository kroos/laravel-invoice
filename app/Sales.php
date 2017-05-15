<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function slippostageimage() {
		return $this->hasOne('App\SlipPostage', 'id_sales');
	}

	public function customer() {
		return $this->hasOne('App\SalesCustomers', 'id_sales');
	}

	public function invitems() {
		return $this->hasMany('App\SalesItems', 'id_sales');
	}

	public function slipnumber() {
		return $this->hasMany('App\SlipNumbers', 'id_sales');
	}

	public function salestaxes() {
		return $this->hasMany('App\SalesTax', 'id_sales');
	}

	public function salespayment() {
		return $this->hasMany('App\Payments', 'id_sales');
	}

	public function invuser() {
		return $this->belongsTo('App\User');
	}

	public static function graph()
	{
		return static::selectRaw('
									users.name,
									sales.id,
									sales.date_sale,
									products.product,
									sales_items.commission,
									sales_items.retail,
									sales_items.quantity,
									ROUND(
										sales_items.retail * sales_items.quantity,
										2
									)AS TotalAmount,
									 ROUND(
										sales_items.commission * sales_items.quantity,
										2
									)AS TotalCommission,
									 taxes.tax,
									 IFNULL(taxes.amount, 0) tax_charges,
									 ROUND(
										ROUND(
											sales_items.retail * sales_items.quantity,
											2
										)*(IFNULL(taxes.amount, 0) / 100),
										2
									)AS TotalTax,
									(
										ROUND(
											sales_items.retail * sales_items.quantity,
											2
										)+ ROUND(
											ROUND(
												sales_items.retail * sales_items.quantity,
												2
											)*(IFNULL(taxes.amount, 0) / 100),
											2
										)
									)AS GrandTotal,
									IFNULL(banks.bank,"NoBank") bank,
									IFNULL(payments.date_payment, "1970-01-01") AS date_payment,
									IFNULL(payments.amount, 0) AS PaymentAmount,
									customers.client,
									customers.client_phone,
									customers.client_email,
									slip_numbers.tracking_number
								')
						->join('sales_items', 'sales_items.id_sales', '=', 'sales.id')
						->join('products', 'sales_items.id_product', '=', 'products.id')
						->leftJoin('users', 'sales.id_user', '=', 'users.id')
						->leftJoin('sales_taxes', 'sales_taxes.id_sales', '=', 'sales.id')
						->leftJoin('taxes', 'taxes.id', '=', 'sales_taxes.id_tax')
						->leftJoin('payments', 'payments.id_sales', '=', 'sales.id')
						->leftJoin('banks', 'banks.id', '=', 'payments.id_bank')
						->leftJoin('sales_customers', 'sales_customers.id_sales', '=', 'sales.id')
						->leftJoin('customers', 'customers.id', '=', 'sales_customers.id_customer')
						->leftJoin('slip_numbers', 'slip_numbers.id_sales', '=', 'sales.id')
						->whereNull('sales.deleted_at')
						->whereNull('sales_items.deleted_at')
						->whereNull('payments.deleted_at')
						->whereNull('sales_taxes.deleted_at')
						->whereNull('sales_customers.deleted_at')
						->whereNull('slip_numbers.deleted_at');
	}

	public static function invoice_product()
	{
		return static::selectRaw('
							`users`.`name` AS `name`,
							`users`.`color` AS `color`,
							`sales`.`id` AS `id`,
							`sales`.`date_sale` AS `date_sale`,
							`products`.`product` AS `product`,
							`sales_items`.`commission` AS `commission`,
							`sales_items`.`retail` AS `retail`,
							`sales_items`.`quantity` AS `quantity`,
							round((`sales_items`.`retail` * `sales_items`.`quantity`),2)AS `TotalAmount`,
							round((`sales_items`.`commission` * `sales_items`.`quantity`),2)AS `TotalCommission`,
							`taxes`.`tax` AS `tax`,
							ifnull(`taxes`.`amount`, 0)AS `tax_charges`,
							round((round((`sales_items`.`retail` * `sales_items`.`quantity`),2)*(ifnull(`taxes`.`amount`, 0)/ 100)),2)AS `TotalTax`,
							(round((`sales_items`.`retail` * `sales_items`.`quantity`),2)+ round((round((`sales_items`.`retail` * `sales_items`.`quantity`),2)*(ifnull(`taxes`.`amount`, 0)/ 100)),2))AS `GrandTotal`
						')
						->join('sales_items', 'sales_items.id_sales', '=', 'sales.id')
						->join('products', 'sales_items.id_product', '=', 'products.id')
						->leftJoin( 'users', 'sales.id_user', '=', 'users.id' )
						->leftJoin( 'sales_taxes', 'sales_taxes.id_sales', '=', 'sales.id' )
						->leftJoin( 'taxes', 'taxes.id', '=', 'sales_taxes.id_tax' )
						->leftJoin( 'sales_customers', 'sales_customers.id_sales', '=', 'sales.id' )
						->leftJoin( 'customers', 'customers.id', '=', 'sales_customers.id_customer' )
						->whereNull( 'sales.deleted_at' )
						->whereNull( 'sales_items.deleted_at' )
						->whereNull( 'sales_taxes.deleted_at' )
						->whereNull( 'sales_customers.deleted_at' )
						->get();
	}

	public static function invoice_payment()
	{
		return static::Raw('
				(SELECT
					`users`.`name` AS `name`,
					`users`.`color` AS `color`,
					`sales`.`id` AS `id`,
					`sales`.`date_sale` AS `date_sale`,
					`banks`.`bank` AS `bank`,
					`payments`.`date_payment` AS `date_payment`,
					`payments`.`amount` AS `amount`
				FROM
					(
						(
							(
								`sales`
								LEFT JOIN `users` ON((`users`.`id` = `sales`.`id_user`)))
							JOIN `payments` ON((`sales`.`id` = `payments`.`id_sales`)))
						LEFT JOIN `banks` ON((`banks`.`id` = `payments`.`id_bank`)))
				) AS invoice_payment
			')
			->get();
	}
}
