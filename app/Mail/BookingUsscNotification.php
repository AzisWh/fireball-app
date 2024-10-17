<?php

namespace App\Mail;

use App\Models\FormUssc;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingUsscNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $formUssc;

    /**
     * Create a new message instance.
     */
    public function __construct(FormUssc $formUssc)
    {
        $this->formUssc = $formUssc;
    }

    public function build()
    {
        return $this->view('emails.BookUsscMail')
            ->with([
                'name' => $this->formUssc->user->name,
                'email' => $this->formUssc->email,
                'phone_number' => $this->formUssc->phone_number,
                'tanggal' => $this->formUssc->tanggal,
                'jam' => json_decode($this->formUssc->jam),
                'lapangan' => $this->formUssc->lapangan->nama_lapangan,
            ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Ussc Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.BookUsscMail',
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
