<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'student_type_id',
        'student_card_id'
    ];
}
