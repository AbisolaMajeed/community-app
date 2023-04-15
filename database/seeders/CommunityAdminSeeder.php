<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\CommunityAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CommunityAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communities = Community::all();
        foreach ($communities as $key => $community) {
            $pos = (0 == $key) ? null : $key;
            CommunityAdmin::updateOrCreate(['community_id' => $community->id], [
                'first_name'    => 'Community',
                'last_name'    => 'Admin '.$pos,
                'email'    => 'community_admin'.$pos.'@community.com',
                'password'    => Hash::make('community_admin'),
                'phone_number'    => "070-3423-HELLO"
            ]);
        }
    }
}
