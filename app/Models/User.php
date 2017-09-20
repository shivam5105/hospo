<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class User extends Model{

	const CREATED_AT = 'create_date';
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  //  protected $fillable = ['name', 'email', 'password'];
    protected $fillable = ['email', 'password','role_id','phone_confirmed','email_confirmed','email_confirmation_code','phone','status'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'salt','org_password'];

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function role() 
	{
		return $this->belongsTo('App\Models\Roles','role_id','id');
	}
	public function category() 
	{
		return $this->belongsTo('App\Models\Category');
	}
     public function userProfile()
    {
        return $this->hasOne('App\Models\UserProfile');
    }
	  public function Skills()
    {
        return $this->hasMany('App\Models\Skills','user_id');
    }
	public function Experiences() 
	{
	  return $this->hasMany('App\Models\Experiences');
	}
	public function EmployeeCategories() 
	{
	  return $this->hasMany('App\Models\EmployeeCategories');
	}
	public function EmployeeLicenseTransport() 
	{
	  return $this->hasMany('App\Models\EmployeeLicenceTransport');
	}
	
	
	public function Availability() 
	{
	  return $this->hasOne('App\Models\Availability');
	}
	
	

	/**
	 * Check admin role
	 *
	 * @return bool
	 */
	public function isAdmin()
	{
		return $this->role->slug == 'admin';
	}

	/**
	 * Check media all access
	 *
	 * @return bool
	 */
	public function accessMediasAll()
	{
	    return $this->isAdmin();
	}

	/**
	 * Check media access one folder
	 *
	 * @return bool
	 */
	public function accessMediasFolder()
	{
	    return $this->isNotUser();
	}

}
