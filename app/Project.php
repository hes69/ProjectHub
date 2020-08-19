<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    public function projectstatus()
    {
        return $this->hasOne('App\ProjectStatus');
    }
    public function assignedproject()
    {
        return $this->hasOne('App\Assignedproject');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    protected $fillable = [
        'title', 'description', 'Category_id','start_date','end_date','require_fund','photo'
    ];
}
