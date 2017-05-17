<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

// load model
use App\Sales;
use App\SalesItems;
use App\SlipPostage;
use App\Customers;
use App\Product;
use App\ProductCategory;
use App\Payments;
use App\SlipNumbers;
use App\SalesTax;
use App\SalesCustomers;
use App\Preferences;

class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;
    public $sales;

    public function __construct($sales)
    {
        $this->sales = $sales;
    }

    public function build()
    {
        // resolve filename to attach
        $scust = SalesCustomers::where(['id_sales' => $this->sales->id])->first();
        $client = Customers::findOrFail($scust->id_customer);
        $filename = 'Invoice for '.$client->client.'.pdf';

        // resolve sender i.e company
        $comp = Preferences::find(1);
        $sender = $comp->company_name;
        $sender_email = strtolower($comp->company_email);

        return $this->markdown('email.invoice')
            // ->from('address', 'name')
            ->from($sender_email, $sender)
            // ->text('emails.orders.shipped_plain');
            // ->replyTo($address, $name)
            ->subject(ucwords(strtolower($comp->company_name)).' Invoice #'.$this->sales->id)
            ->attach(storage_path().'/uploads/pdf/'.$filename);
    }
}
