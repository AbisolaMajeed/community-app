<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(CommunitySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CommunityCountriesSeeder::class);
        $this->call(CommunityAdminSeeder::class);
        $this->call(CommunityWorkflowSeeder::class);
        $this->call(CommunityWorkflowEntrySeeder::class);
    }
}
