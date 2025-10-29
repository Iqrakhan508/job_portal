<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // This migration is no longer needed as data is now handled by seeders
        // Just clean up any existing data if needed
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback not needed as this is a one-time cleanup
    }
};
