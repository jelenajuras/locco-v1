<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['proizvođač','model','registracija','šasija','prva_registracija','zadnja_registracija','slijedeća_registracija','trenutni_kilometri','zadnji_servis','department_id','user_id'];
	
	/*
	* The Eloquent user model name
	* 
	* @var string
	*/
	protected static $usersModel = 'App\Models\Users'; 
	
	/*
	* The Eloquent department model name
	* 
	* @var string
	*/
	protected static $departmentsModel = 'App\Models\Department'; 
	
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
		return $this->hasMany(static::$loccoModel,'vozilo_id')->orderBy('created_at','DESC')->paginate(10);
	}	
	
	/*
	* Returns the Users relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function user()
	{
		return $this->belongsTo(static::$usersModel,'user_id');
	}
	
	/*
	* Returns the department relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function department()
	{
		return $this->belongsTo(static::$departmentsModel,'department_id');
	}	
	
	/*
	* Save Car
	* 
	* @param array $car
	* @return void
	*/
	
	public function saveCar ($car=array())
	{
		return $this->fill($car)->save();
	}
	
	/*
	* Update Car
	* 
	* @param array $car
	* @return void
	*/
	
	public function updateCar($car=array())
	{
		return $this->update($car);
	}	
}

