<?php

namespace App\Mail;

use App\Helpers\Messages;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $fullName;
    protected $actionURL;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullName, $actionURL)
    {
        $this->fullName = $fullName;
        $this->actionURL = $actionURL;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from'))
            ->subject('Reset Password')
            ->view('vendor.mail.reset-password')
            ->with('fullName', $this->fullName)
            ->with('actionURL', $this->actionURL);
    }
}
