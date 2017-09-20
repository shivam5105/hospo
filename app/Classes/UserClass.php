<?php  namespace App\Classes;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\EmployeeCategories;
use App\Models\Experiences;
use App\Models\Roles;
use App\Models\Shortlisted;
use App\Models\Categories;
use App\Models\LicenceTransport;
use App\Models\EmployeeLicenceTransport;
use App\Models\Availability;
use App\Classes\MailClass;
use App\Models\Skills;
use App\Models\LoginAttempts;
use Paginator;
class UserClass extends BaseClass {
	
	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct()
	{
		$this->model =new User();
		$this->userprofile =new UserProfile();
		$this->empcategory =new EmployeeCategories();
		$this->experiences =new Experiences();
		$this->licencetransport =new EmployeeLicenceTransport();
		$this->availabitlity =new Availability();
		$this->skills =new Skills();
		$this->roles =new Roles();
		$this->loginattempts =new LoginAttempts();
		$this->categories =new Categories();
		$this->mailer =new MailClass();
		$this->mailer->mailSend();
		
		
	}
	public function categories(){
	   return $this->categories->get();
	
	}
	public function licenseTransport(){
	   return LicenceTransport::get();
	
	}
	public function employeeLicenseTransport(){
	   return EmployeeLicenceTransport::get();
	
	}
	public function emailConfirm($confirmation_code){
		$user = $this->model->where('email_confirmation_code','=',$confirmation_code)->firstOrFail();
		if($user){
			$user->email_confirmed = true;
			$user->email_confirmation_code = null;
			$user->save();
			
			$this->flashFancy('Email Verified', 'Email successfull verified,please login ', 'success');

		}else{
 						$this->flashFancy('Invalid link', 'Your are using invalid link', 'error');


		}
		
		
	}


	public function login_check(){
		// Check if all session variables are set 
		if(isset($_SESSION['logged_in_user']))
		{
			$user_id = $_SESSION['logged_in_user']['user_id'];
			$login_string = $_SESSION['logged_in_user']['login_string'];
			
			// Get the user-agent string of the user.
			$user_browser = $_SERVER['HTTP_USER_AGENT'];
	 	   $role_user = $this->roles->where('slug','admin')->first();

    		$user = $this->model->where('user_id','=',$user_id)->where('role_id','!=',$role_user->id)->first();
        
				if(!empty($user)){
					
					$login_check = hash('sha512', $user->password . $user_browser);
	 
					if($login_check == $login_string)
					{
						// Logged In!!!! 
						return true;
					}
				}
			
		}
		return false;
	}
	
	public function isEmployee(){
		if(isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role']=='employee'){
			
		}else{
				header('Location: '.BASEURL .'/index.php');
		die;
		}	
		
	}
    public function isManager(){
		if(isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role']=='manager'){
			
		}else{
				header('Location: '.BASEURL .'/index.php');
		die;
		}	
		
	}	
	public function checkbrute($user_id){
		$now = time();
		$valid_attempts = $now - (2 * 60 * 60); 

		$user = $this->loginattempts->where('user_id','=',$user_id)->where('createdon','>',$valid_attempts)->first();
		
		if(!empty($user)){
			if($user->count > 5){
				return true;
			}else{
				return false;
			}
		}
    }
	public function trackLoginAttempt($user_id){
		$now = time();
		$userattempt =$this->loginattempts;
		$userattempt->user_id =$user_id;
		$userattempt->createdon =$now;
		$userattempt->save();
		
	}	
    public function changePassword($data,$id){
		if(!empty($data)) {
			if(empty($data['password'])){
				$this->flashFancy('Required', 'Password is required', 'error');
				
				
			}
			else if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$data['password'])) {


				$this->flashFancy('Invalid', 'Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters', 'error');

			}
			else if(empty($data['confirm_password'])){
			$this->flashFancy('Required', 'Confirm Password is required', 'error');
				
				
			}
			else if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$data['confirm_password'])) {

			 $this->flashFancy('Invalid', 'Confirm password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters', 'error');

			}
			else if(!empty($data['confirm_password']) && !empty($data['confirm_password']) && ($data['confirm_password'] !=$data['password'])){

			$this->flashFancy('Confirm Password', 'Confirm Password doesnot match', 'error');
				
				
			}else{
				
				$user = $this->model->where('id','=',$id)->first();
				if($user->role->slug=="admin"){
					$this->flashFancy('Error', 'Invalid request', 'error');
		
				}else{
					$user->password=password_hash($data['password'], PASSWORD_DEFAULT); 
					$user->save();
					if($user->role->slug=='employee'){
						$url='employees.php';
					}else{
                  $url='managers.php';
                    }					
			$this->flashFancy('Password Changed', 'Password Changed Successfully', 'success',$url);

					
				}	
				
				
			}	
			
		}else{

			$this->flashFancy('Empty Fields', 'Please fill all required fields', 'error');

		  }

    }	
	public function login($data){

		if(!empty($data)) {
			if(empty($data['email'])){
				
				echo json_encode(["status"=>false,"message"=>"Email id required"]);
           
				
			}
			else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                      
			    echo json_encode(["status"=>false,"message"=>"Invalid Email id"]);
         
			}
			else if(empty($data['password'])){
				echo json_encode(["status"=>false,"message"=>"Password is required"]);
				
				
			}else{
				$user = $this->model->where('email','=',$data['email'])->first();
                if(empty($user)){

				echo json_encode(["status"=>false,"message"=>"Invalid login"]);
				
				}else{
					if($this->checkbrute($user->id) == true){
        				echo json_encode(["status"=>false,"message"=>"Maximum login attempts exceeded"]);
					
					}else{
						if($user->role->slug=="admin"){
							$this->trackLoginAttempt($user->id);
							echo json_encode(["status"=>false,"message"=>"Invalid login"]);
							
							
						}else{
							if (password_verify($data['password'], $user->password)) {
								
										if($user->email_confirmed==0){
											$this->trackLoginAttempt($user->id);
											   echo json_encode(["status"=>false,"message"=>"Email not verified"]);	
											
										}else if($user->status==0){
											$this->trackLoginAttempt($user->id);
											   echo json_encode(["status"=>false,"message"=>"Your account is Inactive now"]);	
											
										}else{
											$user_browser = $_SERVER['HTTP_USER_AGENT'];
								   $_SESSION['logged_in_user'] =array('email'=>$user->email,'user_id'=>$user->id,'role'=>$user->role->slug,'login_string'=>hash('sha512',$user->password.$user_browser));
											   echo json_encode(["status"=>true,"message"=>"Successfully logged in !"]);	

										}
							} else {
								$this->trackLoginAttempt($user->id);
								echo json_encode(["status"=>false,"message"=>"Invalid login details"]);
								
							}
																	
							
						}
					}
             		
				}
					
			}
	    }else{
           echo json_encode(["status"=>false,"message"=>"Required fields empty"]);
            
		}		
	
	}
	public function signup($data,$file){
		

   		if(!empty($data)) {		

			if(empty($data['first_name'])){
				$this->flashFancy('Required', 'First Name is required', 'error');

			}else if (!preg_match("/^[A-Za-z0-9 ]{1,}/",$data['first_name'])) {

				$this->flashFancy('Invalid', 'Invalid input for first name', 'error');


			}
			else if(empty($data['last_name'])){
				$this->flashFancy('Required', 'Last Name is required', 'error');
				
				
			}
			else if (!preg_match("/^[A-Za-z0-9 ]{1,}/",$data['last_name'])) {

				$this->flashFancy('Invalid', 'Invalid input for last name', 'error');


			}
			else if(empty($data['phone'])){
				$this->flashFancy('Required', 'Phone is required', 'error');
				
				
			}
			else if (!preg_match("/^[0-9]{9,}/",$data['phone'])) {

				$this->flashFancy('Invalid', 'Invalid input for phone ', 'error');


			}
			else if(empty($data['email'])){
				
				$this->flashFancy('Required', 'Email is required', 'error');
				
			}
			else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

				$this->flashFancy('Invalid', 'Invalid Email', 'error');


			}
			else if(empty($data['password'])){
				$this->flashFancy('Required', 'Password is required', 'error');
				
				
			}
			else if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$data['password'])) {


				$this->flashFancy('Invalid', 'Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters', 'error');

			}
			else if(empty($data['confirm_password'])){
			$this->flashFancy('Required', 'Confirm Password is required', 'error');
				
				
			}
			else if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$data['confirm_password'])) {

			 $this->flashFancy('Invalid', 'Confirm password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters', 'error');

			}
			else if(!empty($data['confirm_password']) && !empty($data['confirm_password']) && ($data['confirm_password'] !=$data['password'])){

			$this->flashFancy('Confirm Password', 'Confirm Password doesnot match', 'error');
				
				
			}
			
			else if(empty($data['account'])){
				
				$this->flashFancy('Required', 'Account type is required', 'error');
				
			}

		    if($data['account']=='employee'){
		    
					if($data['currently_looking_for_work']==''){
						
						$this->flashFancy('Required', 'Are You Currently Looking For Work is required', 'error');
						
					}
					
					else if(!isset($file['profile']['name'])){
						
						$this->flashFancy('Required', 'Profile pic is required', 'error');
						
					}
	               else if(getimagesize($file["profile"]["tmp_name"]) == false ){
					    	$this->flashFancy('Invalid file', 'Invalid Image', 'error');

                    }
					else if(empty($data['categories'])){
						$this->flashFancy('Required', 'I’m looking for work in. is required', 'error');
						
						
					}
					else if(empty($data['current_status'])){
						$this->flashFancy('Required', 'I am currently is required', 'error');
						
						
					}
					else if(empty($data['part_or_full'])){
						
						$this->flashFancy('Required', 'Part-time or full-time is required', 'error');
						
					}
					else if(empty($data['license_transport'])){
						
						$this->flashFancy('Required', 'License and Transport is required', 'error');
						
					}
					else if(empty($data['location'])){
						$this->flashFancy('Required', 'Your location is required', 'error');
						
						
					}
					else if(empty($data['skills'])){
						
						$this->flashFancy('Required', 'Skills is required', 'error');
						
					}
					else if (!preg_match("/^[A-Za-z -,.]{1,}/",$data['skills'])) {


						$this->flashFancy('Invalid', 'Skills should be comma seperated only', 'error');

					}
					// if(empty($data['license_transport'])){
						
						
					// }
					else if(empty($data['about'])){
						
						$this->flashFancy('Required', 'About yourself is required', 'error');
						
					}
                   else if (strlen($data['about'])<50) {

						$this->flashFancy('Required', 'About yourself should atleast 50 character long', 'error');


					}
					
					else if(empty($data['mon'])){
						$this->flashFancy('Required', 'Availability monday  is required', 'error');
						
						
					}
					else if(empty($data['tue'])){
						
						$this->flashFancy('Required', 'Availability tuesday  is required', 'error');
						
					}
					else if(empty($data['wed'])){
						
						$this->flashFancy('Required', 'Availability wednesday  is required', 'error');
						
					}
					else if(empty($data['thu'])){
						$this->flashFancy('Required', 'Availability thursday  is required', 'error');
						
						
					}
					else if(empty($data['fri'])){
						
						$this->flashFancy('Required', 'Availability friday  is required', 'error');
						
					}
					else if(empty($data['sat'])){
						
						$this->flashFancy('Required', 'Availability saturday is required', 'error');
						
					}

					else if(empty($data['sun'])){
						
						$this->flashFancy('Required', 'Availability sunday is required', 'error');
						
					}
					else if(count($data['employer'])==0){
						$this->flashFancy('Required', 'Experience employer is required', 'error');
						
						
					}
					else if(empty($data['job_title'])){
						$this->flashFancy('Required', 'Experience job title is required', 'error');
						
						
					}
					else if(empty($data['job_location'])){
						
						$this->flashFancy('Required', 'Experience location is required', 'error');
						
					}
					else if(empty($data['start_date'])){
						$this->flashFancy('Required', 'Experience Start Date is required', 'error');
						
						
					}
					else if(empty($data['end_date'])){
						$this->flashFancy('Required', 'Experience End date is required', 'error');
						
						
					}
					else if(empty($data['job_description'])){
						$this->flashFancy('Required', 'Job description is required', 'error');
						
						
					}
					else{
					////profile pic validatio nwith multipart form data	   
						$user = $this->model->where('email','=',$data['email'])->first();
							if(empty($user)){
								 $userphone = $this->model->where('phone','=',$data['phone'])->first();
								if(empty($userphone)){
								$role_user = $this->roles->where('slug','employee')->first();

									$userobj = User::create([
										'email' => $data['email'],
										'phone' => $data['phone'],
										'role_id' =>$role_user->id,
										'phone_confirmed' =>0,
										'email_confirmed' =>0,
										'email_confirmation_code' =>password_hash(openssl_random_pseudo_bytes(32).time().$data['email'], PASSWORD_DEFAULT),
										'password' =>password_hash($data['password'], PASSWORD_DEFAULT) ,
										'status' => 1,

										]);

									$extension = pathinfo($file["profile"]["name"],PATHINFO_EXTENSION);

                                $filename=md5($data['email'].date("Y-m-d H:i:s")).'.'.$extension;
								$target_file =BASEPATH."/uploads/profile/".$filename;
										
	                                 if (move_uploaded_file($file["profile"]["tmp_name"], $target_file)) {

									$userprofileobj = UserProfile::create([
										'first_name' => $data['first_name'],
										'last_name' =>$data['last_name'],
										'user_id' =>$userobj->id,
										'profile' =>$filename,
										'about' => $data['about'],
										'current_status' =>$data['current_status'],
										'location' => $data['location'],
										'prmo_code' => isset($data['prmo_code'])?$data['prmo_code']:NULL,
										'currently_looking_for_work' =>$data['currently_looking_for_work'],
										'part_or_full' =>$data['part_or_full'],
										]);
	                                }

										
									$catsarray=[];
									foreach($data['categories'] as $cat){
										array_push($catsarray,[
										'category_id' => $cat,
										'user_id' =>$userobj->id,									
										]);

									}
									$emplcategories = EmployeeCategories::insert($catsarray);

									$skills=array_unique(explode(",",$data['skills'] ));
                                    $skillarray=[];

									foreach($skills as $skill){
									  array_push($skillarray,[
										'name' => $skill,
										'user_id' =>$userobj->id,									
										]);
									}

									Skills::insert($skillarray);
									
                                       $license=[];
									foreach($data['license_transport'] as $data){
										array_push($license,[
										'licence_transport_id' => $data,
										'user_id' =>$userobj->id,									
										]);

									}
									 EmployeeLicenceTransport::insert($license);									


									$experiencearray=[];
									
									foreach($data['employer'] as $key=>$emp){
										array_push($experiencearray,[ //multidimensional array
										'user_id' => $userobj->id,
										'employer' => $emp,
										'location' =>$data['job_location'][$key],
										'job_title' =>$data['job_title'][$key],
										'job_description' => $data['job_description'][$key],
										'start_date' =>$data['start_date'][$key],
										'end_date' =>$data['end_date'][$key],

										]);
									}
									Experiences::insert($experiencearray);									
									
									$mon= implode(",",$data['mon']);
									$tue=implode(",",$data['tue']);
									$wed=implode(",",$data['wed']);
									$thu= implode(",",$data['thu']);
									$fri=implode(",",$data['fri']);
									$sat=implode(",",$data['sat']);
									$sun=implode(",",$data['sun']);
									 Availability::create([
											'user_id' =>  $userobj->id,
											'mon' =>"$mon",
											'tue' =>"$tue",
											'wed' =>"$wed",
											'thu' =>"$thu",
											'fri' =>"$fri",
											'sat' =>"$sat",
											'sun' =>"$sun",
										
									]);
									
										$this->flashFancy('Signup | Email Verify' , 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.', 'success');

												
								}else{
									$this->flashFancy('Mobile Already exist' , 'User with this mobile is already exist ', 'error');

								
								}
							   
							}else{
							
								$this->flashFancy('Email Already exist' , 'User with this email is already exist ', 'error');

							
							
							}
						
						}

		    }else{
				
		    }
		}else{

			$this->flashFancy('Empty Fields', 'Please fill all required fields', 'error');

		  }

					
	}

	public function roles()	{
		return $this->roles->where('slug','!=','admin')->get();
	}
	
	public function employees()	{		
		$role=$this->roles->where('slug','=','employee')->first();
		//filter or pagination here
		return $user = $this->model->where('email_confirmed','=',1)->where('status','=',1)->where('role_id','=',$role->id)->get();

	}
	
	public function editEmployee($currentuser,$data,$file){
			
		  
   		if(!empty($data)) {		

			if(empty($data['first_name'])){
				$this->flashFancy('Required', 'First Name is required', 'error');

			}else if (!preg_match("/^[A-Za-z0-9 ]{1,}/",$data['first_name'])) {

				$this->flashFancy('Invalid', 'Invalid input for first name', 'error');


			}
			else if(empty($data['last_name'])){
				$this->flashFancy('Required', 'Last Name is required', 'error');
				
				
			}
			else if (!preg_match("/^[A-Za-z0-9 ]{1,}/",$data['last_name'])) {

				$this->flashFancy('Invalid', 'Invalid input for last name', 'error');


			}
			else if(empty($data['phone'])){
				$this->flashFancy('Required', 'Phone is required', 'error');
				
				
			}
			else if (!preg_match("/^[0-9]{9,}/",$data['phone'])) {

				$this->flashFancy('Invalid', 'Invalid input for phone ', 'error');


			}
			else if(empty($data['email'])){
				
				$this->flashFancy('Required', 'Email is required', 'error');
				
			}
			else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

				$this->flashFancy('Invalid', 'Invalid Email', 'error');


			}
			 if($data['currently_looking_for_work']==''){
						
						$this->flashFancy('Required', 'Are You Currently Looking For Work is required', 'error');
						
					}
					
					 else if(isset($file['profile']['name']) && !empty($file['profile']['name']) ){
				         if(getimagesize($file["profile"]["tmp_name"]) == false){
					    	$this->flashFancy('Invalid file', 'Invalid Image', 'error');
						 }
                    }
					else if(empty($data['categories'])){
						$this->flashFancy('Required', 'I’m looking for work in. is required', 'error');
						
						
					}
					else if(empty($data['current_status'])){
						$this->flashFancy('Required', 'I am currently is required', 'error');
						
						
					}
					else if(empty($data['part_or_full'])){
						
						$this->flashFancy('Required', 'Part-time or full-time is required', 'error');
						
					}
					else if(empty($data['license_transport'])){
						
						$this->flashFancy('Required', 'License and Transport is required', 'error');
						
					}
					else if(empty($data['location'])){
						$this->flashFancy('Required', 'Your location is required', 'error');
						
						
					}
					else if(empty($data['skills'])){
						
						$this->flashFancy('Required', 'Skills is required', 'error');
						
					}
					else if (!preg_match("/^[A-Za-z -,.]{1,}/",$data['skills'])) {


						$this->flashFancy('Invalid', 'Skills should be comma seperated only', 'error');

					}
					// if(empty($data['license_transport'])){
						
						
					// }
					else if(empty($data['about'])){
						
						$this->flashFancy('Required', 'About yourself is required', 'error');
						
					}
                   else if (strlen($data['about'])<50) {

						$this->flashFancy('Required', 'About yourself should atleast 50 character long', 'error');


					}
					
					else if(empty($data['mon'])){
						$this->flashFancy('Required', 'Availability monday  is required', 'error');
						
						
					}
					else if(empty($data['tue'])){
						
						$this->flashFancy('Required', 'Availability tuesday  is required', 'error');
						
					}
					else if(empty($data['wed'])){
						
						$this->flashFancy('Required', 'Availability wednesday  is required', 'error');
						
					}
					else if(empty($data['thu'])){
						$this->flashFancy('Required', 'Availability thursday  is required', 'error');
						
						
					}
					else if(empty($data['fri'])){
						
						$this->flashFancy('Required', 'Availability friday  is required', 'error');
						
					}
					else if(empty($data['sat'])){
						
						$this->flashFancy('Required', 'Availability saturday is required', 'error');
						
					}

					else if(empty($data['sun'])){
						
						$this->flashFancy('Required', 'Availability sunday is required', 'error');
						
					}
					else if(empty($data['employer'])){
						$this->flashFancy('Required', 'Experience employer is required', 'error');
						
						
					}
					else if(empty($data['job_title'])){
						$this->flashFancy('Required', 'Experience job title is required', 'error');
						
						
					}
					else if(empty($data['job_location'])){
						
						$this->flashFancy('Required', 'Experience location is required', 'error');
						
					}
					else if(empty($data['start_date'])){
						$this->flashFancy('Required', 'Experience Start Date is required', 'error');
						
						
					}
					else if(empty($data['end_date'])){
						$this->flashFancy('Required', 'Experience End date is required', 'error');
						
						
					}
					else if(empty($data['job_description'])){
						$this->flashFancy('Required', 'Job description is required', 'error');
						
						
					}
					else{
						
					////profile pic validatio nwith multipart form data	   
						$user = $this->model->where('email','=',$data['email'])->first();
							if(empty($user) || trim($currentuser->email)==trim($data['email'])){
								 $userphone = $this->model->where('phone','=',$data['phone'])->first();
								if(empty($userphone)  || trim($currentuser->phone)==trim($data['phone'])){
                                       
									$userobj =$this->model->where('id','=',$currentuser->id)->update([
										'email' => $data['email'],
										'phone' => $data['phone'],
										'email_confirmed' =>trim($data['email_confirmed']),
										'status' =>$data['status']

										]);
								
									$userprofiledata=[
										'first_name' => $data['first_name'],
										'last_name' =>$data['last_name'],
										'about' => $data['about'],
										'current_status' =>$data['current_status'],
										'location' => $data['location'],
										'prmo_code' => isset($data['prmo_code'])?$data['prmo_code']:NULL,
										'currently_looking_for_work' =>$data['currently_looking_for_work'],
										'part_or_full' =>$data['part_or_full'],
										];
                                     if(isset($file['profile']['name']) && !empty($file['profile']['name'])){
										 if(getimagesize($file["profile"]["tmp_name"]) != false){
										$extension = pathinfo($file["profile"]["name"],PATHINFO_EXTENSION);
										$filename=md5($data['email'].date("Y-m-d H:i:s")).'.'.$extension;
										$target_file =SITEBASEPATH."/uploads/profile/".$filename;
										$old_file =SITEBASEPATH."/uploads/profile/".$currentuser->userProfile->profile;
										if(file_exists($old_file)){
											unlink($old_file);
										}
										
										  if (move_uploaded_file($file["profile"]["tmp_name"], $target_file)) {
                                    
									          $userprofiledata['profile']=$filename;
											 
	                                       }
									 }	 
									 }	 
									
								 
                                   $userprofileobj =$this->userprofile->where('user_id','=',$currentuser->id)->update($userprofiledata);
								   			
								   	$oldcats = array_column($currentuser->EmployeeCategories->toArray(), 'category_id');
									$result=array_diff($oldcats,$data['categories']);
									if(count($result)){
										foreach($result as $oldcat){
										   $this->empcategory->where('user_id','=',$currentuser->id)->where('category_id','=',$oldcat)->delete();

										}

			                         }
									$newcats=array_unique(array_diff($data['categories'],$oldcats));
	
									$catsarray=[];
									foreach($newcats as $cat){
										array_push($catsarray,[
										'category_id' => $cat,
										'user_id' =>$currentuser->id,									
										]);

									}
									$emplcategories = EmployeeCategories::insert($catsarray);
									
										

									$skills=array_unique(explode(",",$data['skills'] ));
									
									 $oldskills = array_column($currentuser->Skills->toArray(), 'name');	   

									$result=array_diff($oldskills,$skills);
									if(count($result)){
										foreach($result as $val){
										   $this->skills->where('user_id','=',$currentuser->id)->where('name','=',$val)->delete();

										}

			                         }
											
                                    $skillarray=[];
                                    $newskills=array_unique(array_diff($skills,$oldskills));

									foreach($newskills as $skill){
									  array_push($skillarray,[
										'name' => $skill,
										'user_id' =>$currentuser->id,									
										]);
									}

									Skills::insert($skillarray);
									
									
									
								   $oldlicenses = array_column($currentuser->EmployeeLicenseTransport->toArray(), 'licence_transport_id');	   

									$result=array_diff($oldlicenses,$data['license_transport']);
									if(count($result)){
										foreach($result as $val){
										   $this->licencetransport->where('user_id','=',$currentuser->id)->where('licence_transport_id','=',$val)->delete();

										}

			                         }
									$newlicenses=array_unique(array_diff($data['license_transport'],$oldlicenses));
									
									
									
                                       $license=[];
									foreach($newlicenses as $data){
										array_push($license,[
										'licence_transport_id' => $data,
										'user_id' =>$currentuser->id,									
										]);

									}
									 EmployeeLicenceTransport::insert($license);	

									 
                                    $oldexp = array_column($currentuser->Experiences->toArray(), 'id');	   

									$result=array_diff($oldexp,$data['experiencid']);
									if(count($result)){
										foreach($result as $val){
										  $this->experiences->where('user_id','=',$currentuser->id)->where('id','=',$val)->delete();

										}

			                         }

									$experiencearray=[];
									$experienceUpdate=[];
									foreach($data['employer'] as $key=>$emp){
										if(isset($data['experiencid'][$key])){
											
									$this->experiences->where('user_id','=', $currentuser->id)->where('id','=', $data['experiencid'][$key])->update([ 
										'employer' => $emp,
										'location' =>$data['job_location'][$key],
										'job_title' =>$data['job_title'][$key],
										'job_description' => $data['job_description'][$key],
										'start_date' =>$data['start_date'][$key],
										'end_date' =>$data['end_date'][$key],

										]);
									
											
										}else{
												array_push($experiencearray,[ //multidimensional array
												'user_id' => $currentuser->id,
												'employer' => $emp,
												'location' =>$data['job_location'][$key],
												'job_title' =>$data['job_title'][$key],
												'job_description' => $data['job_description'][$key],
												'start_date' =>$data['start_date'][$key],
												'end_date' =>$data['end_date'][$key],

												]);
                                        }										
										
										
									}
									if(count($experiencearray)){
										Experiences::insert($experiencearray);									

									}	
									
									 $this->availabitlity->where('user_id','=', $currentuser->id)->update([
											'mon' => implode(",",$data['mon']),
											'tue' =>implode(",",$data['tue']),
											'wed' =>implode(",",$data['wed']),
											'thu' => implode(",",$data['thu']),
											'fri' =>implode(",",$data['fri']),
											'sat' =>implode(",",$data['sat']),
											'sun' =>implode(",",$data['sun']),
										
									]);
									
										$this->flashFancy('Empoyee Updated' , 'Employee details udpated', 'success','employees.php');

												
								}else{
									$this->flashFancy('Mobile Already exist' , 'User with this mobile is already exist ', 'error');

								
								}
							   
							}else{
							
								$this->flashFancy('Email Already exist' , 'User with this email is already exist ', 'error');

							
							
							}
						
						}

		   
		}else{

			$this->flashFancy('Empty Fields', 'Please fill all required fields', 'error');

		  }

					
	}
	
	public function deleteEmployee($id)	{		
		$role=$this->roles->where('slug','=','employee')->first();
		$user=$this->model->where('id','=',$id)->where('role_id','=',$role->id);
		UserProfile::where('user_id','=',$id)->delete();
		EmployeeCategories::where('user_id','=',$id)->delete();
		Experiences::where('user_id','=',$id)->delete();
		Availability::where('user_id','=',$id)->delete();
		Skills::where('user_id','=',$id)->delete();
		EmployeeCategories::where('user_id','=',$id)->delete();
		Shortlisted::where('to_id','=',$id)->delete();
        $user->delete();
		return true;
	}
	public function allEmployees(){

		$role=$this->roles->where('slug','=','employee')->first();
		$usermodel=$this->model->where('role_id','=',$role->id);		
		return $data=$this->pagination(1,$usermodel);
		
		
	}
    public function getEmployeeEmailByUserid($id){
	    $role=$this->roles->where('slug','=','employee')->first();
		return $user=$this->model->where('id','=',$id)->where('role_id','=',$role->id)->first(['email']);
	}	
	 public function employeedetails($id){
	    $role=$this->roles->where('slug','=','employee')->first();
		return $user=$this->model->where('id','=',$id)->where('role_id','=',$role->id)->first();
	}

}