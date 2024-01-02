<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\Admin\ResetPasswordEvent;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Web\Admin\ResetPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendResetPasswordMailListener
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
    public function handle(ResetPasswordEvent $event): void
    {
        Mail::to($event->email)->send(new ResetPasswordMail($event->email));
    }
}
