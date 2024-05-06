<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportReply extends Mailable
{
    use Queueable, SerializesModels;

    public $query;
    public $reply;

    /**
     * Create a new message instance.
     *
     * @param string $query The support query text
     * @param string $reply The support reply text
     */
    public function __construct($query, $reply)
    {
        $this->query = $query;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Support Reply')->view('mails.support_reply');
    }
}