<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Undergraduate," "Graduate," "International," "Exchange," "Part-time," "Full-time," etc.
        Schema::create('student_types', function (Blueprint $table) {
            $table->id('student_type_id');
            $table->enum('desc', ['graduate', 'undergraduate', 'international', 'exchange', 'part-time', 'full-time'])->default('undergraduate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_types');
    }
};
