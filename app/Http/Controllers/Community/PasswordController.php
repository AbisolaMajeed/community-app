<?php

namespace App\Http\Controllers\Community;

use Illuminate\Http\Request;
use App\Models\CommunityAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PasswordRequest;
use App\Events\Community\PasswordCreatedEvent;
use App\Mail\Community\SendPasswordCreatedEmail;

class PasswordController extends Controller
{
    public function setPassword(PasswordRequest $request, $uid)
    {
        // Set Password
        CommunityAdmin::where('id', decrypt($uid))->update([
            'password'  => Hash::make($request->password)
        ]);

        // Send mail to registered community
        $community = CommunityAdmin::find(decrypt($uid))->where('id', decrypt($uid))->first();
        Mail::to($community->email)->send(new SendPasswordCreatedEmail($community));

        return successResponse("Password set successfully");
    }
}
