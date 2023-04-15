<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\CommunityCountry;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CommunityCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communities = Community::all();

        foreach ($communities as $community) {
            $countries = Country::limit(3)->get();

            foreach($countries as $country) {
                CommunityCountry::updateOrCreate(["community_id" => $community->id, "country_id" => $country->id], 
                [
                    'country_id' => $country->id
                ]);
            }
        }
    }
}
