<?php

namespace App\Mail;

use App\Models\Service\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact, string $reply)
    {
        $this->contact = $contact;
        $this->reply = $reply;
    }

    public function build()
    {
        return $this->subject('Balasan atas pertanyaan anda')
            ->from(
                config('mail.from.address'),
                config('mail.from.name')
            )
            ->view('mails.index')
            ->with(
                [
                    'contact' => $this->contact,
                    'reply' => $this->reply,
                ]
            );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
