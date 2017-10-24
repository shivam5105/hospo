<?php  namespace App\Classes;

use App\Models\TemplateToolboxCategories;

class TemplateToolboxCategoryClass extends BaseClass {
	
	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct()
	{
		$this->model =new TemplateToolboxCategories();
	}

	public function get(){
		return	$data=$this->pagination(10,$this->model);
	}
	
	public function lists(){
		return	$this->model->get();
	}
	public function store($inputs){		
		
		$this->model->name = $inputs['name'];
	
		$this->model->save();
		$this->flashFancy('Success' , 'Template Toolbox Category added successfully', 'success','template_toolbox_category.php');
		
	}
    public function delete($id){
		return $this->model->where('id','=',$id)->delete();
	
	}

	public function edit($id){
		return $this->model->where('id','=',$id)->first();
	
	}

	public function update($currentCat, $inputs){

	    $currentCat->name = $inputs['name'];
		
		$currentCat->save();
		$this->flashFancy('Success' , 'Template Toolbox Category updated successfully', 'success','template_toolbox_category.php');
	}

}