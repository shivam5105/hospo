<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Contacts extends Eloquent{
    
    protected $table = 'contacts';
    	    protected $guarded = [];

    function __construct(){
       // echo 'test';
    } 
    


}