<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Roles extends Eloquent{
    protected $table = 'roles';
    	    protected $guarded = [];

    function __construct(){
       // echo 'test';
    } 
    
   public function users() 
	{
	  return $this->hasMany('App\Models\User','role_id');
	}
    public function packages() 
	{
	  return $this->hasOne('App\Models\Packages','role_id');
	}
}