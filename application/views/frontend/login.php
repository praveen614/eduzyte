<style>
  label.error{
    color:red;
  }
  .btn-custom {
    border-bottom: 5px solid #285e8e;
    position: relative;
}

.btn-custom:hover {
    top: 2.5px;
    border-bottom-width: 2.5px;
}

.btn-custom:active {
    top: 5px;
    border-bottom: 0;
}
</style>
<!-- <section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>LOGIN</h2>
  </div>
</section> -->
<section style="background-image:url(<?=base_url()?>front_assets/img/Teacher-and-student.jpg);  background-position: left center; background-image: no-repeat; min-height: 900px;" class="bg-img">
  <div class="clearfix">
    <div class="col-md-8"></div>
    <div class="col-md-4 login bg-white z-index2 relative skew-section left-bottom">
      <!-- <div class="ptb-10" align="center">
        <img src="img/animlock.gif" width="131" height="99">
      </div> -->
	   <?php  if($this->session->flashdata('logout_notification')) { ?>
          <div class="alert alert-success alert-dismissible" style="margin-bottom: -5px;margin-top:15px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $this->session->flashdata('logout_notification'); ?> .
            </div>
              <?php } ?>
			  <?php  if($this->session->flashdata('login_message')) { ?>
          <div class="alert alert-success alert-dismissible" style="margin-bottom: -5px;margin-top:15px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $this->session->flashdata('login_message'); ?> .
            </div>
              <?php } ?>
      <div class="about-app">
          <div class="section-heading text-center mb-0">
            <h2 class="tutprofile" style="padding-bottom:10px; padding-top: 35px; margin-bottom: 5px;"><span>Login / <span class="blutxt">Register</span> </span></h2>
          </div>
        </div><br>
       <div align="center" class="mb-10">
          <span class="togsw"><a href="<?=base_url()?>existing_user">Existing User?</a></span>
          <label class="switch">
          <input type="checkbox" id="log_123" name="log_123" onclick="return yousendit();" >
          <span class="slider round"></span>
        </label>
         <span class="togsw1"><a href="<?=base_url()?>new_user">New User?</a></span>
       </div>
      <form method="post" action="<?=base_url()?>frontend/check_login">
	  <?php if($this->session->flashdata('login_error')){?>
            <span style="color: red"><b><?=$this->session->flashdata('login_error') ?></b></span>
          <?php }?>
        <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
          <input type="text" id="email" name="email" class="form-control input-lg" placeholder="Email / Mobile">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-unlock"></i></div>
          <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password">
        </div>
      </div>
      <div align="center" class="mb-10">
          <span class="togsw"><a href="">Tutor?</a></span>
          <label class="switch">
          <input type="checkbox" name="method_type" id="type12" value="1"  onchange="send_type();" >
          <span class="slider round"></span>
        </label>
         <span class="togsw1"><a href="">Student?</a></span>
       </div>
      <div class="form-group">
        <a data-toggle="modal" href="#forgotModal" class="pt-10"><i class="fa fa-question-circle"></i> Forgot Password?</a>
        <button type="submit" id="login_btn" class="btn pull-right"><i class="icofont icofont-paper-plane"></i> LOGIN</button>
      </div>
      <div class="ordevider">
          <span>or</span>
      </div>
      <div class="socmedlogin">
        <p>Login With</p>
      <a href="<?=base_url()?>Facebook_login" class="btn fb"><i class="fa fa-facebook"></i> Facebook</a>
      <a href="<?=base_url()?>Google_login" class="btn gm"><i class="fa fa-google"></i> Gmail</a>
      </div>
      </form>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">FORGOT PASSWORD?</h4> <hr>
              <div class="row">			  
                <div class="col-md-8 col-md-offset-2">
				<div id="box"></div>
				
				<form id="forget_password"  onsubmit="return forgot_password();">
				<div><p>Enter the email address or mobile phone number associated with your Eduzyte account.</p></div>
				<div class="form-group">                                    
                <div class="input-group">                  
                  <input type="radio" name="table_type"  value="tutor" required>Tutor
				  <input type="radio" name="table_type"  value="student" >Student
				  </div> 
					<span id="usertable_error" style="color:red"></span>
              </div>
                  <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                  <input type="text" name="forget_email" class="form-control input-lg" placeholder="Email Address / Mobile">
                </div>
				<span id="useremail_error" style="color:red"></span>
              </div>              
              <div class="form-group">                
                <button type="submit" class="btn btn-custom"><i class="icofont icofont-paper-plane"></i> SUBMIT</button> 
              </div> 
			  </form>
                </div>
              </div>                             
                
      </div>
    </div>
  </div>
</div>

<script>

$('#login_btn').click(function() {
		  //alert('hai');
		var str=true;
  
  var email = $('#email').val();  
  var password = $('#password').val();
  

  //$('#name_error,#phone_error,#email_error,#message_error').html('');
  
  if(email==''|| email==' '){ 
  str=false;
  $('#email').css('border','1px solid red');
  }
  if(password =='' ){
  str= false;  
  $('#password').css('border','1px solid red');
  }
	 return str;
	}); 


  function yousendit(){ 
  if(document.getElementById('log_123').checked == true){ 
  window.location='<?base_url()?>new_user'; 
  return false;
   }
    return true;
     }
      </script>
	   <script type="text/javascript">

 // Setup form validation on the #register-form element
	  
	  $("#forget_password11").validate ({
		   
             rules: {
               table_type: {
                   required: true                   
               },
               forget_email:{ 
                  required:true
               }
               }
               
       });

       </script>
	   
	   <script type="text/javascript">
	   function forgot_password()
{
	var usertable=$('input[name=table_type]').val();
    var useremail=$('input[name=forget_email]').val();
	 var errorcount=0;
	if(usertable=='')
  {
    $('#usertable_error').html('This Field is required');
    $('#usertable_error').css('color','red');
    errorcount++;
  }else {
    $('#usertable_error').html('');
  }
  if(useremail==''){
    $('#useremail_error').html('Please Enter Your Email/Mobile');
    $('#useremail_error').css('color','red');
    errorcount++;
  }else {
    $('#useremail_error').html('');
  }
if(errorcount>0){
    return false;
  }else{
	  var form_data = {		  
		'table_type' : $('input[name=table_type]:checked').val(),
		'useremail' : $('input[name=forget_email]').val(),
	  }
	 
  $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "frontend/forgot_password",
        data:form_data,
        success : function(response) {		
         
       if (response.trim() == 'success') {         
          $('#box').html('<span style="color:green">We"'"ve sent a new password to your registered Email</span>');
        }         
        if (response.trim() == 'failure') {
          $('#box').html('<span style="color:red">Your enterd Email/mobile is not Correct</span>');
        }
      }
      });
	  
	  return false;
  }  
	
	  
}
</script>

