<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\TasksModel;




class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = TasksModel::class;

    public function definition()
    {
        return [

            //
        ];
    }
}