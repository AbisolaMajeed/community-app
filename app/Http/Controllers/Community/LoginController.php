<?php

namespace App\Http\Controllers\Community;

use App\Models\CommunityAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Community\LoginRequest;

class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $community_admin = CommunityAdmin::with('community')->whereEmail($request->email)->first();

        if (Hash::check($request->password, $community_admin->password)) {
            $token = $community_admin->createToken("community_admin")->plainTextToken;
            return successResponse("Logged in successfully", ["token" => $token, "user" => $community_admin]);
        } else {
            return errorResponse("Credential Mismatch");
        }
    }
}
