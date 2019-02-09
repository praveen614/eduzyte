<style>
  label.error{
    color:red;
  }
</style>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>MY DASHBOARD</h2>
  </div>
</section>
<section id="app-about-area" class="ptb-30 dashboard profstep persform">
  <div class="container">  
        <div class="about-app mt-0">
          <?php include 'tutor_welcome.php';?>
		  <?php if($this->session->flashdata('page_success')){?>
          <div class="alert alert-success alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_success');?>
          </div>
          <?php }?>
          <div class="row">
            <div class="col-md-3">
                  <?php include 'referrals_menu.php';?>
            </div>
            <div class="col-md-9">
               <?php include 'dashboard_tabmenu.php';?>
               <div class="mt10">
                 <h4 class="blutxt">Your friend's details <small>(The student you are referring to Eduzyte)</small></h4> <hr>
                 <form id="referral_form" method="post" action="" class="form-horizontal mt-20 profstep">
				 <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>" class="form-control input-lg" >
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Name <span class="red">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control input-lg txtOnly" placeholder="Name of Student">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email ID <span class="red">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" name="email" id="student_email" class="form-control input-lg" placeholder="Email ID of student">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mobile Number <span class="red">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" name="mobile" id="student_mobile" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-lg" placeholder="Mobile Number of Student">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label">Country <span class="red">*</span> </label>
                    <div class="col-sm-10">
                      <select name="country_id" class="form-control input-lg seexam">
                          <option value="">Select Country</option>
                          <?php foreach($country as $row){?>
							<option value="<?=$row->id?>"><?=$row->country?></option>
							<?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Requirement <span class="red">*</span> </label>
                    <div class="col-sm-10">
                      <select name="subject_course_id" class="form-control input-lg seexam">
                          <option value="">Select Exam</option>
                          <option disabled>--Subjects--</option>
                            <?php foreach($subjects as $row){?>
							<option value="<?=$row->subject_generate_id?>"><?=$row->subject?></option>
               <?php } ?>   
				<option disabled>--Courses--</option>
                            <?php foreach($course as $row){?>
                <option value="<?=$row->course_generate_id?>" <?php if(isset($subjects_edit_data)){echo ($subjects_edit_data->subject_course_id == $row->course_generate_id)?'selected':'' ;}?> ><?=$row->course?></option>
               <?php } ?>   			   
                      </select>
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-2 control-label"> <span class="red"></span> </label>
                    <div class="col-sm-10">
                      <input type="checkbox" id="age">  student is above 18 years of age
                    </div>
                  </div>
                  <h4 class="blutxt">Parent details <small>(Mandatory if student is below 18 years of age)</small></h4> <hr>
                  <div class="form-group">
                   <label class="col-sm-2 control-label">Parent's Name <span class="red">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" id="p_name" name="parent_name" class="form-control input-lg " placeholder="Name of either mother or father">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Parent's Email ID <span class="red">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" id="p_email" name="parent_email" class="form-control input-lg" placeholder="Email ID either mother or father">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Parent's Mobile <span class="red">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" id="p_mobile" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="parent_mobile" class="form-control input-lg" placeholder="Mobile Number either mother or father">
                    </div>
                  </div>
                  <hr>
                  <button class="btn btn-primary pull-right" id="submit" type="submit"><i class="fa fa-plus-circle"></i> Add Student Details</button>
                 </form>
               </div>
            </div>
          </div>
        </div>
  </div>
</section>
<!--
<script type="text/javascript">
$(document).ready(function(){ 
$('#Submit1').click(function() {alert('in');
    var emailVal = $('#student_email').val(); 
	var mobileVal = $('#student_mobile').val();
    $.post('<?=base_url()?>checkemail.php', {'email' : emailVal}, function(data) {
        if(data=='exist') return false;
        else $('#form1').submit();
    });
});});
</script>-->

<script type="text/javascript">
$('#age').change(function(){
    if ($('#age').is(':checked') == true){
        $('#p_name').prop('disabled', true);
		$('#p_email').prop('disabled', true);
		$('#p_mobile').prop('disabled', true);
        console.log('checked');
    } else {
        $('#p_name').prop('disabled', false);
		$('#p_email').prop('disabled', false);
		$('#p_mobile').prop('disabled', false);
        console.log('unchecked');
    }
});


 // Setup form validation on the #register-form element
       $("#referral_form").validate ({
		   
             rules: {
				name:{ 
                  required:true
               },
			    email:{ 
                  required:true,
				  remote: {
                    url: "<?=base_url()?>student/check_email",
                    type: "post"
                 }
               },
			    mobile:{ 
                  required:true,
				  remote: {
                    url: "<?=base_url()?>student/check_mobile",
                    type: "post"
                 }
               },
				country_id:{ 
                  required:true
               },
			   subject_course_id:{ 
                  required:true
               },
               parent_name:{ 
                  required:true
               },
			    parent_email:{ 
                  required:true
               },
			    parent_mobile:{ 
                  required:true
               }
               },
				messages: {
					email: {
						required: "Please enter your email address.",						
						remote: "Email already in use!"
					},
					mobile: {
						required: "Please enter your Mobile.",						
						remote: "Mobile already in use!"
					},
				},
				submitHandler: function(form) {
									form.submit();
								 }
               
               
       });
	   
       
       </script>                                             
