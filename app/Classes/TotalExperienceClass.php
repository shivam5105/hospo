<?php  namespace App\Classes;

use App\Models\TotalExperience;

class TotalExperienceClass extends BaseClass {
	

	public function __construct()
	{
		$this->model =new TotalExperience();
	}

	public function get(){
		return	$data=$this->pagination(10,$this->model);
	}
	
	public function store($inputs){		
		
		   $this->model->title = $inputs['title'];
	
		$this->model->type = $inputs['type'];
        
		$this->model->save();
		$this->flashFancy('Success' , 'Experience added successfully', 'success','experiences.php');
		
	}
    public function delete($id){
		return $this->model->where('id','=',$id)->delete();
	
	}

	public function edit($id){
		return $this->model->where('id','=',$id)->first();
	
	}

	public function update($current, $inputs){

	    $current->title = $inputs['title'];
	
		$current->type = $inputs['type'];
        
		$current->save();
		$this->flashFancy('Success' , 'Experience updated successfully', 'success','experiences.php');
	}

}