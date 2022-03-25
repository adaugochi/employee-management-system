<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $firstName;
    protected $actionURL;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName, $actionURL)
    {
        $this->firstName = $firstName;
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
            ->subject('Welcome to ' . config('app.name', 'Laravel'))
            ->view('vendor.mail.set-password')
            ->with('firstName', $this->firstName)
            ->with('actionURL', $this->actionURL);
    }
}
