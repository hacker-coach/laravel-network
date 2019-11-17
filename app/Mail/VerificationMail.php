<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The User instance.
     *
     * @var User
     */
    public $user;
    /**
     * The logMessage instance.
     *
     * @var logMessage
     */
    public $logMessage = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $logMessage)
    {
        $this->user = $user;
        $this->logMessage = $logMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('mail.verification')
                    ->with([
                        'logMessage' => (string)$this->logMessage
                    ]);
    }
}
