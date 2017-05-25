<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function users(){
        return $this->hasMany('App\User','departments_id','id');
    }
    public function childs(){
        return $this->hasManyThrough('App\User','App\Models\Department','id','departments_id')->orWhere('departments.id',$this->id);
    }
}
