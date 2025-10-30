<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobCategory;
use App\Models\City;
use App\Models\Company;
use Illuminate\Support\Str;

class GenerateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slugs:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for categories, cities, and companies';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Generate slugs for categories
        $categories = JobCategory::all();
        foreach ($categories as $category) {
            $category->slug = Str::slug($category->name);
            $category->save();
        }
        $this->info('Generated slugs for ' . $categories->count() . ' categories');

        // Generate slugs for cities
        $cities = City::all();
        foreach ($cities as $city) {
            $city->slug = Str::slug($city->city_name);
            $city->save();
        }
        $this->info('Generated slugs for ' . $cities->count() . ' cities');

        // Generate slugs for companies
        $companies = Company::all();
        foreach ($companies as $company) {
            $company->slug = Str::slug($company->name);
            $company->save();
        }
        $this->info('Generated slugs for ' . $companies->count() . ' companies');

        return Command::SUCCESS;
    }
}
