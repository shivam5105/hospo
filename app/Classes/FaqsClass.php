<?php  namespace App\Classes;

use App\Models\Faqs;

class FaqsClass extends BaseClass {
	
	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct()
	{
		$this->model =new Faqs();
	}

	/**
	 * Get contacts collection.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function index()
	{
		return $this->model
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
		$contact = new $this->model;

		$contact->name = $inputs['name'];
		$contact->email = $inputs['email'];
		$contact->mobile = $inputs['mobile'];
		$contact->message = $inputs['message'];

		$contact->save();
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