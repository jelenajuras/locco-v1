<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locco extends Model
{
    protected $fillable = ['vozilo_id','datum','user_id','relacija','projekt_id','pocetni_kilometri','zavrsni_kilometri','prijedeni_kilometri','Komentar',];
	
	/*
	* The Eloquent user model name
	* 
	* @var string
	*/
	protected static $usersModel = 'App\Models\Users'; 
	
	/*
	* The Eloquent Cars model name
	* 
	* @var string
	*/
	protected static $carsModel = 'App\Models\Car'; 
	
	/*
	* The Eloquent Projects model name
	* 
	* @var string
	*/
	protected static $projectsModel = 'App\Models\Project';
	
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
	* Returns the Cars relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function car()
	{
		return $this->belongsTo(static::$carsModel,'vozilo_id');
	}
	
	/*
	* Returns the Projects relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	
	public function project()
	{
		return $this->belongsTo(static::$projectsModel,'projekt_id');
	}
	
	/*
	* Save Locco
	* 
	* @param array $locco
	* @return void
	*/
	
	public function saveLocco ($locco=array())
	{
		return $this->fill($locco)->save();
	}
	
	/*
	* Update Locco
	* 
	* @param array $locco
	* @return void
	*/
	
	public function updateLocco($locco=array())
	{
		return $this->update($locco);
	}	
}
