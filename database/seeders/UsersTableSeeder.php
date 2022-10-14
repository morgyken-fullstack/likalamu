<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = \Faker\Factory::create();

        foreach (range(1,15) as $index) {

        DB::table ('users') -> insert ([
            'email' => $faker->safeEmail,
            'username' => $faker->userName,
            'password' => Hash::make("rlGn|pr&XW"),
            'role' => $faker->randomElement($array = array ('user','superuser','enduser', 'admin')),
            'status' => $faker->randomElement($array = array ('active', 'suspended', 'closed')),
            'first_name' => $faker->userName,
            'last_name' => $faker->userName,
            'display_name' => $faker->userName,
            'google_id' => $faker->numberBetween($min = 99999, $max = 999999),
            'oauth_provider' => $faker->randomElement($array = array ('google','facebook')),
            'created_at' => $faker->datetime,
            'email_verified_at' => $faker->datetime,
            'oauth_id' => $faker->numberBetween($min = 9999, $max =99999),
            'profile_image' => $faker->imageUrl($width = 640, $height = 480) ,
            'fb_id' => $faker->numberBetween($min = 9999, $max =99999),
            'created_at' => $faker->datetime,

        ]);
    }
    }
}