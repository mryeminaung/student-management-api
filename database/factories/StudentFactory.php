<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    private static $cardCounter = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->userName(),
            'email' => fake()->email(),
            'date_of_birth' => fake()->date(),
            'student_card_id' => $this->generateCardID(),            'student_type_id' => rand(1, 6),
        ];
    }

    private function generateCardID()
    {
        if (self::$cardCounter > 10) {
            self::$cardCounter = 1; // Reset counter if it exceeds the number of available cards
        }
        $cardId = self::$cardCounter;
        self::$cardCounter++;
        return $cardId;
    }
}
