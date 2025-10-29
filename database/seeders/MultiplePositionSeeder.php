<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MultiplePosition;

class MultiplePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            'top',
            'bottom',
            'right',
            'left',
            'body'
        ];

        foreach ($positions as $position) {
            MultiplePosition::create([
                'ads_position_name' => $position
            ]);
        }
    }
}
