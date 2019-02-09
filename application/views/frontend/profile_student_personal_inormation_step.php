		<link href="https://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">

<style>
  label.error{
    color:red;
  }
</style>

<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>STUDENT INFORMATION FORM</h2>
  </div>
</section>
<section id="how-it-works-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="about-app mt-0 single-widget">
          <div class="progress mtmb-20">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
            Page 1/3
          </div>
        </div>
		<?php if($this->session->flashdata('form_error')){?>
          <div class="alert alert-danger alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('form_error');?>
          </div>
          <?php }?>
		<?php if(isset($student_data)){$form_id="student_information_form_update";}else{$form_id="student_information_form";}?>
         <form method="post"  enctype="multipart/form-data" action="" id="<?=$form_id?>" class="persform">
          <div class="row">
            <div class="col-md-12">
              <h4 class="blutxt">Personal Information</h4> <hr>
            </div> 
          </div>
          
          <div class="col-md-3 col-sm-4">
            <div class="form-group">
              <label for=""><strong>Salutation</strong> <span>*</span></label>
                <select  name="title" class="form-control input-lg intial">
                  <option value="">Select Salutation</option>
                  <option value="Mr" <?php if(isset($saved_data)){echo($saved_data->title == 'Mr')?'selected':'' ;} ?>>Mr.</option>
                  <option value="Ms" <?php if(isset($saved_data)){echo($saved_data->title == 'Ms')?'selected':'' ;} ?>>Ms.</option>
                  <option value="Mrs" <?php if(isset($saved_data)){echo($saved_data->title == 'Mrs')?'selected':'' ;} ?>>Mrs.</option>
                  <option value="Dr"  <?php if(isset($saved_data)){echo($saved_data->title == 'Dr')?'selected':'' ;} ?>>Dr.</option>
                  <option value="Other" <?php if(isset($saved_data)){echo($saved_data->title == 'Other')?'selected':'' ;} ?>>Other</option>
                </select>
            </div>
          </div> 
          
          <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>" >
          <div class="col-md-3 col-sm-4">
            <div class="form-group">
              <label for=""><strong>First Name</strong> <span>*</span></label>
              <input type="text" id="fname" name="first_name"  class="form-control" value="<?=$saved_data->name?>" readonly input-lg" pattern="^[A-Za-z -]+$">
            </div>            
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="form-group">
              <label for=""><strong>Last Name</strong></label> 
              <input type="text" id="lname" name="last_name" value="<?php if(isset($student_data)){echo $student_data->last_name ;} ?>" class="form-control input-lg txtOnly" pattern="^[A-Za-z -]+$" placeholder="Enter Lastname" >
            </div>            
          </div>

          <div class="col-md-3 col-sm-4">
            <div class="form-group">
               <label for=""><strong>Display Name</strong> <span>*</span></label> 
            <input type="text" name="display_name" value="<?php if(isset($student_data)){echo $student_data->display_name ;} ?>" class="form-control input-lg txtOnly" placeholder="Display Name" >
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-2 col-sm-6">
            <label for=""><strong>Gender</strong> <span>*</span></label>
            <div class="form-group">
              <select name="gender" class="form-control input-lg teach" >
               <option value="">Select</option>
                <option value="Male" <?php if(isset($student_data)){echo($student_data->gender == 'Male')?'selected':'' ;} ?>>Male</option>
                <option value="Female" <?php if(isset($student_data)){echo($student_data->gender == 'Female')?'selected':'' ;} ?>>Female</option>
                <option value="Other" <?php if(isset($student_data)){echo($student_data->gender == 'Other')?'selected':'' ;} ?>>Other</option>
              </select>
            </div>
          </div>
          <div class="col-md-5 col-sm-6">
            <label for=""><strong>Date of Birth</strong> <span>*</span></label>
            <div class="form-group">
              <input type="date" id="txtDate" name="dob" value="<?php if(isset($student_data)){echo $student_data->dob ;} ?>" placeholder="Enter Date of Birth"  class="form-control input-lg" >
            </div>
          </div>
          <div class="col-md-5 col-sm-6">
            <div class="form-group">
              <label for=""><strong>Currency </strong> <span>*</span></label>
              <select name="currency_id" class="form-control input-lg teach" >
                <option value="">Select</option>
                <?php foreach($currency as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($student_data)){echo($student_data->currency_id == $row->id)?'selected':'' ;} ?> ><?=$row->currency?></option>
               <?php } ?>
              </select> 
            </div>
          </div>
          <div class="col-md-12">
            <h4 class="blutxt">Communication Details</h4><hr>
          </div>
          <div class="col-md-12">
            <label for=""><strong>Address for Correspondence</strong></label>
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="address_1" value="<?php if(isset($student_data)){echo $student_data->address_1 ;} ?>" maxlength="50" class="form-control input-lg" placeholder="Address Line 1" >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="text" name="address_2" value="<?php if(isset($student_data)){echo $student_data->address_2 ;} ?>"  class="form-control input-lg" placeholder="Address Line 2">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="city" value="<?php if(isset($student_data)){echo $student_data->city ;} ?>" maxlength="20" class="form-control input-lg" placeholder="City/Town" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="zip_code" value="<?php if(isset($student_data)){echo $student_data->zip_code ;} ?>"  class="form-control input-lg" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Zip/Postal Code *" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="landmark" value="<?php if(isset($student_data)){echo $student_data->landmark ;} ?>" class="form-control input-lg" placeholder="Landmark" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="state" value="<?php if(isset($student_data)){echo $student_data->state ;} ?>" class="form-control input-lg" placeholder="State/Province" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <select name="country_id" class="input-lg form-control teach">
                <option value="">Country</option>
                <?php foreach($country as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($student_data)){echo($student_data->country_id == $row->id)?'selected':'' ;} ?>><?=$row->country?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <input name="home_town" type="text" value="<?php if(isset($student_data)){echo $student_data->home_town ;} ?>" class="form-control input-lg" placeholder="Home Town">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for=""><strong>Contact Number</strong> <span>*</span></label>
              <input id="phone" type="tel" name="mobile" value="<?php if(isset($saved_data)){echo $saved_data->mobile ;} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-lg" value="<?=$saved_data->mobile?>" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for=""><strong>Secondary Contact Number</strong></label>
              <input id="phone1" type="tel" name="mobile_2" value="<?php if(isset($student_data)){echo $student_data->mobile_2 ;} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-lg" placeholder="Secondary Contact Number">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for=""><strong>Whatsapp no</strong></label>
              <input id="phone2" type="tel" name="mobile_2" value="<?php if(isset($student_data)){echo $student_data->whatsup_no ;} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="whatsup_no" class="form-control input-lg" placeholder="Whatsapp No.">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for=""><strong>Skype ID</strong> <span>*</span></label>
              <div class="input-group">
                <div class="input-group-addon" style="background-color: #fff; border:1px solid #ccc; border-right:0px; color: #05adff"><i class="fa fa-skype fa-lg"></i></div>
                <input type="text" name="skype_id" value="<?php if(isset($student_data)){echo $student_data->skype_id ;} ?>" class="form-control input-lg" placeholder="Skype ID">
              </div>
            </div>
          </div>
		  <?php if(isset($qualification_data)) foreach($qualification_data as $row){?>
		  <div class="row">
          <div class="col-md-3" style="clear:both">
            <label for=""><strong>Qualification</strong> <span>*</span></label>
            <div class="form-group">
			<input type="hidden"  name="qualification_id[]" value="<?=$row->id?>">
              <input type="text" name="qualification[]" pattern="[A-Za-z ]+" value="<?php if(isset($qualification_data)){echo $row->qualification ;} ?>" class="form-control input-lg" placeholder="Qualification" required>
            </div>
          </div>
          <div class="col-md-2">
            <label for=""><strong>Subject</strong> <span>*</span></label>
            <div class="form-group">
              <input type="text" name="subject[]" pattern="[A-Za-z ]+" value="<?php if(isset($qualification_data)){echo $row->subject ;} ?>" class="form-control input-lg" placeholder="Subject" required>
            </div>
          </div>
          <div class="col-md-3">
            <label for=""><strong>Institution Name</strong> <span>*</span></label>
            <div class="form-group">
              <input type="text" name="institution[]" pattern="[A-Za-z ]+" value="<?php if(isset($qualification_data)){echo $row->institution ;} ?>" class="form-control input-lg" placeholder="Institution Name" required>
            </div>
          </div>
          <div class="col-md-2">
            <label for=""><strong>Year</strong> <span>*</span></label>
            <div class="form-group">
              <input type="date" name="passout_year[]" pattern="[A-Za-z ]+" value="<?php if(isset($qualification_data)){echo $row->passout_year ;} ?>"  class="form-control input-lg dater" placeholder="Year" required>
            </div>
          </div>
		  <div class="col-md-2">
		  <label for=""><strong></strong></label>
		  <button style="margin-top: 27px;" type="button" onclick="remove_qualification(<?=$row->id?>)" class="btn btn-danger btn-sm">Delete</button>
		  </div>
		  </div>
		  <?php }?>
		  
		   <div class="col-md-3" style="clear:both">
            <label for=""><strong>Qualification</strong> <span>*</span></label>
            <div class="form-group">
              <input type="text" name="qualification[]" minlength="2" maxlength="10" class="form-control input-lg" placeholder="Qualification" required>
            </div>
          </div>
          <div class="col-md-3">
            <label for=""><strong>Subject</strong> <span>*</span></label>
            <div class="form-group">
              <input type="text" name="subject[]" minlength="2" maxlength="10" class="form-control input-lg" placeholder="Subject" required>
            </div>
          </div>
          <div class="col-md-3">
            <label for=""><strong>Institution Name</strong> <span>*</span></label>
            <div class="form-group">
              <input type="text" name="institution[]" minlength="2" maxlength="60"  class="form-control input-lg" placeholder="Institution Name" required>
            </div>
          </div>
          <div class="col-md-3">
            <label for=""><strong>Year</strong> <span>*</span></label>
            <div class="form-group">
              <input type="date" name="passout_year[]"   class="form-control input-lg dater" placeholder="Year" required>
            </div>
          </div>
           <div class="field_wrapper">
        </div>

          <div class="col-md-12">
            <a href="javascript:void(0);"  class="mb-10 blutxt add_button"><i class="fa fa-plus-circle"></i> Add More</a>
          </div>
          <div class="clearfix"></div>
		  <!--
          <div class="col-md-6">
            <label for=""><strong>Current Employer</strong></label>
            <div class="form-group">
              <input type="text" name="current_employer" value="<?php if(isset($student_data)){echo $student_data->current_employer ;} ?>" class="form-control input-lg" placeholder="Current Employer">
            </div>
          </div>
          <div class="col-md-6">
            <label for=""><strong>Designation</strong></label>
            <div class="form-group">
              <input type="text" name="designation" value="<?php if(isset($student_data)){echo $student_data->designation ;} ?>" class="form-control input-lg" placeholder="Designation">
            </div>
          </div>
          <div class="col-md-12 mb-10">
            <input type="checkbox" name="private_status" value="0"> Private
          </div>
		  -->
          <div class="col-md-6">
            <div class="form-group">
              <label for=""><strong>Email Address </strong> <span>*</span></label>
            <input type="email" name="email" id="email_1" class="form-control input-lg" value="<?=$saved_data->email?>" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for=""><strong>Alternative Email Address </strong></label>
            <input type="email" name="alternative_email" id="email_2" value="<?php if(isset($student_data)){echo $student_data->alternative_email ;} ?>"   class="form-control input-lg" placeholder="Email Address">
            </div>
          </div>
         <div class="clearfix"></div>
          <div class="col-md-6">
            <label for=""><strong>About Yourself</strong> <span>*</span></label>
            <div class="form-group">
              <textarea name="about_yourself" id="" cols="10" rows="5" class="form-control"><?php if(isset($student_data)){echo $student_data->about_yourself ;} ?></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <label for=""><strong>Your Objective</strong> <span>*</span></label>
            <div class="form-group">
              <textarea name="your_objective" id="" cols="10" rows="5" class="form-control"><?php if(isset($student_data)){echo $student_data->your_objective ;} ?></textarea>
            </div>
          </div>
		  <?php if(isset($student_data)){ ?> <input type="hidden" id="old_image" name="old_profile_image" value="<?= $student_data->profile_image ?>" > <?php }?>
          <div class="col-md-6">
            <label for=""><strong>Profile Picture</strong> <span>*</span></label>
            <p class="mb-0">You can change your profile photo, otherwise the earlier uploaded photo will be maintained.</p>
            <div class="form-group">
              <input type="file" id="file_field" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG," name="user_file" class="form-control input-lg" onchange='check_file(this.value)'><label id="file_field-error" class="error" for="file_field" <?php if(isset($student_data)){echo '';}else{echo "required";} ?> ></label>
            </div>
          </div>

          <div class="col-md-1 pt-60">(OR)</div>
          <div class="col-md-5">
            <label for=""><strong>Capture Picture</strong></label>
            <p class="mb-0">From your webcam<br>
            size : 180px X 180px</p>
            <div class="form-group">
			<input type="hidden" id="snap_id" name="web_file" class="image-tag" >
              <input type="button" class="btn btn-primary btn-md" data-toggle="modal" id="capture_id" data-target="#GPICModal" value="capture">
             
            </div>
          </div>
          <!-- <div class="col-md-12">
            <label for=""><strong>Upload CV</strong></label>
            <div class="form-group">
              <input type="file" class="form-control input-lg">
            </div>
          </div> -->
          <div class="col-md-12">
            <h4 class="blutxt">Social Links</h4> <hr>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                <input type="text" class="form-control input-lg" name="facebook_link" value="<?php if(isset($student_data)){echo $student_data->facebook_link ;} ?>" placeholder="Facebook Profile">
              </div>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                <input type="text" class="form-control input-lg" name="twitter_link" value="<?php if(isset($student_data)){echo $student_data->twitter_link ;} ?>" placeholder="Twitter Profile">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-linkedin"></i></div>
                <input type="text" class="form-control input-lg" name="linkedin_link" value="<?php if(isset($student_data)){echo $student_data->linkedin_link ;} ?>" placeholder="Linkedin Profile">
              </div>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-youtube"></i></div>
                <input type="text" class="form-control input-lg" name="youtube_link" value="<?php if(isset($student_data)){echo $student_data->youtube_link ;} ?>" placeholder="Video Credentials">
              </div>
            </div>
          </div>
          <div class="col-md-12"><hr>
            <div class="form-group">
          <a href="javascript: history.go(-1)" class="btn pull-left" ><i class="icofont icofont-simple-left"></i> BACK</a>
        <button type="submit" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> SAVE & CONTINUE</button>
      </div>
          </div>
         </form>
       
        </div>
      </div>
    </div>
  </div>
</section>
<!-- app about area start -->


<div class="modal fade" id="GPICModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Web Cam</h4> <hr>
             <!--<form  enctype="multipart/form-data" action="">-->
       
            <div class="col-md-6">
                <div style="width:236px;height:236px;" id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" id="snap_data" name="web_file1"  value="" >
            </div>
            <div class="col-md-6" style="padding-bottom: -10px">

                <div  id="results" style="margin-top: 30px; ">Your captured image will appear here...</div>
                <input type="hidden" name="web_pic" id="web_status" value="">
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button   data-dismiss="modal"  class="btn btn-success">Save</button>
            </div>
       
    <!--</form>-->
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>



<script language="JavaScript">

function send_ata(data1){
	alert(data1);
}

    Webcam.set({
        width: 236,
        height: 236,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img  src="'+data_uri+'" style="max-width:236px;height:auto"/>';
            document.getElementById('web_status').value = '1';
        } );
    }
   
</script>


         <script type="text/javascript">
$(document).ready(function(){
	$(function(){
    var dtToday = new Date();
	
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear()-5;

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    
    $('#txtDate').attr('max', maxDate);
});

$(function(){
    var dtToday = new Date();
	
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear()-1;

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    
    $('.dater').attr('max', maxDate);
});

    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div class="col-md-3" style="clear:both"><label for=""><strong>Qualification</strong> <span>*</span></label><div class="form-group"><input type="text" name="qualification[]" class="form-control input-lg" minlength="2" maxlength="10" required placeholder="Qualification"></div></div><div class="col-md-3"><label for=""><strong>Subject</strong> <span>*</span></label><div class="form-group"><input type="text" name="subject[]" minlength="2" maxlength="10" class="form-control input-lg" required placeholder="Subject"></div></div><div class="col-md-3"><label for=""><strong>Institution Name</strong> <span>*</span></label><div class="form-group"><input type="text" name="institution[]" minlength="2" maxlength="60" class="form-control input-lg" required placeholder="Institution Name"></div></div><div class="col-md-2"><label for=""><strong>Year</strong> <span>*</span></label><div class="form-group"><input type="date" name="passout_year[]"  class="form-control input-lg dater" required placeholder="Year"></div></div><a style="margin-top:30px;" href="javascript:void(0);" class="remove_button"><b style="color:red"><i class="fa fa-window-close" aria-hidden="true"></i> remove</b></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
	  });
	
	</script>

<script src="<?=base_url()?>front_assets/js/timezones.full.js"></script>
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/intlTelInput.css">
<script src="<?=base_url()?>front_assets/js/intlTelInput.js"></script>
<script>
    $('.timeset select').timezones();
    $("#phone,#phone1,#phone2").intlTelInput({
      utilsScript: "js/utils.js"
    });
</script>

<script>
		  function check_file(i){
			 z= i.split('.').pop();
			  if(z == 'jpg' || z == 'JPG' || z == 'png' || z == 'PNG'||z == 'jpeg' || z == 'JPEG'){
				  
			  }else{
				 $('#file_field').val('');
				$('#file_field-error').html('Please upload JPG/JPEG/PNG');
				 
			  }
			  
		  }
		  </script>

<script type="text/javascript">

$.validator.addMethod("user_email_not_same", function(value, element) {
   return $('#email_1').val() != $('#email_2').val()
}, "* Email and Alternative should not same");

       // Setup form validation on the #register-form element
       $("#student_information_form").validate ({
             rules: {
               title: {
                   required: true
                   
               },
               first_name:{ 
                  required:true,
               },
			   last_name:{ 
                  required:true,
               },
               display_name:{ 
                  required:true
               },
                gender: {
                   required: true
                   
               },
               dob:{ 
                  required:true
                  
               },
               currency_id:{ 
                  required:true
               },
               address_1: {
                   required: true
                   
               },
               city:{ 
                  required:true
                  
               },
               zip_code:{ 
                  required:true,
                  digits: true
               },               
               state:{ 
                  required:true,
                  
               },
               country_id:{ 
                  required:true,
                  
               },
               home_town:{ 
                  required:true,
                  
               },
               mobile:{ 
                  required:true,
                  
               },
               skype_id:{ 
                  required:true,
                  
               },
               email:{ 
                  user_email_not_same:true,
                  
               },
               about_yourself:{ 
                  required:true,
                  
               },
               your_objective:{ 
                  required:true,
                  
               },
               user_file:{
					 required: "#snap_id:blank"
					 //extension: "jpg|jpeg|png|JPG|JPEG|PNG"
				},
				web_file:{
					required: "#file_field:blank"
				}
                


               },
               /*
              messages: {
               first_name: {
                   myField: "*enter only alphabetical characters"
               },
               display_name: {
                                         
                   myField: "*enter only alphabetical characters"
               },
               zip_code:{ 
                  
                  digits: "*enter only numbers characters"
               },
               
               user_file: {
                   extension: "*enter upload jpg/jpeg/png format images"
               }
             }, */

       });
	   
	   
	   function remove_qualification(id)
          {  
			if (confirm("Are you sure you want to Delete ?")) {
        //alert(id);
            $.ajax({ 
                   type:"POST",  
                   url : '<?=base_url()?>'+'student/qualification_delete/',
                   data : {id:id}, 
                   success : function(response) {
						window.location.reload();
						alert(response);
                   },
                    
                  });
    }
    return false;            
           

                   }
 


</script>

<script>
$.validator.addMethod("user_email_not_same", function(value, element) {
   return $('#email_1').val() != $('#email_2').val()
}, "* Email and Alternative should not same");

       // Setup form validation on the #register-form element
       $("#student_information_form_update").validate ({
             rules: {
               title: {
                   required: true
                   
               },
               first_name:{ 
                  required:true,
               },
			   last_name:{ 
                  required:true,
               },
               display_name:{ 
                  required:true
               },
                gender: {
                   required: true
                   
               },
               dob:{ 
                  required:true
                  
               },
               currency_id:{ 
                  required:true
               },
               address_1: {
                   required: true
                   
               },
               city:{ 
                  required:true
                  
               },
               zip_code:{ 
                  required:true,
                  digits: true
               },               
               state:{ 
                  required:true,
                  
               },
               country_id:{ 
                  required:true,
                  
               },
               home_town:{ 
                  required:true,
                  
               },
               mobile:{ 
                  required:true,
                  
               },
               skype_id:{ 
                  required:true,
                  
               },
               email:{ 
                  user_email_not_same:true,
                  
               },
               about_yourself:{ 
                  required:true,
                  
               },
               your_objective:{ 
                  required:true,
                  
               },
               /*user_file:{
					 required: "#snap_id:blank"
					 //extension: "jpg|jpeg|png|JPG|JPEG|PNG"
				},
				web_file:{
					required: "#file_field:blank"
				}*/
                


               },
               /*
              messages: {
               first_name: {
                   myField: "*enter only alphabetical characters"
               },
               display_name: {
                                         
                   myField: "*enter only alphabetical characters"
               },
               zip_code:{ 
                  
                  digits: "*enter only numbers characters"
               },
               
               user_file: {
                   extension: "*enter upload jpg/jpeg/png format images"
               }
             }, */

       });

</script>

