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
	
}
