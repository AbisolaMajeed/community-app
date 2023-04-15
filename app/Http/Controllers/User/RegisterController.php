<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\UserWorkflow;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(RegisterRequest $request)
    {
        DB::beginTransaction();
        try{
            $avatar = ($request->hasFile('avatar')) ? Cloudinary::upload($request->file('avatar')->getRealPath())->getSecurePath() : null;
            $user = User::create(array_merge($request->except('workflow_entry_ids'), [
                'avatar'    => $avatar,
                'password'  => Hash::make($request->password)
            ]));

            // dd($request->workflow_entry_ids);
            // Create user workflow
            for($i =0; $i < count($request->workflow_entry_ids); $i++)
            {
                UserWorkflow::updateOrCreate(
                    [
                        'user_id' => $user->id, 
                        'community_workflow_entry_id' => $request->workflow_entry_ids[$i]
                    ],
                
                    [
                        'community_workflow_entry_id' => $request->workflow_entry_ids[$i]
                    ],
                    [
                        'community_workflow_entry_id' => $request->workflow_entry_ids[$i]
                    ]
                );
            }
        }catch(\Exception $ex)
        {
            DB::rollBack();
            return errorResponse("Action failed", $ex->getMessage());
        }

        DB::commit();
        
        //Send mail to community owner
        return successResponse("User account created successfully");
    }

    public function setPassword(PasswordRequest $request, $uid)
    {
        User::where('id', decrypt($uid))->update([
            'password'  => Hash::make($request->password)
        ]);

        return successResponse("Password set successfully");
    }
}
