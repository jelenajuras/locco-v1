<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];
	
	/*
	* The Eloquent car model name
	* 
	* @var string
	*/
	protected static $carModel = 'App\Models\Cars'; 
	
	/*
	* The Eloquent user model name
	* 
	* @var string
	*/
	
	protected static $userModel = 'App\Models\Users'; 
	/*
	* Returns the Department relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function user()
	{
		return $this->hasMany(static::$userModel,'department_id');
	}
	
	/*
	* Returns the cars relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function cars()
	{
		return $this->hasMany(static::$carModel,'department_id');
	}
	
	/*
	* Save Department
	* 
	* @param array $department
	* @return void
	*/
	
	public function saveDepartment ($department=array())
	{
		return $this->fill($department)->save();
	}
	
	/*
	* Update Department
	* 
	* @param array $department
	* @return void
	*/
	
	public function updateDepartment($department=array())
	{
		return $this->update($department);
	}	
}
