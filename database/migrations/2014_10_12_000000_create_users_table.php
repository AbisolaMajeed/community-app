<?php

use App\Models\Community;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Community::class);
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names');
            $table->string('home_address');
            $table->string('closest_landmark');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('date_of_birth')->nullable();
            $table->date('date_arrived');
            $table->string('occupation');
            $table->string('education');
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
