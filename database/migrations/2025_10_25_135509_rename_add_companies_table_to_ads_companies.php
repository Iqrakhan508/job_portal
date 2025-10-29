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
        Schema::rename('add_companies', 'ads_companies');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('ads_companies', 'add_companies');
    }
};
