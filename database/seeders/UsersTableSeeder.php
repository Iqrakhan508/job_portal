<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_name'      => 'Iqra Khan',
            'user_email'     => 'iqra@gmail.com',
            'user_phone_no'  => '03001234567',
            'user_address'   => 'Bahawalpur, Pakistan',
            'user_password'  => Hash::make('111111'),
            'user_status'    => 1,
            'country_id'     => 1,
            'city_id'        => 1,
            'remember_token' => null,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);
    }
}
