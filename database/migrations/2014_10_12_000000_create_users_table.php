<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user_name', 100);
            $table->string('user_email', 100)->unique();
            $table->string('user_phone_no', 20)->nullable();
            $table->string('user_address', 255)->nullable();
            $table->string('user_password');
            $table->tinyInteger('user_status')->default(1);
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->rememberToken();
            $table->timestamps();

            // Foreign Keys (Optional but Recommended)
            // $table->foreign('country_id')->references('country_id')->on('country');
            // $table->foreign('city_id')->references('city_id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
