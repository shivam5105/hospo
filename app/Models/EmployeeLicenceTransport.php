<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class 	EmployeeLicenceTransport extends Model  {
	protected $table = 'employee_license_transport';
	    protected $guarded = [];
   public function licenseTransport() 
	{
		return $this->belongsTo('App\Models\LicenceTransport','licence_transport_id','id');
	}
}
