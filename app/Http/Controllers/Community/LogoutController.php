<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LogoutController extends Controller
{
    public function index()
    {
        Auth::user()->tokens()->delete();
        return successResponse("Logged out successfully");
    }
}
