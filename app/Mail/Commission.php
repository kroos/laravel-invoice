<?php

namespace App\Mail;

// load model
use App\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Carbon\Carbon;

class Commission extends Mailable
{
	use Queueable, SerializesModels;
	public $search;

	/**
	* Create a new message instance.
	*
	* @return void
	*/
	public function __construct($search)
	{
		$this->search = $search;
	}



	/**
	* Build the message.
	*
	* @return $this
	*/
	public function build()
	{
		$rt = Carbon::createFromFormat('Y-m', request('commission_on'));
		$fn = Users::findOrFail(request('id_user'))->name.'_'.date('F', mktime(0, 0, 0, $rt->month, 1)).'_'.$rt->year.'.pdf';
		// echo public_path().'/'.$fn."<br />";
		// echo storage_path().'/uploads/pdf/'.$fn.'<br />';
		// // echo request('commission_on');
		return $this->markdown('emails.commission')
					// ->from('address', 'name')
					// ->text('emails.orders.shipped_plain');
					->attach(storage_path().'/uploads/pdf/'.$fn)
		;
	}
}
