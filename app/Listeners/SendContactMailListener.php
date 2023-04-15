<?php

namespace App\Listeners;

use App\Events\SendContactMailEvent;
use App\Mail\SendContactEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactMailListener implements ShouldQueue
{
    use InteractsWithQueue;
    
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
     * @param  \App\Events\SendContactMailEvent  $event
     * @return void
     */
    public function handle(SendContactMailEvent $event)
    {
         //Send Mail to Contacts
         Mail::to($event->contact['email'])       
         ->send(new SendContactEmail($event));
    }
}
