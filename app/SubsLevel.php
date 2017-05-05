<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsLevel extends Model
{
    protected $fillable =[
        'name',
        'order_subs',
        'mainlevel_id'
    ];

    public function mainlevel()
    {
        return $this->belongsTo('App\MainLevel');
    }
}
