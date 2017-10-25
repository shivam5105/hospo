<?php 
namespace App\Classes;
use App\Pagination\Zebra_Pagination;
use stdClass;
$error='';

		ob_start();

abstract class BaseClass {

	protected $model;

	public function getCurl($url,$data,$headers=array()){
		
		if(count($data)){
			$querystring='?';
			foreach($data as $key=>$val){
				
			$querystring.=$key.'='.$val.'&';	
			} 
			
			$querystring=trim($querystring,"&");
			$url=$url.$querystring; 
			
		}
		
		 
		// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL =>$url,
		));
		if(count($headers)){
		 curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
        }
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		
		return json_decode($resp);
		
	}
	public function postCurl($url,$data,$headers=array()){				
				// Get cURL resource
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => array(
				item1 => 'value',
				item2 => 'value2'
			)
		));
		
		if(count($headers)){
		 curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
        }
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
	
	}
	public function getNumber()
	{
		$total = $this->model->count();

		$new = $this->model->whereSeen(0)->count();

		return compact('total', 'new');
	}

	
	public function destroy($id)
	{
		$this->getById($id)->delete();
	}
    public function isAuthMenu(){
       if(isset($_SESSION['logged_in_user'])){
               return true;

       }else {

       	return false;
       }
		
	}
	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}
	 public function weekDays(){

		$timestamp = strtotime('next Monday');
		$days = array();
		for ($i = 0; $i < 7; $i++) {
			$days[] =substr(strftime('%A', $timestamp), 0, 3) ;
			$timestamp = strtotime('+1 day', $timestamp);
		}
		return $days;
	 }
	
	public function flashBasic( $name = '', $message = '', $class = 'success fadeout-message', $url = '' ){
    //We can only do something if the name isn't empty
    if( !empty( $name ) )
    {
        //No message, create it
        if( !empty( $message ) && empty( $_SESSION[$name] ) )
        {
            if( !empty( $_SESSION[$name] ) )
            {
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) )
            {
                unset( $_SESSION[$name.'_class'] );
            }
 
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
        //Message exists, display it
        elseif( !empty( $_SESSION[$name] ) && empty( $message ) )
        {
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
	if( !empty( $url ) || $url != '' )
    {
		header('Location: '.$url);
		exit();
	}
}
		public function flashFancy( $name = '', $message = '', $class = 'success fadeout-message',$url=''){
			//We can only do something if the name isn't empty
			if( !empty( $name ) )
			{
				//No message, create it
				if( !empty( $message ))
				{
					if( !empty( $_SESSION[$name] ) )
					{
						unset( $_SESSION[$name] );
					}
					if( !empty( $_SESSION[$name.'_class'] ) )
					{
						unset( $_SESSION[$name.'_class'] );
					}
		 
					$_SESSION[$name] = $message;
					$_SESSION[$name.'_class'] = $class;
			  
					$class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
				    //echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
					
					if($url==''){						
						$redirect='';
						$timer='';
					}else{
						$timer=',timer:1000';
					    $redirect=".then(function(e){window.location.href='".$url."'})";
					}
					//echo '<script>swal({title:"'.$name.'",text:"'.$_SESSION[$name].'",type:"'.$class.'"'.$timer.'})'.$redirect.';</script>';
        global $error;
					$error='<script>$(document).ready(function(){swal("'.$name.'","'.$_SESSION[$name].'","'.$class.'")'.$redirect.';});</script>';
					unset($_SESSION[$name]);
					unset($_SESSION[$name.'_class']);
			   
				
			}
			
		}
		}
	
		public function AjaxPagination($page=1,$records_per_page=10,$currentmodel){
		
		return $currentmodel->limit($records_per_page)->offset(($page - 1) * $records_per_page)->orderBy('id', 'desc')->get();
			
		}
		public function pagination($records_per_page=10,$currentmodel){
			if(empty($page)){
				$page=0;
			}
			$pagination = new Zebra_Pagination();
    		$TotalRecords =$currentmodel->count();
			$pagination->records($TotalRecords);
			$pagination->records_per_page($records_per_page);
			$modeldata=$currentmodel->limit($records_per_page)->offset(($pagination->get_page() - 1) * $records_per_page)->orderBy('id', 'desc')->get();
			$obj=new stdClass();
			$obj->pagination=$pagination;
			$obj->data=$modeldata;
			return $obj;
		}	
}
