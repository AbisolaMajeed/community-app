<?php

namespace App\Listeners\Community;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Community\SendCommunityCreatedEmail;
use App\Events\Community\CommunityAdminCreatedEvent;
use App\Mail\Community\SendCommunityAdminCreatedEmail;

class SendCommunityAdminCreatedListener implements ShouldQueue
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
     * @param  \App\Events\CommunityAdminCreatedEvent $event
     * @return void
     */
    public function handle(CommunityAdminCreatedEvent $event)
    {
        //Send Mail to Super Admin
        Mail::to($event->getAdmin->email)->send(new SendCommunityAdminCreatedEmail($event));

        // Send Mail to Community Owner 
        Mail::to($event->communityAdmin->email)->send(new SendCommunityCreatedEmail($event));
    }
}
