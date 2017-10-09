<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Shortlisted extends Model  {
//	use SoftDeletes;

	protected $table = 'shortlisted';
	//protected $dates = ['deleted_at'];

	protected $guarded = [];

	 public function touser()
    {
        return $this->belongsTo('App\Models\User','to_id','id');
    }
	
	 public function fromuser()
    {
        return $this->belongsTo('App\Models\User','by_id','id');
    }
	 public function userProfile()
    {
        return $this->hasOne('App\Models\UserProfile','user_id','to_id');
    }
	public function EmployeeCategories() 
	{
	  return $this->hasMany('App\Models\EmployeeCategories','user_id','to_id');
	}
	  public function Skills()
    {
        return $this->hasMany('App\Models\Skills','user_id','to_id');
    }
	public function EmployeeLicenseTransport() 
	{
	  return $this->hasMany('App\Models\EmployeeLicenceTransport','user_id','to_id');
	}
	
}
