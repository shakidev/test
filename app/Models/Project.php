<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','users_id'];

    public function users(){
        return $this->hasMany('App\User','id','users_id');
    }

    public function departments(){
        return $this->belongsToMany('App\Models\Department','users','id','departments_id');
    }

}
