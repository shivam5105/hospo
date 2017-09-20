var $ = jQuery.noConflict();

var Blank = {
	forgotPassword: function(){
		$(".forgot-password-link").click(function(){
			$(".login").hide();
			$(".forgot-password").show();
			$("#registered_email").focus();
		});
	},
	loginForm: function(){		
		$(".forgot-password-login").click(function(){

			$(".login").show();
			$(".forgot-password").hide();
			$("#email").focus();
		});
	},
	toggleAccordion: function(){
		$(document).on("click",".menu-settings-list .accordion-section .section-title", function(){
			if($(this).closest(".accordion-section").hasClass("closed"))
			{
				$(".menu-settings-list .accordion-section").addClass("closed");
				$(this).closest(".accordion-section").removeClass("closed");
			}
			else
			{
				$(".menu-settings-list .accordion-section").addClass("closed");
				$(this).closest(".accordion-section").addClass("closed");
			}
		});
		$(document).on("click",".parent-menu-items-list-wrapper .accordion-section .section-title", function(){
			$(this).closest(".accordion-section").toggleClass("closed");
		});
		$(document).on("click","a.remove-menu-item", function(){
			$(this).closest(".accordion-section").remove();
		});
	},
};
$(document).ready(function(){
	Blank.forgotPassword();
	Blank.loginForm();
	Blank.toggleAccordion();
});

function confirmDelete (delUrl)
{
	//if (confirm("Are you sure you want to delete?"))
	//{
		//document.location = delUrl;
//	}
	
	swal({
	  title: 'Are you sure?',
	  text: "You won't be able to revert this!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then(function () {
	 document.location = delUrl;
	})
}
function ValidateForgotPassword()
{
	var email = $.trim($("#registered_email").val());

	var Data = "&mode=SendForgotPasswordLink&email="+encodeURIComponent(email);
	$("#registered_email").addClass("loading-bg");
	$.ajax({
		type: "POST",
		url: "dbbyajax.php",
		cache: false,
		data: Data,
		success: function(response){

			var response = $.trim(response);
			var resArr = response.split("-::-");
			var resType = $.trim(resArr[0]);
			var resMsg = $.trim(resArr[1]);

			var color = "red";

			if(resType == "Success")
			{
				color = "green";
			}
			$("#forgot-pass-result").html(resMsg+"<br><br>").css("color",color);

			$("#registered_email").removeClass("loading-bg");
			return false;
		}
	});
	return false;
}

function goBack() {
    window.history.back();
}

$(document).ready(function(){
	$('#passwordchange').submit(function(e) {


				if ($(".password").val()!=$(".confirm_password").val()){
				  swal('Confirm Password','Confirm Password doesnot match.','error');
					return false;
					e.preventDefault();
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



	    $('.addnewemp').click(function(){
			$('.experiences').find('.experience:last').after('<div class="experience experienceextra"> <p class="half-prt "> <input type="text" name="employer[]" class="employer" value="" placeholder="Employer" required pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input"> <input type="text" name="job_location[]" class="job_location" value="" placeholder="Location" required pattern="^[a-zA-Z0-9\s,\'-]*$"   title="Invalid Input"> </p> <p class="crd-dtl "> <input type="text" name="job_title[]" value="" class="job_title" placeholder="job title" required  pattern="^[a-zA-Z0-9\s,\'-]*$"   title="Invalid Input"> <input type="text" name="start_date[]" class="start_date" value="" placeholder="mm/yy" required pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format (mm/yy)"> <input type="text" name="end_date[]" value="" class="end_date" placeholder="mm/yy" required pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format (mm/yy)"> </p> <div class="about-u"> <textarea placeholder="Tell us about the position..." name="job_description[]" required class="job_description" required minlength="50"    title="Please write atleast 50 characters" ></textarea> </div> </div>');
		});

		var checkboxes = $(".categories"),
		employee_edit = $(".employee_edit");

		employee_edit.submit(function(e) {

          if ( $(".categories:checked").length ==0){
				swal('Required','select at least one looking for work in.','error');
				return false;
				e.preventDefault();
			}



		       $('.day').each(function () {
		     			var name=$(this).text();
		     			console.log(name);
				
			       if($("."+name+":checked").length ==0){
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



			
		});

		
});			