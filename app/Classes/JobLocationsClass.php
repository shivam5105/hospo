<?php namespace App\Classes;

use App\Models\JobLocations;

class JobLocationsClass extends BaseClass {


	public function __construct()
	{
		$this->model =new JobLocations();
	}

	public function getmainCat()
	{

        return	$data=$this->pagination(10,$this->model->where('parent_id', '=', 0));


	}
	public function getParentcats()
	{
		return $this->model->where('parent_id', '=',0)->get();


	}
	public function getSubcat($parent=0)
	{
		return $this->model->where('parent_id', '=', $parent)->get();


	}
   public function getbyId($id){
		return $this->model->findOrFail($id);

	}
	public function store($inputs)
	{
		$locobj = new $this->model;

		$locobj->name = ucwords($inputs['name']);
		if(isset($inputs['parent'])){
			$parent_id=$inputs['parent'];
		}else{
				$parent_id=0;
		}
		$locobj->parent_id =$parent_id;
        $locobj->save();
		$this->flashFancy('Success' , 'Job Location added successfully', 'success','job_locations.php');

	}
	public function delete($id){
	$this->model->where('parent_id',$id)->delete();
		$this->model->destroy($id);
	}

	public function edit($id){
		return $this->model->find($id);
	}

	public function update($currenobj,$inputs){

        $currenobj->name = $inputs['name'];
        if(isset($inputs['parent'])){
			$parent_id=$inputs['parent'];
		}else{
				$parent_id=0;
		}
		$currenobj->parent_id =$parent_id;
		$currenobj->save();
		$this->flashFancy('Success' , 'Job Location updated successfully', 'success','job_locations.php');

	}
	public function totalCategory()
	{
		return $this->model->count();


	}
}
