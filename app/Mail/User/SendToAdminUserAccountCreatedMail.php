<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendToAdminUserAccountCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $community;
    public $community_admin;

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
        return $this->subject('User Registration | Admin')->markdown('emails.user.admin-user-registration');
    }
}
