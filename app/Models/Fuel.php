<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $fillable = ['car_id', 'user_id','liters','km','date'];
	 
	/*
	* The Eloquent user model name
	* 
	* @var string
	*/
	
	protected static $userModel = 'App\Models\Users'; 
	
	/*
	* The Eloquent Car model name
	* 
	* @var string
	*/
	protected static $carModel = 'App\Models\Car'; 
	
	/*
	* Returns the Users relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function user()
	{
		return $this->belongsTo(static::$userModel,'user_id');
	}
	
	/*
	* Returns the Car relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function car()
	{
		return $this->belongsTo(static::$carModel,'car_id');
	}
	
	/*
	* Save Fuel
	* 
	* @param array $fuel
	* @return void
	*/
	
	public function saveFuel ($fuel=array())
	{
		return $this->fill($fuel)->save();
	}
	
	/*
	* Update Fuel
	* 
	* @param array $fuel
	* @return void
	*/
	
	public function updateFuel($fuel=array())
	{
		return $this->update($fuel);
	}	
}
