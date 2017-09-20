<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class 	Availability extends Model  {
	protected $table = 'availability';
		    protected $guarded = [];

	 public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
