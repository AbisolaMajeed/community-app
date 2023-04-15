<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommunityCountry;
use App\Models\CommunityWorkflow;

class CommunityWorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Community Workflow
        $workflows = ['State', 'Zone', 'LGA'];

        $community_countries = CommunityCountry::all();

        foreach ($community_countries as $community_country) {
            for ($i = 0; $i < count($workflows); $i++) {
                CommunityWorkflow::updateOrCreate(
                    ["community_country_id" => $community_country->id, "name" => $workflows[$i]],
                    [
                        'name' => $workflows[$i]
                    ]
                );
            }
        }
    }
}
