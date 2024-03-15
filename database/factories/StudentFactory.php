<?php

namespace Database\Factories;

use App\Models\StudentCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'date_of_birth' => $this->faker->date(),
            'student_card_id' => StudentCard::factory(),
            'student_type_id' => rand(1, 6)
        ];
    }
}
