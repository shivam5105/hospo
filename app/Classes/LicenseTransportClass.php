<?php  namespace App\Classes;

use App\Models\LicenceTransport;

class LicenseTransportClass extends BaseClass {
	
	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct()
	{
		$this->model =new LicenceTransport();
	}

	public function get(){
		return	$data=$this->pagination(10,$this->model);
	}
	
	public function store($inputs){		
		$this->model->name = $inputs['name'];
        
		$this->model->save();
		$this->flashFancy('Success' , 'Licence & Transport added successfully', 'success','license_transport.php');
		
	}
    public function delete($id){
		$this->model->where('id','=',$id)->delete();
	
	}

	public function edit($id){
		return $this->model->where('id','=',$id)->first();
	
	}

	public function update($currentCat, $inputs){

	    $currentCat->name = $inputs['name'];
       
		$currentCat->save();
		$this->flashFancy('Success' , 'Licence & Transport updated successfully', 'success','license_transport.php');
	}

}