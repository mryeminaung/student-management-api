<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentType extends Model
{
    use HasFactory;
    protected $table = 'student_types';
    protected $fillable = ['desc'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
