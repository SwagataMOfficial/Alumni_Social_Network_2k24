<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class VerificationDocumentRejectedMail extends Mailable
{  public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user The banned user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('AlumniJunction:Your Verification Document has been Rejected')
                    ->view('mails.account_reject')
                    ->with('user', $this->user);
    }
}
