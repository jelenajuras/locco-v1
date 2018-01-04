<?php
namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;

class Users extends EloquentUser
{
	protected $fillable = [
        'email',
        'password',
        'last_name',
        'first_name',
        'permissions',
		//'department_id',
    ];
	
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
	
	/*
	* Save User
	* 
	* @param array $user
	* @return void
	*/
	
	public function saveUser ($user=array())
	{
		return $this->fill($user)->save();
	}
	
	/*
	* Update User
	* 
	* @param array $user
	* @return void
	*/
	
	public function updateUser($user=array())
	{
		return $this->update($user);
	}	
}