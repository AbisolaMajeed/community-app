<?php

namespace App\Events\User;

use App\Models\Community;
use App\Models\CommunityAdmin;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserAccountCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $community;
    public $community_admin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->user = $request;
        $this->community = Community::where('id', $request->community_id)->first();
        $this->community_admin = CommunityAdmin::where('community_id', $request->community_id)->first();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
