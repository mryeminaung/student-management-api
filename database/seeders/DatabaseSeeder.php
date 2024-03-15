<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\StudentCard;
use App\Models\StudentType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $types = ['graduate', 'undergraduate', 'international', 'exchange', 'part-time', 'full-time'];

        foreach ($types as $type) {
            StudentType::create([
                'desc' => $type
            ]);
        }

        Student::factory()->count(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
