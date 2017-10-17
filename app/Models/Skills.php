<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model  {
	protected $table = 'skills';
	    protected $guarded = [];

	 public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
	 public function skillinfo()
    {
        return $this->belongsTo('App\Models\SpecialSkills','special_skill_id');
    }
}
