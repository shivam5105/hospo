<?php  namespace App\Classes;

use App\Models\TemplateToolbox;

class TemplateToolboxClass extends BaseClass {
	
	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct()
	{
		$this->model =new TemplateToolbox();
	}

	public function get(){
		return	$data=$this->pagination(10,$this->model);
	}
	
	public function lists(){
		return	$this->model->get();
	}
	public function store($inputs,$file){		
		
		$this->model->title = $inputs['title'];
		$this->model->description = $inputs['description'];
		$this->model->category_id = $inputs['category_id'];
		
		$file_url='';
		$extension = pathinfo($file["file_url"]["name"],PATHINFO_EXTENSION);
		$filename=md5($file["file_url"]["name"].date("Y-m-d H:i:s")).'.'.$extension;
		 $target_file =SITEBASEPATH."/uploads/templatetoolboxes/".$filename;

		if (move_uploaded_file($file["file_url"]["tmp_name"], $target_file)) {
			$file_url=$filename;
		}
		$this->model->file_url = $file_url;
		$this->model->save();
		$this->flashFancy('Success' , 'Template Toolbox  added successfully', 'success','template_toolbox.php');
		
	}
    public function delete($id){
		return $this->model->where('id','=',$id)->delete();
	
	}

	public function edit($id){
		return $this->model->where('id','=',$id)->first();
	
	}

	public function update($current, $inputs,$file){

		$current->title = $inputs['title'];
		$current->description = $inputs['description'];
		$current->category_id = $inputs['category_id'];
		$old_file=SITEBASEPATH."/uploads/templatetoolboxes/".$current->file_url;
		
		 if(isset($file['file_url']['name']) && !empty($file['file_url']['name'])){
			 
			$extension = pathinfo($file["file_url"]["name"],PATHINFO_EXTENSION);
			$filename=md5($file["file_url"]["name"].date("Y-m-d H:i:s")).'.'.$extension;
			$target_file =SITEBASEPATH."/uploads/templatetoolboxes/".$filename;
		 
				 if(file_exists($old_file) && is_file($old_file)){
					unlink($old_file);
				}
				if (move_uploaded_file($file["file_url"]["tmp_name"], $target_file)) {
					$current->file_url =$filename;
				}
		
		 }
		
		$current->save();
		$this->flashFancy('Success' , 'Template Toolbox  updated successfully', 'success','template_toolbox.php');
	}

}