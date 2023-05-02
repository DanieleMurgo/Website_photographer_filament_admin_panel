<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $mailSubtitle;
     public $mailBody;
     public $fromAddress;
     public $fullName;

    public function __construct($_mailSubtitle, $_mailBody, $_fromAddress, $_fullName)
    {
        $this->mailSubtitle = $_mailSubtitle;
        $this->mailBody= $_mailBody;
        $this->fromAddress = $_fromAddress;
        $this->fullName = $_fullName;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->fromAddress),
            subject: 'New message from FatturaStudio.it',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.view',
            with: [
                'mailSubtitle' => $this->mailSubtitle,
                'mailBody' => $this->mailBody,
                'fromAddress' => $this->fromAddress,
                'fullName' => $this->fullName
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
