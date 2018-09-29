<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'company_id',
    	'user_id',
    	'days'
    ];

	public function user() {
		return $this->belongsToMany('App\Models\User');
	}    

	public function company() {
		return $this->belongsTo('App\Models\Company');
	}

    public function comments() {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
