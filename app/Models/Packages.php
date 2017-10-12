<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class 	Packages extends Model  {
	protected $table = 'packages';
	    protected $guarded = [];
public function role() 
	{
		return $this->belongsTo('App\Models\Roles','role_id','id');
	}
}
