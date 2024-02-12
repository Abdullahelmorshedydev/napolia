<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\Site\SendInvoiceEvent;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Web\Site\SendInvoiceMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvoiceMailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendInvoiceEvent $event): void
    {
        Mail::to($event->email)->send(new SendInvoiceMail($event->email, $event->order, $event->shippingTime, $event->subTotal, $event->taxPrice));
    }
}
