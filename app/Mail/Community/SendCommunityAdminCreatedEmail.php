<?php

namespace App\Mail\Community;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCommunityAdminCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public  $data;
    public $community;
    public $communityAdmin;
    public $getAdmin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Community Registration | Super Admin')->markdown('emails.community.community-admin-registration');
    }
}
