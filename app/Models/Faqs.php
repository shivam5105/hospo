<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Faqs extends Eloquent{
    
    protected $table = 'faqs';
    	    protected $guarded = [];

    function __construct(){
       // echo 'test';
    } 
    


}