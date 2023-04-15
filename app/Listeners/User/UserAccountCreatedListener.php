<?php

namespace App\Listeners\User;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\User\UserAccountCreatedEvent;
use App\Mail\User\SendUserAccountCreatedEmail;
use App\Mail\User\SendToAdminUserAccountCreatedMail;

class UserAccountCreatedListener implements ShouldQueue
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
     * @param  \App\Events\UserAccountCreatedEvent  $event
     * @return void
     */
    public function handle(UserAccountCreatedEvent $event)
    {
        // Send Mail to Community User
        Mail::to($event->user->email)->send(new SendUserAccountCreatedEmail($event));

        // Send Mail to Community Owner
        Mail::to($event->community_admin->email)->send(new SendToAdminUserAccountCreatedMail($event));
    }
}
