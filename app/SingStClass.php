<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingStClass extends Model
{
    protected $fillable = [
        'class_id',
        'student_id',
        'classes_grate',
        'final_grate',
        'ave_grate',
        'pass_or_fail',
        'teacher_id',
        'main_level',
        'sub_level'
    ];
}
