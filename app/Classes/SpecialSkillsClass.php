<?php  namespace App\Classes;

use App\Models\SpecialSkills;

class SpecialSkillsClass extends BaseClass {
	

	public function __construct()
	{
		$this->model =new SpecialSkills();
	}

	public function get(){
		return	$data=$this->pagination(10,$this->model);
	}
	
	public function store($inputs){		
		$this->model->name = $inputs['name'];
        
		$this->model->save();
		$this->flashFancy('Success' , 'Special Skills added successfully', 'success','special_skills.php');
		
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
		$this->flashFancy('Success' , 'Special Skills updated successfully', 'success','special_skills.php');
	}

}