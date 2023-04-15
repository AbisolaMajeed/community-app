<?php

namespace App\Listeners;

use App\Mail\SendContactAdminEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SendContactAdminEmailEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactAdminEmailListener implements ShouldQueue
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
     * @param  \App\Events\SendContactAdminEmailEvent  $event
     * @return void
     */
    public function handle(SendContactAdminEmailEvent $event)
    {
        //Send Contact Mail to Admin
        Mail::to('ebenezer.babalola@ss-limited.com')       
        ->send(new SendContactAdminEmail($event));
    }
}
