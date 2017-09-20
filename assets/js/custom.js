$(document).ready(function(){

	$(".select-op span").click(function(){

	$(".select-op span:after").css("display","none");
	$(".drop-op").slideToggle();

	});


});


$(document).ready(function(){

	$(".view-more").click(function(){
	$(".full-pro").show();

	});
	$(".close").click(function(){
	$(".full-pro,.product-info").hide();
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
$(".product-info.d-pop").css({"display": "table"});

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

		}else{
			$(".employee").hide();
			$(".payment").show();
			$(".paymentbtn").show();


		}
    });
	//<a title="Delete" class="delete" >Delete</a>
	    $('.addnewemp').click(function(){
			$('.experiences').find('.experience:last').after('<div class="experience experienceextra"> <p class="half-prt blk"> <input type="text" name="employer[]" class="employer" value="" placeholder="Employer" required pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input"> <input type="text" name="job_location[]" class="job_location" value="" placeholder="Location" required pattern="^[a-zA-Z0-9\s,\'-]*$"   title="Invalid Input"> </p> <p class="crd-dtl blk"> <input type="text" name="job_title[]" value="" class="job_title" placeholder="job title" required  pattern="^[a-zA-Z0-9\s,\'-]*$"   title="Invalid Input"> <input type="text" name="start_date[]" class="start_date" value="" placeholder="mm/yy" required pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format (mm/yy)"> <input type="text" name="end_date[]" value="" class="end_date" placeholder="mm/yy" required pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format (mm/yy)"> </p> <div class="about-u"> <textarea placeholder="Tell us about the position..." name="job_description[]" required class="job_description" required minlength="50"    title="Please write atleast 50 characters" ></textarea> </div> </div>');
		});

		var checkboxes = $(".categories"),
		signupform = $(".signupform");

		signupform.submit(function(e) {


			if ($(".password").val()!=$(".confirm_password").val()){
              swal('Confirm Password','Confirm Password doesnot match.','error');
				return false;
				e.preventDefault();
			}
			else if ( $('.uploading').is(":visible") && $(".categories:checked").length ==0){
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
				var email=$("#emailInput").val();
				var password=$("#passwordInput").val();
				
				if(email!='' && password!=''){
				$.ajax({
				type: "POST",
				url: 'login.php',
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
						}, function() {
                         window.location = "index.php";
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

	
});







 $(document).ready(function() {

     var doc_height = $(window).height();
     $(".section.full-pro").css({ "height": doc_height });

 });

 $(window).resize(function() {
     var doc_height1 = $(window).height();
     $(".section.full-pro").css({ "height": doc_height1 });
 });