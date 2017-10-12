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
use App\Models\Subscription;
use App\Models\Packages;
use App\Models\LoginAttempts;
use Paginator;
use DB;
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
		$this->packages =new Packages();
		$this->subcription =new Subscription();
		$this->roles =new Roles();
		$this->loginattempts =new LoginAttempts();
		$this->categories =new Categories();
		$this->mailer =new MailClass();
		$this->mailer->mailSend();
		
		
	}
	public function getPackagebyId($id){

		return $this->packages->where('id','=',$id)->first();
	}
	
	public function check_txnid($tnxid){
		
		$data=$this->subcription->where('txn_id','=',$tnxid)->first();
		if(count($data)){
			return false;
		}else{
		return true;
		}
	}
	public function validatePaymentAmount($amount,$package_id){
		
		$data=$this->packages->where('id','=',$package_id)->where('price','=',$amount)->first();
	   if(count($data)){
			return true;
		}else{
		return false;
		}
	}
	
	public function PaymentUpdate($data){
		
		$usersubobj = Subscription::create([
			'package_id' => $data['item_number'],
			'txn_id' => $data['txn_id'],
			'user_id' =>$data['custom'],
			'payment_date' =>date("Y-m-d H:i:s"),
			'status' =>'Paid',
			]);	
		$userobj =$this->model->where('id','=',$data['custom'])->update(['status' =>1,'membership_status' =>'Active']);
    }

	public function categories(){
	   return $this->categories->where('status','=','1')->get();
	
	}
	public function allskills(){
	   return $this->skills->groupBy('name')->get();
	
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
  public function setJobHuntStatus($status){

  	if($loggedInUserId=$this->loginUserId()){	

	  return  $data= $this->userprofile->where('user_id','=',$loggedInUserId)->update(['currently_looking_for_work' => $status]);;

		}
  }
   public function logout(){

	$_SESSION = array();
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	
	session_unset();
	session_destroy();
    echo 1;

	die;

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

    		$user = $this->model->where('id','=',$user_id)->where('role_id','!=',$role_user->id)->first();
        
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
	
	public function loginUserId(){

		if($this->login_check()){
		   return 	$_SESSION['logged_in_user']['user_id'];
		}
	}

	public function getloginProfile(){

		$userid=$this->loginUserId();
		return $this->userprofile->where('user_id','=',$userid)->first();
	}
	
	
	
	public function withoutLoginOnly(){
      if($this->login_check()){
		   				header('Location: '.BASEURL .'/index.php');
           
	}


	}
	public function isEmployee($ajax=false){
	
		if($this->login_check()==true && isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role']=='employee'){
		     if($ajax==true){
				return true;
				}
			
		}else{
		        if($ajax==true){
				return  false;
				}else{
					header('Location: '.BASEURL .'/index.php');
		                 die;
				}
			
		}	
		
	}
    public function isManager($ajax=false){
		if($this->login_check()==true && isset($_SESSION['logged_in_user']) && $_SESSION['logged_in_user']['role']=='manager'){
			  if($ajax==true){
				return true;
				}else{
				 return 	$_SESSION['logged_in_user']['membership_status'];

				
				}
		}else{
			 if($ajax==true){
				return  false;
				}else{
					header('Location: '.BASEURL .'/index.php');
		                 die;
				}
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
								   $_SESSION['logged_in_user'] =array('email'=>$user->email,'user_id'=>$user->id,'role'=>$user->role->slug,'login_string'=>hash('sha512',$user->password.$user_browser),'membership_status'=>$user->membership_status);
											   echo json_encode(["status"=>true,'role'=>$user->role->slug,"message"=>"Successfully logged in !"]);	

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
	
	
	public function payment($user_id,$package){
		
	$querystring = '';
	
	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode(PAYPAL_ID)."&";
	
	// Append amount& currency (£) to quersytring so it cannot be edited in html
	
	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
	$querystring .= "cmd=_xclick&";
	//$querystring .= "no_note=1&";
	$querystring .= "currency_code=".CURRENCY_CODE."&";
	$querystring .= "item_number=".urlencode($package->id)."&";
	$querystring .= "item_name=".urlencode($package->name)."&";
	$querystring .= "amount=".urlencode($package->price)."&";
	
	//loop for posted values and append to querystring
	/* 
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	 */
	 
	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes(PAYPAL_CANCEL_URL))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes(PAYPAL_CANCEL_URL))."&";
	$querystring .= "notify_url=".urlencode(PAYPAL_NOTIFY_URL);
	
	// Append querystring with custom field
	$querystring .= "&custom=".$user_id;
	
	// Redirect to paypal IPN
	//echo PAYPAL_URL.$querystring;
	header('location:'.PAYPAL_URL.$querystring);
	exit();
		
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
		
			 if($data['account']=='manager'){
			 	$role_user = $this->roles->where('slug','manager')->first();

			 	 
						$user = $this->model->where('email','=',$data['email'])->first();
							if(empty($user)){
								 $userphone = $this->model->where('phone','=',$data['phone'])->first();
								if(empty($userphone)){
                              	$userobj = User::create([
										'email' => $data['email'],
										'phone' => $data['phone'],
										'role_id' =>$role_user->id,
										'phone_confirmed' =>0,
										'email_confirmed' =>0,
										'email_confirmation_code' =>password_hash(openssl_random_pseudo_bytes(32).time().$data['email'], PASSWORD_DEFAULT),
										'password' =>password_hash($data['password'], PASSWORD_DEFAULT) ,
										'status' =>1,
										'membership_status' =>'Inactive',

										]);
										
										$userprofileobj = UserProfile::create([
										'first_name' => $data['first_name'],
										'last_name' =>$data['last_name'],
										'user_id' =>$userobj->id,
										'prmo_code' => isset($data['prmo_code'])?$data['prmo_code']:NULL,
										
										]);
										//print_r($userprofileobj);
										//echo "<script type='text/javascript'>  window.location='index.php'; </script>";

										//header('location:payment.php?user_id='.$userobj->id.'&package='.$role_user->packages->id);
										
										//$_SESSION['CURRENT_USER_ID']=$userobj->id;
									//$this->payment($userobj->id,$role_user->packages);

										$this->flashFancy('Signup | Email Verify' , 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.', 'success');

												
								}else{
									$this->flashFancy('Mobile Already exist' , 'User with this mobile is already exist ', 'error');

								
								}
							   
							}else{
							
								$this->flashFancy('Email Already exist' , 'User with this email is already exist ', 'error');

							
							
							}

			 }
		     else if($data['account']=='employee'){
		    
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

                               	
									$mon= implode(",",$data['mon']);
									$tue=implode(",",$data['tue']);
									$wed=implode(",",$data['wed']);
									$thu= implode(",",$data['thu']);
									$fri=implode(",",$data['fri']);
									$sat=implode(",",$data['sat']);
									$sun=implode(",",$data['sun']);

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


									
									Experiences::insert($experiencearray);									
								
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

		    }
		}else{

			$this->flashFancy('Empty Fields', 'Please fill all required fields', 'error');

		  }

					
	}

	public function roles()	{
		return $this->roles->where('slug','!=','admin')->get();
	}
	
	public function employees($data=NULL)	{		
		$role=$this->roles->where('slug','=','employee')->first();
		$user=$this->model->where('role_id','=',$role->id)->where('email_confirmed','=',1)->where('status','=',1);
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
		$user =$user->with('userProfile', 'EmployeeCategories');
		
		return $this->AjaxPagination(1,9,$user);
	}
	public function employeePagination($page,$data=NULl){

		$role=$this->roles->where('slug','=','employee')->first();
		$user = $this->model->where('role_id','=',$role->id)->where('email_confirmed','=',1)->where('status','=',1);
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
		$user=$user->with('userProfile', 'EmployeeCategories');
		
		echo  $this->AjaxPagination($page,9,$user)->toJson();
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
		public function editManager($currentuser,$data){
			
		  
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
			
			else{
						
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
										];
                                 
								 
                                   $userprofileobj =$this->userprofile->where('user_id','=',$currentuser->id)->update($userprofiledata);
								 	
									
										$this->flashFancy('Manager Updated' , 'Manager details udpated', 'success','managers.php');

												
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
	public function deleteManager($id)	{		
		$role=$this->roles->where('slug','=','manger')->first();
		$user=$this->model->where('id','=',$id)->where('role_id','=',$role->id);
		UserProfile::where('user_id','=',$id)->delete();
		Subscription::where('user_id','=',$id)->delete();
		
		Shortlisted::where('by_id','=',$id)->delete();
        $user->delete();
		return true;
	}
	public function allEmployees(){
		$role=$this->roles->where('slug','=','employee')->first();

		$usermodel=$this->model->where('role_id','=',$role->id);
		if(isset($_GET['email']) && $_GET['email']!=''){
			$usermode=$usermodel->where('email','LIKE','%'.$_GET['email'].'%');
		}
			if(isset($_GET['phone']) && $_GET['phone']!=''){
			$usermode=$usermodel->where('phone','LIKE','%'.$_GET['phone'].'%');
		}
		if(isset($_GET['status']) && $_GET['status']!=''){ 
			$usermode=$usermodel->where('status','=',$_GET['status']);
		}	
		if(isset($_GET['email_confirmed']) && $_GET['email_confirmed']!=''){ 
			$usermode=$usermodel->where('email_confirmed','=',$_GET['email_confirmed']);
		}
		if(isset($_GET['year']) && $_GET['year']!=''){ 
			$usermode=$usermodel->whereYear('create_date','=',$_GET['year']);
		}	
		if(isset($_GET['month']) && $_GET['month']!=''){ 
			$usermode=$usermodel->whereMonth('create_date','=',$_GET['month']);
		}	

		$part_or_full=@$_GET['part_or_full'];
		$category=@$_GET['category'];

		$currently_looking_for_work=@$_GET['currently_looking_for_work']; 
		$current_status=@$_GET['current_status'];

        if(count($category)){
			$usermodel=$usermodel->whereHas(
			'EmployeeCategories', function($q) use($category){
			    $q->whereIn('category_id',$category);
			}
			);

		}
		if($part_or_full!=''){
		$usermodel=$usermodel->whereHas(
		'userProfile', function($q) use($part_or_full){
		    $q->where('part_or_full', '=',$part_or_full);
		}
		);

		}
		if($currently_looking_for_work!=''){
		$usermodel=$usermodel->whereHas(
		'userProfile', function($q) use($currently_looking_for_work){
		    $q->where('currently_looking_for_work', '=',$currently_looking_for_work);
		}
		);

		}
		if($current_status!=''){
		$usermodel=$usermodel->whereHas(
		'userProfile', function($q) use($current_status){
		    $q->where('current_status', '=',$current_status);
		}
		);

		}		
		return $data=$this->pagination(10,$usermodel);
		
		
	}
	
	
		public function allManagers(){
		$role=$this->roles->where('slug','=','manager')->first();

		$usermodel=$this->model->where('role_id','=',$role->id);
		if(isset($_GET['email']) && $_GET['email']!=''){
			$usermode=$usermodel->where('email','LIKE','%'.$_GET['email'].'%');
		}
			if(isset($_GET['phone']) && $_GET['phone']!=''){
			$usermode=$usermodel->where('phone','LIKE','%'.$_GET['phone'].'%');
		}
		if(isset($_GET['status']) && $_GET['status']!=''){ 
			$usermode=$usermodel->where('status','=',$_GET['status']);
		}	
		if(isset($_GET['email_confirmed']) && $_GET['email_confirmed']!=''){ 
			$usermode=$usermodel->where('email_confirmed','=',$_GET['email_confirmed']);
		}
		if(isset($_GET['year']) && $_GET['year']!=''){ 
			$usermode=$usermodel->whereYear('create_date','=',$_GET['year']);
		}	
		if(isset($_GET['month']) && $_GET['month']!=''){ 
			$usermode=$usermodel->whereMonth('create_date','=',$_GET['month']);
		}	
	
		return $data=$this->pagination(10,$usermodel);
		
		
	}
	
	  public function getUserEmailByID($id){
	    
		return $user=$this->model->where('id','=',$id)->first(['email']);
	}	
    public function getEmployeeEmailByUserid($id){
	    $role=$this->roles->where('slug','=','employee')->first();
		return $user=$this->model->where('id','=',$id)->where('role_id','=',$role->id)->first(['email']);
	}	
	 public function employeedetails($id){
	    $role=$this->roles->where('slug','=','employee')->first();
		return $user=$this->model->where('id','=',$id)->where('role_id','=',$role->id)->first();
	}
	 public function managerdetails($id){
	    $role=$this->roles->where('slug','=','manager')->first();
		return $user=$this->model->where('id','=',$id)->where('role_id','=',$role->id)->first();
	}
	public function employeeDetailsAjax($id,$type){
		
		$employeee=$this->employeedetails($id);
		if($employeee){
			$categories='';
			foreach($employeee->EmployeeCategories as $cat){
			    $categories.=$cat->category->name.',';
			}
			$categories=trim($categories,',');
			$licenses='';
			foreach($employeee->EmployeeLicenseTransport as $obj){
			    $licenses.=$obj->licenseTransport->name.',';
			}
			$licenses=trim($licenses,',');

			$experiences='';
			 foreach($employeee->Experiences as $experience){
			 $experiences.='<div class="all-dtl"><h4>'.$experience->employer.'</h4> <address>'.$experience->location.'<br> '.$experience->job_title.'<br> '.$experience->start_date.' - '.$experience->end_date.'<br></address> <p>'.$experience->job_description.'</p></div>';
			 }
			 $days=$this->weekDays();

			$availabity=$employeee->Availability;

			$availability='';
		
			foreach($days as $key=>$day){ 
				$avail=explode(',',$availabity->{strtolower($day)} );
			
			$availability.='<ul class="week">';
				$availability.='<li class="a-title day"><?php echo $day; ?></li>';
				$morning='';
				$noon='';
				$night='';
				if (in_array('morning', $avail)){
					
					$morning='prsnt';
				}
				if (in_array('noon', $avail)){
					
					$noon='prsnt';
				}
				if (in_array('night', $avail)){
					
					$night='prsnt';
				}
				$availability.='<li><p class="'.$morning.'">morning</p></li>';
				$availability.='<li><p class="'.$noon.'">noon</p></li>';
				$availability.='<li><p class="'.$night.'">night</p></li>';
			
				

			$availability.='</ul>';
					 }
			 
			 if($type=='shortlist'){
				 $removebtn='<a onclick="removeShortlist($(this),'.$id.')">remove</a>';
				 
				}else{
				$removebtn='';
				
				}
		$str='<div class="profile-cover"> <div class="close"></div><div class="container"> <div class="row"> <div class="pro-detail-cover"> <div class="f-info"><h2 class="pro-name">'.$employeee->userProfile->first_name.' '.$employeee->userProfile->last_name.'</h2><div class="active-status"><h2>Interested</h2></div><div class="work"><p>'.$categories.'</p></div> <div class="info"> <address> <p class="location">Auckland</p> <span>2+ Years Experience<br> Shaky Isles, McDonalds </span></address> </div> </div> <div class="f-profile"> <div class="profile-pic" style="background-image: url('.BASEURL.'/uploads/profile/'.$employeee->userProfile->profile.');"> <img class="pro-sts" src="assets/images/crown.png" alt=""></div> <div class="sec-btn-pos pro-btn disabled-btn">'.$removebtn.'</div> </div> </div> </div></div> <!--contact-info--><div class="container h3-bot"><div class="row "> <div class="con-bot"><h3>contact info</h3></div><div class="col-sm-4"><div class="con-det-info"><p>Phone</p> <span>'.$employeee->phone.'</span></div></div><div class="col-sm-4"><div class="con-det-info"><p>Email</p> <span>'.$employeee->email.'</span></div></div><div class="col-sm-offset-4"></div></div> <div class="about-padd"><div class="row"> <div class="about-bot"><h3>about</h3></div><div class="col-sm-4"><div class="con-det-info"><p>Hours Required</p> <span> '.$employeee->userProfile->part_or_full.'-Time</span></div></div><div class="col-sm-4"><div class="con-det-info"><p>Current Situation</p> <span> '.$employeee->userProfile->current_status.'</span></div></div><div class="col-sm-4"><div class="con-det-info"><p>License & Transport</p> <span>'.$licenses.'</span> </div></div></div></div><div class="about-me-text"><div class="row"><h4>about me</h4><p>'.$employeee->userProfile->about.'</p></div></div><!----><div class="shifts"> <div class="row"><h3 class="ava-bot">availability</h3><div class="schedule">'.$availability.'</div> </div></div><!----><div class=""><div class="row"><div class="full-pro-work"><h3 class="work-bot">Work Experience</h3>'.$experiences.'</div></div></div></div></div>';
		
		echo $str;
		}
		
	}

}