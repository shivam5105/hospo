<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Subscription extends Model  {
	protected $table = 'subscriptions';
	    protected $guarded = [];
   public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
	
	
	 public function package()
    {
        return $this->belongsTo('App\Models\Packages','package_id');
    }
}
