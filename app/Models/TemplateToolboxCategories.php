<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class 	TemplateToolboxCategories extends Model  {
	protected $table = 'template_toolbox_category';
	    protected $guarded = [];
		
   public function templatetoolboxes() 
	{
	  return $this->hasMany('App\Models\TemplateToolbox','category_id');
	}
}
