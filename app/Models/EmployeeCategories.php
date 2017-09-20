<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class 	EmployeeCategories extends Model  {
	protected $table = 'employee_categories';
		    protected $guarded = [];

	 public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Categories');
    }
}
