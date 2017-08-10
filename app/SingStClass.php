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
        'sub_level',
        'term_start',
        'term_end'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student','student_id','student_id');
    }

    public function mainlevel()
    {
        return $this->belongsTo('App\MainLevel','main_level','id');
    }

    public function sublevel()
    {
        return $this->belongsTo('App\SubsLevel','sub_level','id');
    }

    public function en_classes()
    {
        return $this->belongsTo('App\EnClass','class_id','en_class_id');
    }


}
