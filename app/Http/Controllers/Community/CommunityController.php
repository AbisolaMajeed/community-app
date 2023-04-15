<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\CommunityAdmin;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        return successResponse("Community list fetched successfully", $communities);
    }

    public function getCommunity($community_id = null)
    {
        $community = Community::byId($community_id);
        return successResponse("Community fetched successfully", $community);
    }

    public function getCommunityByEmail()
    {
        $community = CommunityAdmin::with('community')->whereEmail(request()->email)->first();
        return successResponse("Community fetched for user successfully", ($community) ? $community->community : null);
    }
}
