<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedProject extends Model
{

    protected $fillable = [
        'status','id','user_id','projectstatus_id'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function projectstatus()
    {
        return $this->belongsTo('App\ProjectStatus','projectstatus_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
