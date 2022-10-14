<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TasksModel;

use DB;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        foreach (range(1,100) as $index) {

        DB::table ('tasks') -> insert ([
            'body' => $faker->text(450),
            'header' => $faker->text(50),
            
            'summary' => $faker->text(100),
            'format' => $faker->randomElement($array = array ('mla','apa','harvard', 'chicago')),
            
            'level' => $faker->randomElement($array = array ('phd','masters','College', 'other')),
            'pages' => $faker->numberBetween($min = 10, $max = 100),
            
            'studentprice' => $faker->numberBetween($min = 100, $max = 1000),
            'tutorprice' => $faker->numberBetween($min = 10, $max = 100),
            
            'paperType' =>$faker -> randomElement(['class','thesis','general']),
            'studentId' => $faker->numberBetween($min = 9999, $max =99999),
           
            'questionId' => $faker->numberBetween($min = 99999, $max = 999999),
            
            'deadline' => $faker->datetime,
            'created_at' => $faker->datetime,

        ]);
    }

    }
}