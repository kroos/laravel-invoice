<?php

namespace App\Mail;

use \App\Preferences;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function build()
    {
        $re = Preferences::find(1);
        return $this->markdown('email.contactus')
                ->from($re->company_email, $re->company_name)
                ->subject(ucwords(strtolower(request('subject'))));
    }
}
