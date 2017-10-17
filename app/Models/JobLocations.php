<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobLocations extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'job_locations';

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function user()
	{
	  return $this->hasOne('App\Models\UserProfile','location');
	}
    public function subLocation()
    {
        return $this->hasMany('App\Models\JobLocations','parent_id');
    }
}
