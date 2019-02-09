<style>
  label.error{
    color:red;
  }
</style>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>PERSONAL INFORMATION</h2>
  </div>
</section>

<section id="how-it-works-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="about-app mt-0 single-widget">
          <div class="progress mtmb-20">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
            Page 1/5
          </div>
        </div>
		<?php if($this->session->flashdata('form_error')){?>
          <div class="alert alert-danger alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('form_error');?>
          </div>
          <?php }?>
        <div class="row">
            <div class="col-md-12">
              <h4 class="blutxt">Personal Information</h4> <hr>
            </div>
          </div>
		  <?php if(isset($tutor_data)){$form_id="tutor_information_form_update";}else{$form_id="tutor_information_form";}?>
         <form id="<?=$form_id?>" action="" method="post" enctype="multipart/form-data" class="persform">
              <div class="col-md-4 col-sm-4">
            <div class="form-group">
              <label for=""><strong>Salutation</strong> <span>*</span></label>
                <select name="title" class="form-control input-lg intial">
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
		  
          <div class="col-md-4 col-sm-4">
            <div class="form-group">
              <label for=""><strong>Firstname</strong> <span>*</span></label>
              <input type="text" id="fname" name="first_name" class="form-control input-lg" value="<?=$saved_data->name?>" readonly placeholder="Enter Firstname">
            </div>            
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="form-group">
              <label for=""><strong>Lastname</strong> <span>*</span></label>
              <input type="text" id="lname" name="last_name" value="<?php if(isset($tutor_data)){echo $tutor_data->last_name ;} ?>" class="form-control input-lg txtOnly" placeholder="Enter Lastname">
            </div>            
          </div>
          
          <div class="col-md-12 col-sm-12">
            <div class="form-group">
              <label for=""><strong>Display Name</strong></label><br>
            <small>(Your first name followed by your lastname will appear as default in case you do not enter a display name)</small>
            <input type="text" name="display_name" value="<?php if(isset($tutor_data)){echo $tutor_data->display_name ;} ?>"  class="form-control input-lg txtOnly">
            </div>
          </div>
			
          <div class="col-md-12 col-sm-12">
            <div class="form-group">
              <label for=""><strong>Profile Photo</strong> <span>*</span></label><br>
            <small>(The photo should be a high resolution, recently taken calear image of your face. While getting photo clicket, look directly into the camera. Maximum size allowed for upload - 1 MB. We recommend you to upload 3 different pictures for your profile photo.)</small>
            </div>
          </div>
			
			<?php if(isset($tutor_data)){ ?> <input type="hidden" id="old_image" name="old_profile_image" value="<?= $tutor_data->profile_image ?>" > <?php }?>
			<div class="clear-fix"></div>
          <div class="col-md-6">
            <div class="form-group">
              Picture 
              <input type="file" id="file_field" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG," name="user_file" class="form-control input-lg" onchange='check_file(this.value)'><label id="file_field-error" class="error" for="file_field"></label>
            </div>
          </div>
		  
          <div class="col-md-1 pt-30">(OR)</div> 
          <div class="col-md-5">
            <label for=""><strong>Capture Picture</strong></label>
            <p class="mb-0">From your webcam<br>
            size : 180px X 180px</p>
            <div class="form-group">
			<input type="hidden" id="snap_id" name="web_file" class="image-tag" >
              <input type="button" class="btn btn-primary btn-md" data-toggle="modal" id="capture_id" data-target="#GPICModal1" value="capture">
             
            </div>
          </div> 
          <div class="col-md-3">
            <label for=""><strong>Gender</strong> <span>*</span></label>
            <div class="form-group">
              <select name="gender" class="form-control input-lg teach">
               <option value="">Select</option>
                <option value="Male" <?php if(isset($tutor_data)){echo($tutor_data->gender == 'Male')?'selected':'' ;} ?>>Male</option>
                <option value="Female" <?php if(isset($tutor_data)){echo($tutor_data->gender == 'Female')?'selected':'' ;} ?>>Female</option>
                <option value="Other" <?php if(isset($tutor_data)){echo($tutor_data->gender == 'Other')?'selected':'' ;} ?>>Other</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <label for=""><strong>Date of Birth</strong> <span>*</span></label>
            <div class="form-group">
              <input type="date" name="dob" id="txtDate" value="<?php if(isset($tutor_data)){echo $tutor_data->dob ;} ?>" placeholder="Enter Date of Birth"  class="form-control input-lg" >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for=""><strong>Government Photo Identity Card</strong> <span>*</span></label> <br>
            <small>(Please upload a clear scanned copy of a government Photo Identity from the list provided via the drop down menu.)</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <select id="govt_prof_id" name="govt_id_prof_id" class="form-control input-lg teach">
			   <option value="">--Select--</option>
                <?php foreach($govt_id as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($tutor_data)){echo($tutor_data->govt_id_prof_id == $row->id)?'selected':'' ;} ?>><?=$row->govt_id?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
		    <?php if(isset($tutor_data)){ ?> <input type="hidden" name="old_govt_proof" value="<?= $tutor_data->govt_id_prof_file ?>" > <?php }?>
            <input type="file" id="govt_prof_file" name="govt_id_prof_file" class="form-control input-lg" <?php if(isset($tutor_data)){ echo "";}else{echo "required";}?>>
			
          </div>
		  
          <div class="col-md-12">
            <div class="form-group res-mt-10">
              <input type="checkbox" id="skip_govt" name="skip_govt_id" value="0" <?php if(isset($tutor_data)){ echo ($tutor_data->skip_govt_id == '0') ? 'checked':'';}?> data-toggle="modal" data-target="#GPICModal"> Skip for now - I will upload later.
            </div>
          </div>
		  <script>
		  $('#skip_govt').change(function(){
				if ($('#skip_govt').is(':checked') == true){
					$('#govt_prof_id').prop('disabled', true);
					$('#govt_prof_file').prop('disabled', true);		
					console.log('checked');
				} else {
					$('#govt_prof_id').prop('disabled', false);
					$('#govt_prof_file').prop('disabled', false);		
					console.log('unchecked');
				}
			});

		  </script>
          <div class="col-md-12">
            <label for=""><strong>PAN Details</strong> <span>*</span></label>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <!--<input type="radio" id="pan_check"  value="1" <?php if(isset($tutor_data)){ echo ($tutor_data->pan_status == '1') ? 'checked':'';}?>   name="pan_status"> Enter Your PAN <br>-->
              <input type="text" id="pan" name="pan_card" value="<?php if(isset($tutor_data)){echo $tutor_data->pan_card ;} ?>" pattern="[/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/]"  class="showpan form-control input-lg"  placeholder="Enter Your PAN" id="hdpan">
            </div>
          </div>
		  <div class="col-md-12">
            <div class="form-group res-mt-10">
              <input type="checkbox" id="pan_check" name="pan_status" value="0" <?php if(isset($tutor_data)){ echo ($tutor_data->pan_status == '0') ? 'checked':'';}?> > Skip for now - I will upload later.
            </div>
          </div>
          <!--<div class="col-md-4">
            <input type="radio" id="pan_check1"  onclick="donPAN()" value="0" <?php if(isset($tutor_data)){echo ($tutor_data->pan_status == '0') ? 'checked':'';}?> name="pan_status"> I dont have a PAN
          </div>-->
		  
		  <script>
		  $('#pan_check').change(function(){
			if ($('#pan_check').is(':checked') == true){
				$('#pan').prop('disabled', true);				
			} else {
				$('#pan').prop('disabled', false);
					
				console.log('unchecked');
			}
		});
		  

		  </script>
		   
          <div class="clear-fix"></div>
          <div class="col-md-12">
            <h4 class="blutxt">Communication Details</h4><hr>
          </div>
          <div class="col-md-12">
            <p>(This information is required for Eduzyte internal record and will not be displayed on your tutor profile.)</p> <hr>
          </div>
          <div class="col-md-12">
            <label for=""><strong>Address for Correspondence</strong></label>
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="address_1" value="<?php if(isset($tutor_data)){echo $tutor_data->address_1 ;} ?>" class="form-control input-lg" placeholder="Address Line 1"> 
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="city" value="<?php if(isset($tutor_data)){echo $tutor_data->city ;} ?>" class="form-control input-lg" placeholder="City/Town"> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="zip_code" value="<?php if(isset($tutor_data)){echo $tutor_data->zip_code ;} ?>" class="form-control input-lg" placeholder="Zip/Postal Code">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="landmark" value="<?php if(isset($tutor_data)){echo $tutor_data->landmark ;} ?>" class="form-control input-lg" placeholder="Landmark">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="state" value="<?php if(isset($tutor_data)){echo $tutor_data->state ;} ?>" class="form-control input-lg" placeholder="State/Province">
            </div>
			</div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
               <select name="country_id" class="input-lg form-control teach">
                <option value="">Country</option>
                <?php foreach($country as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($tutor_data)){echo($tutor_data->country_id == $row->id)?'selected':'' ;} ?>><?=$row->country?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><span class="astred">*</span>
              <input type="text" name="home_town" value="<?php if(isset($tutor_data)){echo $tutor_data->home_town ;} ?>" class="form-control input-lg" placeholder="Home Town">
            </div>
          </div>
          <div class="col-md-12">
            <label for=""><strong>Current Address Proof</strong> <span>*</span></label><br>
            (Please provide a clear scanned copy of your address proof from the list provided via the drop down menu.)
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <select id="address_proof" name="address_proof_id" class="form-control input-lg teach">
                <option value="">--Select--</option>
                <?php foreach($address_id as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($tutor_data)){echo($tutor_data->address_proof_id == $row->id)?'selected':'' ;} ?>><?=$row->address_prof?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
		  <?php if(isset($tutor_data)){ ?>  <input type="hidden" name="old_address_proof" value="<?= $tutor_data->address_prof_file ?>" > <?php }?>
            <input type="file" id="address_file" name="address_prof_file" class="form-control input-lg" <?php if(isset($tutor_data)){ echo "";}else{echo "required";}?> >
			
          </div>
          <div class="col-md-12">
            <div class="form-group res-mt-10">
              <input type="checkbox" id="skip_address" value="0" name="skip_address_prof" <?php if(isset($tutor_data)){echo ($tutor_data->skip_address_prof == '0') ? 'checked':'';}?>  data-toggle="modal" data-target="#CAPModal"> Skip for now - I will upload later.
            </div>
          </div>
		  <script>
		  $('#skip_address').change(function(){
    if ($('#skip_address').is(':checked') == true){
        $('#address_proof').prop('disabled', true);
		$('#address_file').prop('disabled', true);		
        console.log('checked');
    } else {
        $('#address_proof').prop('disabled', false);
		$('#address_file').prop('disabled', false);		
        console.log('unchecked');
    }
});

		  </script>
          <div class="col-md-3">
            <div class="form-group">
              <label for=""><strong>Primary Contact Number </strong> <span>*</span></label>
            <input id="phone" type="tel" name="mobile" value="<?=$saved_data->mobile?>" readonly onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-lg" placeholder="Primary Contact No.">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for=""><strong>Secondary Contact Number </strong></label>
              <input id="phone1" type="tel" name="mobile_2" value="<?php if(isset($tutor_data)){echo $tutor_data->mobile_2 ;} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-lg" placeholder="Enter Your Phone No.">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for=""><strong>Whatsapp Number </strong></label>
            <input id="phone2" type="tel" name="whatsup_no" value="<?php if(isset($tutor_data)){echo $tutor_data->whatsup_no ;} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-lg" placeholder="Whatsapp Number">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for=""><strong>Skype ID</strong> <span>*</span></label>
              <div class="input-group">
                <div class="input-group-addon" style="background-color: #fff; border:1px solid #ccc; border-right:0px; color: #05adff"><i class="fa fa-skype fa-lg"></i></div>
                <input type="text" name="skype_id" value="<?php if(isset($tutor_data)){echo $tutor_data->skype_id ;} ?>" class="form-control input-lg" placeholder="Skype ID">
              </div>
            </div>
          </div>
          <div class="clear-fix"></div>
          <div class="col-md-6">
            <div class="form-group">
              <label for=""><strong>Primary Email Address </strong> <span>*</span></label>
            <input type="email" name="email" id="email_1" class="form-control input-lg" value="<?=$saved_data->email?>" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for=""><strong>Secondary Email Address </strong></label>
            <input type="email" name="alternative_email" value="<?php if(isset($tutor_data)){echo $tutor_data->alternative_email ;} ?>" id="email_2" class="form-control input-lg" placeholder="Enter Your Email Address">
            </div>
          </div>
          <div class="col-md-12">
            <h4 class="blutxt">Social Links</h4> <hr>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                <input type="text" class="form-control input-lg" name="facebook_link" value="<?php if(isset($tutor_data)){echo $tutor_data->facebook_link ;} ?>"  placeholder="Facebook Profile">
              </div>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                <input type="text" class="form-control input-lg" name="twitter_link" value="<?php if(isset($tutor_data)){echo $tutor_data->twitter_link ;} ?>" placeholder="Twitter Profile">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-linkedin"></i></div>
                <input type="text" class="form-control input-lg" name="linkedin_link" value="<?php if(isset($tutor_data)){echo $tutor_data->linkedin_link ;} ?>" placeholder="Linkedin Profile">
              </div>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-youtube"></i></div>
                <input type="text" class="form-control input-lg" name="youtube_link" value="<?php if(isset($tutor_data)){echo $tutor_data->youtube_link ;} ?>" placeholder="Video Credentials">
              </div>
            </div>
          </div>
          <!-- <div class="col-md-12 timeset">
            <div class="form-group">
               <label for=""><strong>Timezone </strong> <span>*</span></label> <br>
                (Enter correct time zone - it is important for scheduling of your classes.)
                <select class="form-control input-lg seexam"></select>
            </div>
          </div> -->
          <div class="col-md-12">
            <div class="form-group">
       <a href="javascript: history.go(-1)" class="btn pull-left res-mt-10" ><i class="icofont icofont-simple-left"></i> BACK</a>
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

<div class="modal fade" id="GPICModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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


<script src="<?=base_url()?>front_assets/js/timezones.full.js"></script>
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/intlTelInput.css">
<script src="<?=base_url()?>front_assets/js/intlTelInput.js"></script>
<script>
    $('.timeset select').timezones();
    $("#phone,#phone1,#phone2").intlTelInput({
      utilsScript: "<?=base_url()?>front_assets/js/utils.js"
    });
    function donPAN(){
      //$(".showpan").hide();
      alert('Please note that disbursement of payments for tutoring services provided, for example, tutoring session taken, content submission-articles,quizzes, etc.Will be done only after PAN card is submitted at Eduzyte.');
	  }
    $(".enterpan").click(function(){
    $(".showpan").toggle();
    });

</script>


  <!-- Modal -->
<div class="modal fade" id="GPICModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Government Photo Identity Card</h4> <hr>
              <div class="row">
                <div class="col-md-12">
                  <p>Please not that disbursement of payments for tutoring services provided, for example, tutoring sessions taken, content submission articles, quizzes, etc. will be done only after a valid government photo id card is submitted at Eduzyte.</p>  
                </div>
              </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn" data-dismiss="modal">OK</button> 
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="CAPModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Current Address Proof</h4> <hr>
              <div class="row">
                <div class="col-md-12">
                  <p>Please note that disbursement of payments for tutoring services provided, for example, tutoring sessions taken, content submission articles, quizzes, etc. will be done only after a valid current address proof is submitted at Eduzyte.</p>  
                </div>
              </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn" data-dismiss="modal">OK</button> 
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
$(document).ready(function(){
$(function(){
    var dtToday = new Date();
	
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear()-18;
	var oldyear = dtToday.getFullYear()-68;

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
	var minDate = oldyear + '-' + month + '-' + day;
    
    $('#txtDate').attr('max', maxDate);
	$('#txtDate').attr('min', minDate);
});
});

$.validator.addMethod("user_email_not_same", function(value, element) {
   return $('#email_1').val() != $('#email_2').val()
}, "* primary Email and secondary should not same");

       // Setup form validation on the #register-form element
       $("#tutor_information_form").validate ({
             rules: {
               title: {
                   required: true
                   
               },
               first_name:{ 
                  required:true,
               },
               last_name:{ 
                  required:true
               },
                gender: {
                   required: true
                   
               },
				dob:{ 
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
			   govt_id_prof_id:{ 
                  required:true,
                  
               },
			   govt_id_prof_file:{ 
                  required:true,                  
               },
			   address_proof_id:{ 
                  required:true,
                  
               },
			   address_prof_file:{ 
                  required:true,                  
               },
			   pan_card:{ 
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
               
              messages: {
               /*first_name: {
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
               }*/
             }, 

       });
 


</script>

<script type="text/javascript">

$.validator.addMethod("user_email_not_same", function(value, element) {
   return $('#email_1').val() != $('#email_2').val()
}, "* primary Email and secondary should not same");

       // Setup form validation on the #register-form element
       $("#tutor_information_form_update").validate ({
             rules: {
               title: {
                   required: true
                   
               },
               first_name:{ 
                  required:true,
               },
               last_name:{ 
                  required:true
               },
                gender: {
                   required: true
                   
               },
				dob:{ 
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
			   pan_status:{ 
                  required:true,
                  
               },
               email:{ 
                  user_email_not_same:true,
                  
               },
			   govt_id_prof_id:{ 
                  required:true,
                  
               },
			   address_proof_id:{ 
                  required:true,
                  
               },
			   /*govt_id_prof_file:{ 
                  required:true,                  
               },			   
			   address_prof_file:{ 
                  required:true,                  
               },*/
			   pan_card:{ 
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
               
              messages: {
               /*first_name: {
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
               }*/
             }, 

       });
 


</script>
