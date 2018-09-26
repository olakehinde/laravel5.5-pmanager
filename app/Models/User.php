<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'password',
    	'first_name',
    	'middle_name',
    	'last_name',
    	'city',
    	'role_id'
    ];

    protected $hidden = [
    	'password', 'remember_token'
    ];

    public function tasks() {
    	return $this->belongsToMany('App\Models\Task');
    }

    public function role() {
    	return $this->belongsTo('App\Models\Role');
    }

    public function comments() {
    	return $this->hasMany('App\Models\Comment');
    }

    public function companies() {
    	return $this->hasMany('App\Models\Company');
    }

    public function projects() {
    	return $this->belongsToMany('App\Models\Project');
    }
}
