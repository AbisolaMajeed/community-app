<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Community;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = array(
            [
                "first_name" => "Ebenezer",
                "last_name" => "Babalola",
                "email" => "superadmin@community.com",
                "category" => 'super_admin',
                "password" => bcrypt('superadmin')
            ]
        );

        DB::beginTransaction();
        try {
            for ($i = 0; $i < count($admins); $i++) {
                Admin::updateOrCreate(["email" => $admins[$i]], $admins[$i]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        DB::commit();
    }
}
