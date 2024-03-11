<?php

namespace Database\Seeders;

use App\Models\StudentCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentCard::factory()->count(15)->create();
    }
}
