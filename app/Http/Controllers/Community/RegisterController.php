<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Requests\Community\RegisterRequest;
use App\Models\Community;
use App\Models\CommunityAdmin;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(RegisterRequest $request)
    {
        DB::beginTransaction();
        try{
            //Create Super Admin Account 
            $avatar = ($request->hasFile('avatar')) ? Cloudinary::upload($request->file('avatar')->getRealPath())->getSecurePath() : null;
            $community_admin = CommunityAdmin::create(array_merge($request->except('name', 'logo'), [
                'community_id' =>  $this->createCommunity($request),
                'avatar' => $avatar
            ]));
        }catch(\Exception $ex)
        {
            DB::rollBack();
            return errorResponse("Action failed", $ex->getMessage());
        }

        DB::commit();
        return successResponse("Community created successfully", ["uid" => encrypt($community_admin->id)]);
    }

    public function createCommunity($request)
    {
        //Create Community
        $logo = ($request->hasFile('logo')) ? Cloudinary::upload($request->file('logo')->getRealPath())->getSecurePath() : null;
        $community = Community::create(array_merge($request->only('name'), ['logo' => $logo]));
        
        return $community->id;
    }
}
