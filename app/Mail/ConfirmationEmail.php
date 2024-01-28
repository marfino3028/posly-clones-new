<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable
{
    use SerializesModels;

    public $user;
    public $confirmationLink;

    public function __construct($user, $confirmationLink)
    {
        $this->user = $user;
        $this->confirmationLink = $confirmationLink;
    }

    public function build()
    {
        return $this->view('emails.confirmation')
            ->subject('Email Confirmation');
    }
}
