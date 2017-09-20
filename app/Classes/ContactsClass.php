<?php  namespace App\Classes;

use App\Models\Contacts;

class ContactsClass extends BaseClass {
	
	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct()
	{
		$this->model =new Contacts();
	}

	/**
	 * Get contacts collection.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function index()
	{
		return $this->model
		->oldest('seen')
		->latest()
		->get();
	}

	/**
	 * Store a contact.
	 *
	 * @param  array $inputs
	 * @return void
	 */
	public function store($inputs)
	{
		
		if(!empty($inputs)) {
			if(empty($inputs['email'])){
				
				echo json_encode(["status"=>false,"message"=>"Email id required"]);
           
				
			}
			else if (!filter_var($inputs['email'], FILTER_VALIDATE_EMAIL)) {
                      
			    echo json_encode(["status"=>false,"message"=>"Invalid Email id"]);
         
			}else if(empty($inputs['name'])){
				$this->flashFancy('Required', 'Name is required', 'error');

			}else if (!preg_match("/^[A-Za-z0-9 ]{1,}/",$inputs['name'])) {

				$this->flashFancy('Invalid', 'Invalid input for  name', 'error');

     		}else if(empty($inputs['message'])){
						
						$this->flashFancy('Required', 'Message field is required', 'error');
						
			}else{
			     
				$contact = new $this->model;

				$contact->name = $inputs['name'];
				$contact->email = $inputs['email'];
				$contact->message = $inputs['message'];

				$contact->save();	
						
									$this->flashFancy('Thanks you!' , 'Thanks for contacting us ,we will get back to you soon !', 'success');

			}
			
			
			
		}else{
           echo json_encode(["status"=>false,"message"=>"Required fields empty"]);
            
		}	
		
		
	}

	/**
	 * Update a contact.
	 *
	 * @param  bool  $vu
	 * @param  int   $id
	 * @return void
	 */
	public function update($seen, $id)
	{
		$contact = $this->getById($id);

		$contact->seen = $seen == 'true';

		$contact->save();
	}

}