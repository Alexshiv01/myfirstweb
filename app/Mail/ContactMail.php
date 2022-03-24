<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\pagescontroller;
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
 public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('Mail')
        // ->subject('A new contact email')
        // ->from('system@yoursite.com','system')
        // ->with('details',$this-details);
        return $this->subject('A new contact email')->view('emails.Mail');
    }
}
