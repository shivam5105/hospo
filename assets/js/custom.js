$(document).ready(function(){
	$(".select-op span").click(function(){

	$(".select-op span:after").css("display","none");
	$(".drop-op").slideToggle();

	});


});


$(document).ready(function(){

	$(".view-more").click(function(){ 
	   var user_id=$(this).attr('user_id');
	  
	   if($(this).attr('action')=='shortlist'){
		    var action=$(this).attr('action');
		   
	         }else{
			 
			 action='';
			 }
	   
	   
	   	 $.ajax({
			   url: 'ajaxrequest.php?action=get_employee_details&user_id='+user_id+"&type="+action,
			   type: 'GET',
			   success: function(response){
					
					  if(response){
					   $(".full-pro").show();
					      $(".full-pro").html(response);
						  
					   }else{
						 
						   
					   }
					   
					   $(".close").click(function(){
							$(".full-pro,.product-info").hide();
							});
					 }
	         });
	
	 

	});
	 
	$(".tog-fil").click(function(){
	$(".job-drop-up").toggle();
	$(".fa-caret-down").toggle();
	$(".fa-caret-up").toggle();

	});
});


$(document).ready(function(){

$(".shop-img-cvr").click(function(){
$(".product-info").css({"display": "table"});

});
 $(".cl-ose").click(function(){
$(".product-info").fadeOut(500);
}); 
});




$(document).ready(function(){
$(".add-rs .view-more").click(function(){
$(this).parents('.myshortlist').next(".product-info.d-pop").css({"display": "table"});

});
 $(".cl-ose").click(function(){
$(".product-info").fadeOut(500);
}); 
});



$(document).ready(function(){
$(".crt-click").click(function(){
$(".cart-drop").slideToggle();

});
});


$(document).ready(function(){
$(".two-btn div").click(function(e){
$(this).next(".tooltips").toggle();
  event.stopPropagation();
});
});

$(document).ready(function(){


$('#shortlistform').submit(function(e) {
if ($(".interested:checked").length ==0){
				swal('Required','Incomplete data','error');
				return false;
				e.preventDefault();
			}

});

		$('body').click(function(){
		$(".tooltips").hide();
		});
		/*
		$('#f-option').click(function(){
		$(".uploading").show();
		});

		$('#s-option').click(function(){
		$(".uploading").hide();
		});
		*/


    $('#account').change(function(){
	    	console.log($(this).val());
		if($(this).val()=='employee'){
			$(".employee").show();      
			$(".payment").hide();
			$(".paymentbtn").hide();
			$(".employee").find('input:text,input:file,input:radio,textarea,select').attr('required',true)

		}else{
			$(".employee").hide();
			$(".payment").show();
			$(".paymentbtn").show();
			
			$(".employee").find(':hidden').attr('required',false)
			


		}
    });
	//<a title="Delete" class="delete" >Delete</a>
	    $('.addnewemp').click(function(){
			$('.experiences').find('.experience:last').after('<div class="experience experienceextra"> <p class="half-prt blk"> <input type="text" name="employer[]" class="employer" value="" placeholder="Employer" required pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input"> <input type="text" name="job_location[]" class="job_location" value="" placeholder="Location" required pattern="^[a-zA-Z0-9\s,\'-]*$"   title="Invalid Input"> </p> <p class="crd-dtl blk"> <input type="text" name="job_title[]" value="" class="job_title" placeholder="job title" required  pattern="^[a-zA-Z0-9\s,\'-]*$"   title="Invalid Input"> <input type="text" name="start_date[]" class="start_date" value="" placeholder="mm/yy" required pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format (mm/yy)"> <input type="text" name="end_date[]" value="" class="end_date" placeholder="mm/yy" required pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format (mm/yy)"> </p> <div class="about-u"> <textarea placeholder="Tell us about the position..." name="job_description[]" required class="job_description" required minlength="50"    title="Please write atleast 50 characters" ></textarea> </div> </div>');
		});
$('.submitmember').click(function(e) {

	if($("#account").val()==''){
	
			$(".employee").find(':hidden').attr('required',false);
			

		}
});
		var checkboxes = $(".categories"),
		signupform = $(".signupform");

		signupform.submit(function(e) {
		
		
		
		var account=$('#account').val();
		if ($(".password").val()!=$(".confirm_password").val()){
              swal('Confirm Password','Confirm Password doesnot match.','error');
				return false;
				e.preventDefault();
			}
			
        if(account=='manager'){
			if($(".first_name").val()!='' && $(".last_name").val()!='' && $(".email").val()!='' && $(".phone").val()!='' && $(".password").val()!='' && $(".confirm_password").val()!='' && $("#account").val()!=''){
				return true;
			}else{
			
			}
		}else{
		 if ( $('.uploading').is(":visible") && $(".categories:checked").length ==0){
				swal('Required','select at least one looking for work in.','error');
				return false;
				e.preventDefault();
			}

			 if($('.uploading').is(":visible")){


		       $('.day').each(function () {
		     			var name=$(this).text();
		     			console.log(name);
				
			       if($('.uploading').is(":visible") && $("."+name+":checked").length ==0){
                       e.preventDefault();
					
						
				        swal('Required','Select at least one Availibility option for '+name+'','error');

						exit();



			       }

		       });

		         $('.experienceextra').each(function () {
		     			var employer=$(this).find('.employer').val();
		     			var job_location=$(this).find('.job_location').val();
		     			var job_title=$(this).find('.job_title').val();
		     			var start_date=$(this).find('.start_date').val();
		     			var end_date=$(this).find('.end_date').val();
		     		
				 console.log(employer);
			       if(employer=='' || job_location=='' || job_title=='' || start_date=='' || end_date==''){

                       e.preventDefault();
					
						
				        swal('Required','Please fill the experience information complete!','error');
						return false;

						exit();



			       }

		       });

		   }
		
		}
         
			


			
		});

		$('.confirm_password').blur(function(e) {
	         if($(".password").val()!='' && $(".confirm_password").val() !=''){

	           if ($(".password").val()!=$(".confirm_password").val()){
	              swal('Confirm Password','Confirm Password doesnot match.','error');
					return false;
					e.preventDefault();
				}

	         }   
          
		});

			$('.loginbtn').click(function(e) {
				e.preventDefault();
				var email=$(this).parents('form').find("#emailInput").val();
				var password=$(this).parents('form').find("#passwordInput").val();
				
				if(email!='' && password!=''){
				$.ajax({
				type: "POST",
				url: 'ajaxrequest.php?action=login',
				data: {email:email,password:password},
				success: function(data){
					var data=JSON.parse(data);
				  if(data.status==false){
					  	swal(
						{
						title: "Error",
						text: data.message,
						type: "error"
						}	
				   );
				  }else if(data.status==true){
					swal(
						{
						title: "Success login!",
						text: "Your are successfully logged in !",
						type: "success"
						}
					).then(
                        function() {
							
							if(data.role=='employee'){
                              window.location.href= "dashboard.php";
							}else{

                               window.location.href= "jobseekers.php";
							}
                       
						}

					) 
				  }else{
					    	swal(
						{
						title: "Error",
						text: 'Something went wrong!',
						type: "error"
						}	
				);
					  
				  }
				}
				});
			}else{
			swal(
						{
						title: "Fields Required",
						text: "Please enter email and password!",
						type: "error"
						}	
				);
			}
			});

	
 var page=2;
 $(document).on('click','.loadseekers',function () {
 var params=$(this).attr('params');
   $(this).find('p').text('Loading...');
   var loader= $(this).find('p');
		 $.ajax({
	   url: 'ajaxrequest.php?action=get_employees&page='+page+'&'+params,
	   type: 'GET',
			success: function(response){
				page++;
				response=JSON.parse(response)
			  if(response.length){
				loader.text('Load More..');
	  var str='<div class="job-third"><div class="container w-con"><div class="row">';
	  var j=1;
	 $.each(response, function (i) { 
	  var cats=response[i].employee_categories;
		 var strcat='';
		     $.each(cats, function (j) { 
			   strcat+=cats[j].category.name+',';
			 });
			 var cats=strcat.trim(',');
		 str+='<div class="col-sm-4 hospo-cus-pad b-s"><div class="job-tab"><div class="job-cover"><div class="profile-pic" style="background-image: url('+BASEURL+'/uploads/profile/'+response[i].user_profile.profile+');"> <img class="pro-sts" src="images/crown.png" alt=""></div><div class="active-status"><h2>ative 2 days ago</h2></div><h2 class="pro-name">'+response[i].user_profile.first_name+' '+ response[i].user_profile.last_name+'</h2><div class="work"><p>'+cats+'</p></div><div class="info"><p class="location">'+response[i].user_profile.location+'</p> <span>2+ Years Experience<br> Shaky Isles, McDonalds</span></div><div class="view-more" user_id="'+response[i].id+'"><a href="">view more</a></div><div class="sec-btn-pos pro-btn"><a onclick="addShortlist($(this),'+response[i].id+')">shortlist</a></div></div></div></div>'; 
		 if (j % 3 == 0 ) {  str+='</div></div></div><div class="job-third"><div class="container w-con"><div class="row">'; } 
		j++;
	 });
	 
	  
	 str+='</div></div></div>';
	 $('.jobs:last').after(str);
	 				$(".two-btn div").click(function(e){
				$(this).next(".tooltips").toggle();
				event.stopPropagation();
				});

			   }else{
				  loader.hide(); 
				   
			   }
			 }
	});
 });


 var shortpage=2;
 $(document).on('click','.loadshorted',function () {
  var params=$(this).attr('params');

   $(this).find('p').text('Loading...');
   var loader= $(this).find('p');
		 $.ajax({
	   url: 'ajaxrequest.php?action=get_shorlists&page='+shortpage+'&'+params,
	   type: 'GET',
			success: function(response){
				shortpage++;
				response=JSON.parse(response)
			  if(response.length){
				loader.text('Load More..');
	  var str='<div class="job-third"><div class="container w-con"><div class="row">';
	  var j=1;
	 $.each(response, function (i) { 
		 var cats=response[i].touser.employee_categories;
		 var strcat='';
		     $.each(cats, function (j) { 
			   strcat+=cats[j].category.name+',';
			 });
			 var cats=strcat.trim(',');
			 str+='<div class="col-sm-4 hospo-cus-pad b-s"><div class="job-tab"><div class="job-cover"><div class="profile-pic" style="background-image: url('+BASEURL+'/uploads/profile/'+response[i].touser.user_profile.profile+');"> <img class="pro-sts" src="images/crown.png" alt=""></div><div class="active-status"><h2>ative 2 days ago</h2></div><h2 class="pro-name">'+response[i].touser.user_profile.first_name+' '+ response[i].touser.user_profile.last_name+'</h2><div class="work"><p>'+cats+'</p></div><div class="info"><p class="location">'+response[i].touser.user_profile.location+'</p> <span>2+ Years Experience<br> Shaky Isles, McDonalds</span></div><div class="view-more" action="shortlist" user_id="'+response[i].to_id+'"><a href="">view more</a></div><div class="two-btn"><div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div><div class="tooltips"><p>Phone</p> <span>'+response[i].touser.phone+'</span> <p>Email</p> <span>'+response[i].touser.email+'</span><div class="nip"></div></div><div class="sec-btn-pos pro-btn disabled-btn"><a onclick="removeShortlist($(this),'+response[i].touser.id+')">remove</a></div></div></div></div></div>'; 
			 if (j % 3 == 0 ) {  str+='</div></div></div><div class="job-third"><div class="container w-con"><div class="row">'; } 
			j++;
		 });
	 
	  
	 str+='</div></div></div>';
	 $('.shortlisted:last').after(str);
				$(".two-btn div").click(function(e){
				$(this).next(".tooltips").toggle();
				event.stopPropagation();
				});
			   }else{
				  loader.hide(); 
				   
			   }
			 }
	});
 });
 
 

 
});
 $(document).on('submit','.jobhuntform',function () {
 	
	 $.ajax({
	   url: 'ajaxrequest.php?action=update_jobhunt_status&status='+$("#currently_looking_for_work").val(),
	   type: 'GET',
	   success: function(response){
		   	swal(
						{
						title: "Success",
						text: "Job Hunt Status Updated!",
						type: "success"
						}
					)
	   }
	   
	});
return false;
 });
function logout(){
		 $.ajax({
	   url: 'ajaxrequest.php?action=logout',
	   type: 'GET',
	   success: function(response){
		   	swal(
						{
						title: "Logged Out!",
						text: "Your are successfully logged out !",
						type: "success"
						}
					).then(
                        function() {
							
							if(response){
                            
                               window.location.href= "index.php";
							}
                       
						}

					) 
	   }
	   
	});
}
 function addShortlist(current,touser){
	 swal({
  title: 'Shortlist this user ?',
  text: "",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes!'
}).then(function () {
	
	 $.ajax({
	   url: 'ajaxrequest.php?action=shortlist_user&touser='+touser,
	   type: 'GET',
	   success: function(response){
		    
		   
		   if(response==true){
			   if(current.parents('.jobs').find('.col-sm-4').length<2){
			     // window.location.reload();
		        }else{
				//current.parents('.col-sm-4').empty();
				//current.parents('.col-sm-4').hide();
		      // current.parents('.col-sm-4').remove();
			   
				}
		
			 swal(
							'Shorted!',
							'Employee shorted',
							'success'
							).then(
                        function() {
							
							if(response){
                            
                             //  window.location.href= "jobseekers.php#mainresult";
							}
                       
						}

					) 	
           							
		   }else{
			   
			    swal(
					'Oops...',
					'Something went wrong!',
					'error'
							)
		   }
							
	   }

	 });	   
				
				
 
})
 }
 function removeShortlist(current,touser){
	 swal({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then(function () {
	
	 $.ajax({
	   url: 'ajaxrequest.php?action=remove_shortlist&touser='+touser,
	   type: 'GET',
	   success: function(response){
		    
		   
		   if(response==true){
			   if(current.parents('.shortlisted').find('.col-sm-4').length<2){
			      window.location.reload();
		        }else{
				current.parents('.col-sm-4').empty();
		       current.parents('.col-sm-4').remove();
				}
		
			 swal(
							'Deleted!',
							'Your Shortlisted removed',
							'success'
							)	
           							
		   }else{
			   
			    swal(
					'Oops...',
					'Something went wrong!',
					'error'
							)
		   }
							
	   }

	 });	   
				
				
 
})
 }




 $(document).ready(function() {

     var doc_height = $(window).height();
     $(".section.full-pro").css({ "height": doc_height });

 });

 $(window).resize(function() {
     var doc_height1 = $(window).height();
     $(".section.full-pro").css({ "height": doc_height1 });
 });
