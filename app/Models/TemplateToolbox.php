<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class 	TemplateToolbox extends Model  {
	protected $table = 'template_toolbox';
	protected $guarded = [];
 public function templatetoolcat()
    {
        return $this->belongsTo('App\Models\TemplateToolboxCategories','category_id');
    }
}
