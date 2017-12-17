<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	
	protected $fillable = ['id','customer_id','investitor_id','naziv'];
	
	/*
	* The Eloquent customer model name
	* 
	* @var string
	*/
	protected static $customerModel = 'App\Models\Customer'; 	
	
	/*
	* The Eloquent investitor model name
	* 
	* @var string
	*/
	protected static $investitorModel = 'App\Models\Customer'; 		
	/*
	* The Eloquent comments model name
	* 
	* @var string
	*/
	protected static $commentsModel = 'App\Models\Comment'; 	
	
	/*
	* Returns the customer relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function narucitelj()
	{
		return $this->belongsTo(static::$customerModel,'customer_id');
	}
	
	/*
	* Returns the investitor relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function investitor()
	{
		return $this->belongsTo(static::$investitorModel,'investitor_id');
	}
	
	/*
	* Returns the comments relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function comments()
	{
		return $this->hasMany(static::$commentsModel,'project_id')->orderBy('created_at','DESC')->paginate(10);
	}	
	
	/*
	* Save Project
	* 
	* @param array $project
	* @return void
	*/
	
	public function saveProject($project=array())
	{
		return $this->fill($project)->save();
	}
	
	/*
	* Update Project
	* 
	* @param array $project
	* @return void
	*/
	
	public function updateProject($project=array())
	{
		return $this->update($project);
	}	
}