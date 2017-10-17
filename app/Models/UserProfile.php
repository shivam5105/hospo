<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model  {
	protected $table = 'users_profile';
	    protected $guarded = [];

	 public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
	 public function joblocation()
    {
        return $this->hasOne('App\Models\JobLocations','id','location');
	}
	 public function totalexperience()
    {
        return $this->belongsTo('App\Models\TotalExperience','total_experience_id');
    }
	
	
}
