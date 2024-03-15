<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCard extends Model
{
    use HasFactory;
    protected $table = 'student_cards';
    protected $fillable = ['card_number'];

    public function student()
    {
        return $this->hasOne(Student::class, 'student_card_id');
    }
}
