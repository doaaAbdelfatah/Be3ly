<?php

namespace App\Listeners;

use App\Events\CreatNewUserEvent;
use App\Mail\SendNewsEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatNewUserEvent  $event
     * @return void
     */
    public function handle(CreatNewUserEvent $event)
    {
        Mail::to( $event->user->email )->send(new SendNewsEmail( ));
    }
}
