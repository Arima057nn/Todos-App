<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Todo::class;

    public function definition()
    {
        return [
            'name'        => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'completed'   => false 
        ];
    }
}