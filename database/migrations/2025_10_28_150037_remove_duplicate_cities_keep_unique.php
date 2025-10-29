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
        // Find and remove duplicate cities, keeping the first occurrence
        $duplicates = DB::table('city')
            ->select('city_name', DB::raw('MIN(city_id) as keep_id'))
            ->where('country_id', 1)
            ->groupBy('city_name')
            ->having(DB::raw('COUNT(*)'), '>', 1)
            ->get();

        foreach ($duplicates as $duplicate) {
            // Get all IDs with this city name
            $allIds = DB::table('city')
                ->where('city_name', $duplicate->city_name)
                ->where('country_id', 1)
                ->pluck('city_id')
                ->toArray();
            
            // Remove the ID we want to keep
            $idsToDelete = array_diff($allIds, [$duplicate->keep_id]);
            
            if (!empty($idsToDelete)) {
                // Update jobs table - move jobs from duplicate cities to the kept city
                DB::table('jobs')
                    ->whereIn('city_id', $idsToDelete)
                    ->update(['city_id' => $duplicate->keep_id]);
                
                // Delete duplicate cities
                DB::table('city')
                    ->whereIn('city_id', $idsToDelete)
                    ->delete();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cannot reverse this migration as we've deleted data
    }
};
