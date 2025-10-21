<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Karachi', 'Lahore', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Multan', 'Peshawar', 'Quetta',
            'Hyderabad', 'Sialkot', 'Gujranwala', 'Bahawalpur', 'Sargodha', 'Sukkur', 'Larkana', 'Sheikhupura',
            'Okara', 'Rahim Yar Khan', 'Kasur', 'Jhelum', 'Abbottabad', 'Mardan', 'Swat', 'Chitral',
            'Gwadar', 'Mirpur Khas', 'Dera Ghazi Khan', 'Mingora', 'Nawabshah', 'Muzaffargarh', 'Kohat', 'Bannu',
            'Hafizabad', 'Tando Adam', 'Jacobabad', 'Attock', 'Khuzdar', 'Chaman', 'Mansehra', 'Dera Ismail Khan'
        ];

        foreach ($cities as $city) {
            DB::table('city')->insert([
                'city_name' => $city,
                'country_id' => 1, // Pakistan ka country_id
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
