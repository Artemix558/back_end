<?php

namespace App\Mail\user;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserSendCodeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email,$code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$code)
    {
        $this->email = $email;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.sendCode');
    }
}
