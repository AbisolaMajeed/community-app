<?php

namespace App\Http\Controllers\Community;

use App\Models\CommunityCountry;
use App\Http\Controllers\Controller;
use App\Http\Requests\Community\AddCommunityCountryRequest;
use App\Http\Resources\CountriesInCommunityResource;
use Illuminate\Support\Facades\Auth;

class CommunityCountryController extends Controller
{
    public function index()
    {
        $community_id = request()->community_id ?? Auth::user()->community_id;

        return successResponse("Country fetched successfully", 
        CountriesInCommunityResource::collection(
            CommunityCountry::where('community_id', $community_id)->get()
        ));
    }

    public function addCountryToCommunity(AddCommunityCountryRequest $request)
    {
        try {
            CommunityCountry::updateOrCreate([
                "community_id" => Auth::user()->community_id,
                "country_id" => $request->country_id
            ], $request->all());
        } catch (\Exception $ex) {
            return errorResponse("Action failed", $ex->getMessage());
        }
        return successResponse("Country added successfully");
    }

    public function deleteCountry($country_id)
    {
        try {
            CommunityCountry::where('community_id', Auth::user()->community_id)->where('country_id', $country_id)->delete();
        } catch (\Throwable $th) {
            return errorResponse("Country does not exist", $th->getMessage());
        }
        
        return successResponse("Country deleted successfully");
    }
}
