<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $MailContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($MailContent)
    {
        $this->MailContent = $MailContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->MailContent['subject'])->view('mail.register');
    }
}
