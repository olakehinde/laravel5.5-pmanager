<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	'name',
    	'days',
    	'hours',
    	'user_id',
    	'project_id',
    	'company_id'
    ];

    public function user() {
    	return $this->belongsTo('App\Models\User');
    }

    public function project() {
    	return $this->belongsTo('App\Models\Project');
    }

    public function company() {
    	return $this->belongsTo('App\Models\Company');
    }

    public function users() {
    	return $this->belongsToMany('App\Models\User');
    }

    public function comments() {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
