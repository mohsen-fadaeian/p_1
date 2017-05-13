<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'f_name',
        'l_name',
        'user_id',
        'address',
        'bio',
        'phone_number',
        'home_number',
        'teacher_id',
        'max_level'
    ];

    public function mainlevel()
    {
        return $this->belongsTo('App\MainLevel','max_level');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
