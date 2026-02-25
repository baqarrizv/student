<?php

namespace Student\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Student\Domain\Models\Student;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'father_name' => fake()->name('male'),
            'age' => fake()->numberBetween(18, 35),
        ];
    }

    /**
     * Indicate that the student is a minor.
     */
    public function minor(): static
    {
        return $this->state(fn (array $attributes) => [
            'age' => fake()->numberBetween(10, 17),
        ]);
    }

    /**
     * Indicate that the student is an adult.
     */
    public function adult(): static
    {
        return $this->state(fn (array $attributes) => [
            'age' => fake()->numberBetween(18, 25),
        ]);
    }
}
