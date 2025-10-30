<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 20 Main Pakistan cities with proper descriptions and slugs
        $cities = [
            ['city_name' => 'Karachi', 'slug' => 'karachi', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'The largest city and economic hub of Pakistan, known for its diverse culture and vibrant business environment.'],
            ['city_name' => 'Lahore', 'slug' => 'lahore', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'The cultural capital of Pakistan, famous for its rich history, Mughal architecture, and educational institutions.'],
            ['city_name' => 'Islamabad', 'slug' => 'islamabad', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'The capital city of Pakistan, known for its modern infrastructure and scenic beauty.'],
            ['city_name' => 'Rawalpindi', 'slug' => 'rawalpindi', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'A major city in Punjab, known for its military significance and commercial activities.'],
            ['city_name' => 'Faisalabad', 'slug' => 'faisalabad', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'The textile capital of Pakistan, a major industrial and agricultural hub.'],
            ['city_name' => 'Multan', 'slug' => 'multan', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'One of the oldest cities in South Asia, known for its Sufi shrines and agricultural products.'],
            ['city_name' => 'Peshawar', 'slug' => 'peshawar', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'The capital of Khyber Pakhtunkhwa, known for its rich history and cultural heritage.'],
            ['city_name' => 'Quetta', 'slug' => 'quetta', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'The capital of Balochistan, known for its fruit orchards and strategic location.'],
            ['city_name' => 'Sialkot', 'slug' => 'sialkot', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'Famous for sports goods manufacturing and surgical instruments exports.'],
            ['city_name' => 'Gujranwala', 'slug' => 'gujranwala', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'An industrial city known for its manufacturing sector and business activities.'],
            ['city_name' => 'Hyderabad', 'slug' => 'hyderabad', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'Second largest city of Sindh, known for its handicrafts and educational institutions.'],
            ['city_name' => 'Bahawalpur', 'slug' => 'bahawalpur', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'A historic city known for its palaces, forts, and agricultural significance.'],
            ['city_name' => 'Sargodha', 'slug' => 'sargodha', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'Famous for citrus production, especially kinnow oranges.'],
            ['city_name' => 'Sukkur', 'slug' => 'sukkur', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'An important city in Sindh, known for the Sukkur Barrage and trade activities.'],
            ['city_name' => 'Larkana', 'slug' => 'larkana', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'A historic city in Sindh, close to the archaeological site of Mohenjo-daro.'],
            ['city_name' => 'Mardan', 'slug' => 'mardan', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'A city in Khyber Pakhtunkhwa known for its agricultural produce.'],
            ['city_name' => 'Abbottabad', 'slug' => 'abbottabad', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'A popular hill station and tourist destination in Pakistan.'],
            ['city_name' => 'Gujrat', 'slug' => 'gujrat', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'Known for its ceramic industry and furniture manufacturing.'],
            ['city_name' => 'Sahiwal', 'slug' => 'sahiwal', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'An agricultural city in Punjab known for its dairy farming.'],
            ['city_name' => 'Jhang', 'slug' => 'jhang', 'country_id' => 1, 'city_status' => 1, 'city_description' => 'A historic city in Punjab known for its cultural heritage.'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
