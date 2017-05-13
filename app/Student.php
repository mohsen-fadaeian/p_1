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
        'school_level',
        'sex',
        'dad_name',
        'birth_date',
        'student_id'
        ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
