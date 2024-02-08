<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentType extends Model
{
    use HasFactory;
    protected $table = 'student_types';
    protected $primaryKey = 'student_type_id';
    protected $fillable = ['desc'];
}
