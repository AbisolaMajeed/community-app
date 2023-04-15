<?php

namespace App\Events\Community;

use App\Models\Admin;
use App\Models\CommunityAdmin;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommunityAdminCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $communityAdmin;
    public $getAdmin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->communityAdmin = CommunityAdmin::with('community')->where('id', $request->id)->first();
        $this->getAdmin = Admin::first();
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
