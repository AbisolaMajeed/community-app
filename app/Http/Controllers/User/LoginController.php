<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\LoginRequest;

class LoginController extends Controller
{
    public function index(LoginRequest $request)
    {
        $user = User::with('community')->where('email', $request->email)->first();
        
        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken("community_user")->plainTextToken;
            return successResponse("Logged in successfully", ["token" => $token, "user" => $user]);
        } else {
            return errorResponse("Credential Mismatch");
        }
    }
}
