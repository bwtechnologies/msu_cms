<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'MaakuW',
            'first_name' => 'Mark',
            'last_name' => 'Williamson',
            'user_level_id' => 1, 
            'email' => 'mwilliamson@bluewatertech.com',
            'photo' => env('APP_URL','laravel') . '/images/user__maakuw.jpg',
            'password' => bcrypt('m1Ch!9@N')
        ]);
        DB::table('users')->insert([
            'username' => 'Sarah Scott',
            'first_name' => 'Sarah',
            'last_name' => 'Scott',
            'user_level_id' => 2, 
            'email' => 'sscott@broad.msu.edu',
            'photo' => env('APP_URL','laravel') . '/images/user__sparty.jpg',
            'password' => bcrypt('Sp@rty!'),
        ]);
        DB::table('users')->insert([
            'username' => 'Guanglong Pang',
            'first_name' => 'Guanglong',
            'last_name' => '',
            'user_level_id' => 2, 
            'email' => 'pangguan@broad.msu.edu',
            'photo' => env('APP_URL','laravel') . '/images/user__sparty.jpg',
            'password' => bcrypt('Sp@rty!'),
        ]);
        DB::table('users')->insert([
            'username' => 'Jim Wilson',
            'first_name' => 'Jim',
            'last_name' => '',
            'user_level_id' => 2, 
            'email' => 'wilson4@msu.edu',
            'photo' => env('APP_URL','laravel') . '/images/user__sparty.jpg',
            'password' => bcrypt('Sp@rty!'),
        ]);
        DB::table('users')->insert([
            'username' => 'Paula Phelps',
            'first_name' => 'Paula',
            'last_name' => 'Phelps',
            'user_level_id' => 2, 
            'email' => 'pphelps@bluewatertech.com',
            'photo' => '//via.placeholder.com/100x100',
            'password' => bcrypt('B1u3W@t3R'),
        ]);
    }
}
