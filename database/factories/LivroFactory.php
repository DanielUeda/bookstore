<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LivroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'isbn' => $this->faker->isbn13,
            'data_publicacao' => $this->faker->date(),
            'valor' => $this->faker->randomFloat(2, 10, 200),
        ];
    }
}