<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $firstName;
    protected $amount;
    protected $month;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName, $amount, $month)
    {
        $this->firstName = $firstName;
        $this->amount = $amount;
        $this->month = $month;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from'))
            ->subject('Monthly Salary Payment')
            ->view('vendor.mail.salary-payment')
            ->with('firstName', $this->firstName)
            ->with('amount', $this->amount)
            ->with('month', $this->month);
    }
}
