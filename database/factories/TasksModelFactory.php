<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TasksModelFactory extends Factory
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
            'body' => $this->faker-text(250),
            'header' => $this->faker-text(50),
            'summary' => $this->faker-text(70),
            'format' => $this->faker-text(10),
            'pages' => $this->faker->numeric(3),
            'studentprice' => $this->faker-text(250),
            'tutorprice' => $this->faker->currency(5),
            'studentId' => $this->faker-text(50) -> unique(),
            'questionId' => $this->faker-text(250),
            'deadline' => $this->faker-text(50)
            //
        ];
    }
}