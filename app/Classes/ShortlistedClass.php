<?php  namespace App\Classes;

use App\Models\Shortlisted;
use App\Classes\UserClass;
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
		$this->userobj=new UserClass();
	}
	public function interest($data){
		if($loggedInUserId=$this->userobj->loginUserId()){	
             
			foreach($data as $key=>$val){
		      $this->model->where('to_id','=',$loggedInUserId)->where('id','=',$key)->update(['is_interested' => $val,'status' =>$val]);;
		
			}
	
			
	   }
	  $this->flashFancy('Success' , 'Data Saved', 'success','dashboard.php');
	}

	public function whoShortlistedMe(){
		//filter or pagination here
		if($loggedInUserId=$this->userobj->loginUserId()){	

	  return  $data= $this->model->where('to_id','=',$loggedInUserId)->WhereNull('is_interested')->where('status','=',1)->groupBy('by_id')->get();

		}
		//return $this->model->get();
	}


    public function whomIshortlisted(){
		//filter or pagination here
		if($loggedInUserId=$this->userobj->loginUserId()){			
		   $user=$this->model->where('by_id','=',$loggedInUserId);
			return $this->AjaxPagination(1,9,$user);
		}
	}
	
	public function whomIshortlistedAjax($page){
		if($loggedInUserId=$this->userobj->loginUserId()){			
			$user=$this->model->where('by_id','=',$loggedInUserId)->with('touser', 'touser.userProfile','touser.EmployeeCategories.category');
			echo  $this->AjaxPagination($page,9,$user)->toJson();
		}
	}
	
	public function shortlistUser($to_id){

		if($loggedInUserId=$this->userobj->loginUserId()){
			$shorlist =$this->model->firstOrCreate(['to_id' => $to_id,'by_id' => $loggedInUserId],['to_id' => $to_id,'by_id' => $loggedInUserId,'status' =>1]);
		

		}
	
		
	}
    public function removeShorlist($to_id){
		if($loggedInUserId=$this->userobj->loginUserId()){
			
		   $deletedrow=$this->model->where('to_id','=',$to_id)->where('by_id','=',$loggedInUserId)->delete();
			if($deletedrow){
		    	echo true;
					
			}else{
		    	echo false;

			}
		}
	}

	public function update($seen, $id){
		$contact = $this->getById($id);

		$contact->seen = $seen == 'true';

		$contact->save();
	}

}