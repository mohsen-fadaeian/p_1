<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnClass extends Model
{
    protected $fillable = [
        'en_class_id',
        'class_name',
        'term_start',
        'term_end',
        'final_date_time',
        'class_start_end_time_1',
        'class_start_end_time_2',
        'class_start_end_time_3',
        'class_start_end_time_4',
        'main_level',
        'sub_level',
        'teacher_id',
        'status',
        'class_max_size',
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
