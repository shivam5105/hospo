<?php  namespace App\Classes;

use App\Models\Shortlisted;
use App\Classes\UserClass;
class ShortlistedClass extends BaseClass {
	
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


    public function whomIshortlisted($data=NULl){
		//filter or pagination here
		if($loggedInUserId=$this->userobj->loginUserId()){			
		   $user=$this->model->where('by_id','=',$loggedInUserId);
		   
		   if($data!=NULL){
			if(isset($data['category']) && $data['category'] !=''){
			    $category=$data['category'];
				$user =$user->whereHas(
									'EmployeeCategories', function($q) use($category){
										$q->where('category_id',$category);
									}
							);
			}
			if(isset($data['part_or_full']) && $data['part_or_full'] !=''){
				$part_or_full=$data['part_or_full'];
				$user =$user->whereHas(
									'userProfile', function($q) use($part_or_full){
										$q->where('part_or_full',$part_or_full);
									}
							);
			}
			if(isset($data['location']) && $data['location'] !=''){
				$location=$data['location'];
				$user =$user->whereHas(
									'userProfile', function($q) use($location){
										$q->where('location','LIKE', '%'.$location.'%');
									}
							);
			}
			if(isset($data['skill']) && $data['skill'] !=''){
				  $skill=$data['skill'];
				$user =$user->whereHas(
									'Skills', function($q) use($skill){
										$q->where('name',$skill);
									}
							);
			}
			if(isset($data['license_transport']) && $data['license_transport'] !=''){
				  $license_transport=$data['license_transport'];
				$user =$user->whereHas(
									'EmployeeLicenseTransport', function($q) use($license_transport){
										$q->where('licence_transport_id',$license_transport);
									}
							);
			}
			//General Availability filter
		}
		   
		   
		   
			return $this->AjaxPagination(1,9,$user);
		}
	}
	
	public function whomIshortlistedAjax($page,$data=NULl){
		if($loggedInUserId=$this->userobj->loginUserId()){			
			$user=$this->model->where('by_id','=',$loggedInUserId);
						if($data!=NULL){
			if(isset($data['category']) && $data['category'] !=''){
			    $category=$data['category'];
				$user =$user->whereHas(
									'EmployeeCategories', function($q) use($category){
										$q->where('category_id',$category);
									}
							);
			}
			if(isset($data['part_or_full']) && $data['part_or_full'] !=''){
				$part_or_full=$data['part_or_full'];
				$user =$user->whereHas(
									'userProfile', function($q) use($part_or_full){
										$q->where('part_or_full',$part_or_full);
									}
							);
			}
			if(isset($data['location']) && $data['location'] !=''){
				$location=$data['location'];
				$user =$user->whereHas(
									'userProfile', function($q) use($location){
										$q->where('location','LIKE', '%'.$location.'%');
									}
							);
			}
			if(isset($data['skill']) && $data['skill'] !=''){
				  $skill=$data['skill'];
				$user =$user->whereHas(
									'Skills', function($q) use($skill){
										$q->where('name',$skill);
									}
							);
			}
			if(isset($data['license_transport']) && $data['license_transport'] !=''){
				  $license_transport=$data['license_transport'];
				$user =$user->whereHas(
									'EmployeeLicenseTransport', function($q) use($license_transport){
										$q->where('licence_transport_id',$license_transport);
									}
							);
			}
			//General Availability filter
		}
			
			
			$user=$user->with('touser', 'touser.userProfile','touser.EmployeeCategories.category');
			echo  $this->AjaxPagination($page,9,$user)->toJson();
		}
	}
	
	public function shortlistUser($to_id){

		if($loggedInUserId=$this->userobj->loginUserId()){
		
		$shorlist =$this->model->firstOrCreate(['to_id' => $to_id,'by_id' => $loggedInUserId],['to_id' => $to_id,'by_id' => $loggedInUserId,'status' =>1]);
		if($shorlist){
			echo true;
		}else{
		echo false;
		}
		

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