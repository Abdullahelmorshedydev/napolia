<?php

namespace App\Mail\Web\Site;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $email;
    public object $order;
    public string $shippingTime;
    public float $subTotal;
    public float $taxPrice;

    /**
     * Create a new message instance.
     */
    public function __construct(string $email, Order $order, string $shippingTime, float $subTotal, float $taxPrice)
    {
        $this->email = $email;
        $this->order = $order;
        $this->shippingTime = $shippingTime;
        $this->subTotal = $subTotal;
        $this->taxPrice = $taxPrice;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Invoice Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'web.site.mails.send_invoice_mail',
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
