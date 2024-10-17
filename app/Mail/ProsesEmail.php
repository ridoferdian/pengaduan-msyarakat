<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProsesEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan;
    public $tanggapan;
    public function __construct($pengaduan, $tanggapan)
    {
        $this->pengaduan = $pengaduan;
        $this->tanggapan = $tanggapan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ridoferdian@gmail.com', 'rido ferdian'),
            subject: $this->pengaduan->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.proses',
            with: ['pengaduan' => $this->pengaduan],
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