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

}