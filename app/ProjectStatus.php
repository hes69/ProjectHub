<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
     public function assignedproject()
    {
        return $this->hasOne('App\Assignedproject');
    }

    protected $fillable = [
        'User_id', 'project_id','status'
    ];
}
