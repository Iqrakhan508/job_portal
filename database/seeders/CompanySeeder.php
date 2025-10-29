<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ⚠️ TEMPORARILY DISABLED - Uncomment below to enable company data seeding
        /* $companies = [
            [
                'name' => 'TechCorp Pakistan',
                'industry' => 'Technology',
                'location' => 'Karachi',
                'company_size' => '500-1000 employees',
                'description' => 'Leading technology company specializing in software development and digital solutions.'
            ],
            [
                'name' => 'Digital Marketing Pro',
                'industry' => 'Marketing',
                'location' => 'Lahore',
                'company_size' => '50-100 employees',
                'description' => 'Full-service digital marketing agency helping businesses grow online.'
            ],
            [
                'name' => 'PakSoft Solutions',
                'industry' => 'Software',
                'location' => 'Islamabad',
                'company_size' => '100-500 employees',
                'description' => 'Software development company focused on mobile and web applications.'
            ],
            [
                'name' => 'EduTech Pakistan',
                'industry' => 'Education',
                'location' => 'Karachi',
                'company_size' => '50-100 employees',
                'description' => 'Educational technology company revolutionizing learning experiences.'
            ],
            [
                'name' => 'Finance First',
                'industry' => 'Finance',
                'location' => 'Lahore',
                'company_size' => '1000+ employees',
                'description' => 'Financial services company providing investment and banking solutions.'
            ],
            [
                'name' => 'HealthCare Plus',
                'industry' => 'Healthcare',
                'location' => 'Karachi',
                'company_size' => '500-1000 employees',
                'description' => 'Healthcare technology company improving patient care through innovation.'
            ],
            [
                'name' => 'Green Energy Solutions',
                'industry' => 'Energy',
                'location' => 'Karachi',
                'company_size' => '100-500 employees',
                'description' => 'Renewable energy company promoting sustainable development.'
            ],
            [
                'name' => 'E-Commerce Hub',
                'industry' => 'E-Commerce',
                'location' => 'Lahore',
                'company_size' => '200-500 employees',
                'description' => 'E-commerce platform connecting buyers and sellers across Pakistan.'
            ],
            [
                'name' => 'Data Analytics Pro',
                'industry' => 'Analytics',
                'location' => 'Islamabad',
                'company_size' => '50-100 employees',
                'description' => 'Data analytics company helping businesses make informed decisions.'
            ],
            [
                'name' => 'CloudTech Solutions',
                'industry' => 'Cloud Computing',
                'location' => 'Karachi',
                'company_size' => '100-500 employees',
                'description' => 'Cloud computing solutions provider for modern businesses.'
            ],
            [
                'name' => 'AI Innovations',
                'industry' => 'Artificial Intelligence',
                'location' => 'Lahore',
                'company_size' => '50-100 employees',
                'description' => 'Artificial intelligence company developing cutting-edge AI solutions.'
            ],
            [
                'name' => 'Blockchain Experts',
                'industry' => 'Blockchain',
                'location' => 'Islamabad',
                'company_size' => '25-50 employees',
                'description' => 'Blockchain technology company specializing in cryptocurrency and smart contracts.'
            ],
            [
                'name' => 'Cyber Security Hub',
                'industry' => 'Cybersecurity',
                'location' => 'Karachi',
                'company_size' => '100-200 employees',
                'description' => 'Cybersecurity company protecting businesses from digital threats.'
            ],
            [
                'name' => 'Mobile App Studio',
                'industry' => 'Mobile Development',
                'location' => 'Lahore',
                'company_size' => '50-100 employees',
                'description' => 'Mobile application development studio creating innovative apps.'
            ],
            [
                'name' => 'Web Design Co',
                'industry' => 'Web Design',
                'location' => 'Karachi',
                'company_size' => '25-50 employees',
                'description' => 'Web design and development company creating beautiful websites.'
            ],
            [
                'name' => 'Content Creators',
                'industry' => 'Content Marketing',
                'location' => 'Lahore',
                'company_size' => '25-50 employees',
                'description' => 'Content creation agency specializing in digital marketing content.'
            ],
            [
                'name' => 'Social Media Experts',
                'industry' => 'Social Media',
                'location' => 'Karachi',
                'company_size' => '50-100 employees',
                'description' => 'Social media marketing agency helping brands grow their online presence.'
            ],
            [
                'name' => 'SEO Masters',
                'industry' => 'SEO',
                'location' => 'Lahore',
                'company_size' => '25-50 employees',
                'description' => 'Search engine optimization company improving website rankings.'
            ],
            [
                'name' => 'Video Production House',
                'industry' => 'Video Production',
                'location' => 'Karachi',
                'company_size' => '25-50 employees',
                'description' => 'Video production company creating engaging visual content.'
            ],
            [
                'name' => 'Graphic Design Studio',
                'industry' => 'Graphic Design',
                'location' => 'Lahore',
                'company_size' => '10-25 employees',
                'description' => 'Graphic design studio providing creative visual solutions.'
            ],
            [
                'name' => 'UI/UX Designers',
                'industry' => 'UI/UX Design',
                'location' => 'Karachi',
                'company_size' => '25-50 employees',
                'description' => 'User interface and user experience design company.'
            ],
            [
                'name' => 'Quality Assurance Pro',
                'industry' => 'Quality Assurance',
                'location' => 'Lahore',
                'company_size' => '50-100 employees',
                'description' => 'Quality assurance company ensuring software reliability.'
            ],
            [
                'name' => 'Project Management Hub',
                'industry' => 'Project Management',
                'location' => 'Islamabad',
                'company_size' => '25-50 employees',
                'description' => 'Project management consulting company helping businesses deliver projects.'
            ],
            [
                'name' => 'Business Intelligence',
                'industry' => 'Business Intelligence',
                'location' => 'Karachi',
                'company_size' => '100-200 employees',
                'description' => 'Business intelligence company providing data-driven insights.'
            ],
            [
                'name' => 'Customer Support Center',
                'industry' => 'Customer Service',
                'location' => 'Lahore',
                'company_size' => '200-500 employees',
                'description' => 'Customer support company providing excellent service solutions.'
            ],
            [
                'name' => 'HR Solutions',
                'industry' => 'Human Resources',
                'location' => 'Karachi',
                'company_size' => '25-50 employees',
                'description' => 'Human resources consulting company helping with talent management.'
            ],
            [
                'name' => 'Legal Tech',
                'industry' => 'Legal Technology',
                'location' => 'Islamabad',
                'company_size' => '10-25 employees',
                'description' => 'Legal technology company modernizing legal services.'
            ],
            [
                'name' => 'Real Estate Tech',
                'industry' => 'Real Estate',
                'location' => 'Karachi',
                'company_size' => '50-100 employees',
                'description' => 'Real estate technology company revolutionizing property management.'
            ],
            [
                'name' => 'Logistics Solutions',
                'industry' => 'Logistics',
                'location' => 'Lahore',
                'company_size' => '100-500 employees',
                'description' => 'Logistics technology company optimizing supply chain management.'
            ],
            [
                'name' => 'AgriTech Innovations',
                'industry' => 'Agriculture',
                'location' => 'Lahore',
                'company_size' => '50-100 employees',
                'description' => 'Agricultural technology company improving farming practices.'
            ]
        ];

        foreach ($companies as $company) {
            Company::create($company);
        } */
    }
}
