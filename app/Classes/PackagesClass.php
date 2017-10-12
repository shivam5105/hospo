<?php  namespace App\Classes;

use App\Models\Packages;

class PackagesClass extends BaseClass {
	
	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct()
	{
		$this->model =new Packages();
	}

	public function get(){
		return	$data=$this->pagination(10,$this->model);
	}
	
	public function store($inputs){		
		
		   $this->model->name = $inputs['name'];
	    $this->model->slug = $inputs['name'];
		$this->model->price = $inputs['price'];
		$this->model->type = $inputs['type'];
         if(isset($inputs['description']) && $inputs['description']!=''){
               $this->model->description =$inputs['description'];
         }
		
		$this->model->save();
		$this->flashFancy('Success' , 'Package added successfully', 'success','packages.php');
		
	}
    public function delete($id){
		$this->model->where('id','=',$id)->delete();
	
	}

	public function edit($id){
		return $this->model->where('id','=',$id)->first();
	
	}

	public function update($currentCat, $inputs){

	    $currentCat->name = $inputs['name'];
	    $currentCat->slug = $inputs['name'];
		$currentCat->price = $inputs['price'];
		$currentCat->type = $inputs['type'];
         if(isset($inputs['description']) && $inputs['description']!=''){
               $currentCat->description =$inputs['description'];
         }
		
		$currentCat->save();
		$this->flashFancy('Success' , 'Category updated successfully', 'success','packages.php');
	}

}