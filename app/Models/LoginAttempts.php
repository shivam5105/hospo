<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAttempts extends Model  {
	protected $table = 'users_login_attempts';
    public $timestamps = false;
    protected $guarded = [];

	 public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
