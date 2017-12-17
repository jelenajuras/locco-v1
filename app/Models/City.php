<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
	{
    protected $fillable = ['id','grad'];
	
	/*
	* The Eloquent narucitelj model name
	* 
	* @var string
	*/
	protected static $naruciteljModel = 'App\Models\Narucitelj'; 
	
	/*
	* Returns the Grad relationship
	* 
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	
	public function narucitelj()
	{
		return $this->belongsTo(static::$naruciteljModel,'grad_id');
	}

	/*
	* Save Grad
	* 
	* @param array $post
	* @return void
	*/
	
	public function saveGrad($grad=array())
	{
		return $this->fill($grad)->save();
	}
	
	/*
	* Update Grad
	* 
	* @param array $post
	* @return void
	*/
	
	public function updateGrad($grad=array())
	{
		return $this->update($grad);
	}	
	}