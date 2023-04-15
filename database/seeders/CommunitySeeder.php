<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communities = array(
            [
              "name" => "Holmes Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679077954/hwmp2tqy2pzt9w5ybusr.jpg",
              "is_active" => true
            ],
            [
              "name" => "Ezra Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679078070/cucqofoyqfvausquf0nl.jpg",
              "is_active" => true
            ],
            
            [
              "name" => "Funbi Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679079066/vndkh4gbhxw2oj997ig3.jpg",
              "is_active" => true
            ],

            [
              "name" => "Halo Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679077954/hwmp2tqy2pzt9w5ybusr.jpg",
              "is_active" => true
            ],
            [
              "name" => "Maise Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679078070/cucqofoyqfvausquf0nl.jpg",
              "is_active" => true
            ],
            
            [
              "name" => "Bamboo Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679079066/vndkh4gbhxw2oj997ig3.jpg",
              "is_active" => true
            ],

            [
              "name" => "Oak Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679077954/hwmp2tqy2pzt9w5ybusr.jpg",
              "is_active" => true
            ],
            [
              "name" => "Trivial Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679078070/cucqofoyqfvausquf0nl.jpg",
              "is_active" => true
            ],
            
            [
              "name" => "Sapphire Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679079066/vndkh4gbhxw2oj997ig3.jpg",
              "is_active" => true
            ],
            [
              "name" => "Emerald Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679077954/hwmp2tqy2pzt9w5ybusr.jpg",
              "is_active" => true
            ],
            [
              "name" => "Jasper Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679078070/cucqofoyqfvausquf0nl.jpg",
              "is_active" => true
            ],
            
            [
              "name" => "Gold Community",
              "logo" => "https://res.cloudinary.com/dvhfyuilj/image/upload/v1679079066/vndkh4gbhxw2oj997ig3.jpg",
              "is_active" => true
            ]
        );

        DB::beginTransaction();
        try {
          for($i = 0; $i < count($communities); $i++)
          {
              Community::updateOrCreate(["name" => $communities[$i]['name']], $communities[$i]);
          }
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        DB::commit();

        
    }
}
