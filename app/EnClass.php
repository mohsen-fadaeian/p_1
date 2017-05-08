<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnClass extends Model
{
    protected $fillable = [
        'en_class_id',
        'class_name',
        'class_start',
        'class_end',
        'main_level',
        'sub_level',
        'teacher_id',
        'status',
        'class_max_size',
        'start_time',
        'end_time'
    ];

    public function sublevel()
    {
        return $this->belongsTo('App\SubsLevel','sub_level');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Teacher','teacher_id','teacher_id');
    }
    public function mainlevel()
    {
        return $this->belongsTo('App\MainLevel','main_level');
    }
}
