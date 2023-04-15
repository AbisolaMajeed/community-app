<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCountryRequest;
use App\Models\CommunityCountry;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        return successResponse("Country fetched successfully", Country::all());
    }

    public function store(AddCountryRequest $request)
    {
        try {
            Country::create($request->all());
        } catch (\Exception $ex) {
            return errorResponse("Action failed", $ex->getMessage());
        }
        return successResponse("Country added successfully");
    }

    public function delete($country_id)
    {
        try {
            $country = Country::with('communityCountry')->where('id', $country_id)->first();
            if (!empty($country->communityCountry)) {
                return errorResponse('Community exists for '. $country->name);
            } else {
                Country::findOrFail($country_id)->delete();
            }
        } catch (\Throwable $th) {
            return errorResponse("Country does not exist", $th->getMessage());
        }

        return successResponse("Country deleted successfully");
    }
}
