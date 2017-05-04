<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'home_tell_number',
        'emergency_tell_number',
        'mobile_number',
        'first_name',
        'last_name',
        'address',
        'email',
        'school_level',
        'sex',
        'dad_name',
        'birth_date',
        'student_id'
        ];

    public function student_user()
    {
        return $this->hasMany('App\User','user_id');
    }
}
