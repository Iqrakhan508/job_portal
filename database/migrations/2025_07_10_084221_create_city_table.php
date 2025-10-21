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
         Schema::create('city', function (Blueprint $table) {
        $table->id('city_id'); // Primary key
        $table->string('city_name', 100);

        // Foreign key field
        $table->unsignedBigInteger('country_id');

        // Foreign key constraint (link to country table)
        $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');

        $table->boolean('city_status')->default(1); // 1 = active, 0 = inactive
        $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city');
    }
};
