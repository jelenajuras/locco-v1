<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;

class Users extends EloquentUser
{
	/*
	* The Eloquent post model names
	* 
	* @var string
	*/
	protected static $postsModel = 'App\Models\Post'; /* putanja do modela posts
	
	/*
	* The Eloquent comments model name
	* 
	* @var string
	*/
	protected static $commentsModel = 'App\Models\Comment'; /* putanja do modela comments
	
	/*
	* The Eloquent department model name
	* 
	* @var string
	*/
	protected static $departmentModel = 'App\Models\Department'; 
	
	/*
	* The Eloquent car model name
	* 
	* @var string
	*/
	protected static $carModel = 'App\Models\Car'; 
	
	/*
	* The Eloquent locco model name
	* 
	* @var string
	*/
	protected static $loccoModel = 'App\Models\Locco'; 
	
	/*
	* Returns the locco relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function locco()
	{
		return $this->hasMany(static::$loccoModel,'user_id')->orderBy('created_at','DESC')->paginate(10);
	}	
	
	/*
	* Returns the posts relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function posts()
	{
		return $this->hasMany(static::$postsModel,'user_id');
	}
	
	/*
	* Returns the comments relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function comments()
	{
		return $this->hasMany(static::$commentsModel,'user_id');
	}	
	
	/*
	* Returns the Deparment relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\belongsTo
	*/
	
	public function department()
	{
		return $this->belongsTo(static::$departmentModel,'department_id');
	}
	
	/*
	* Returns the Car relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\belongsTo
	*/
	
	public function car()
	{
		return $this->hasOne(static::$carModel,'user_id');
	}
}
