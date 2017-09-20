<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class 	Experiences extends Model  {
	protected $table = 'experiences';
		    protected $guarded = [];

	 public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
