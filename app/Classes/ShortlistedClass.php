<?php  namespace App\Classes;

use App\Models\Shortlisted;

class ShortlistedClass extends BaseClass {
	
	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct()
	{
		$this->model =new Shortlisted();
	}

	public function whoShortlistedMe($loggedinuser){
		//filter or pagination here

		return $this->model->where('to_id','=',$loggedinuser)->get();
	}
    public function whomIshortlisted($loggedinuser){
		//filter or pagination here

		return $this->model->where('by_id','=',$loggedinuser)->get();
	}
	public function interest($id,$loggedinuser,$isinterested){
		
		return $this->model->where('to_id','=',$loggedinuser)>where('id','=',$id)->update(['is_interested' => $isinterested]);;
	
	}
	
	public function store($inputs,$loggedinuser){
		
		$shorlist = new $this->model;
		$shorlist->to_id = $inputs['to_id'];
		$shorlist->by_id =$loggedinuser;
		$shorlist->save();
		
	}
    public function delete($to_id,$loggedinuser){
		$this->model->where('to_id','=',$to_id)->where('from_id','=',$loggedinuser)->delete();
	
	}

	public function update($seen, $id){
		$contact = $this->getById($id);

		$contact->seen = $seen == 'true';

		$contact->save();
	}

}