<!-- <section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>LOGIN</h2>
  </div>
</section> -->
<section style="background-image:url(<?=base_url()?>front_assets/img/Teacher-and-student.jpg);  background-position: left center; background-image: no-repeat; height: 900px;" class="bg-img">
  <div class="clearfix">
    <div class="col-md-8"></div>
    <div class="col-md-4 login bg-white z-index2 relative skew-section left-bottom">      
      <div class="about-app">
          <div class="section-heading text-center mb-0">
            <h2 class="tutprofile" style="padding-bottom:10px; padding-top: 50px;"><span>Login / <span class="blutxt">Register</span> </span></h2>
          </div>
        </div>
		
		
       <div align="center" class="mb-10">
          <span class="togsw"><a href="<?=base_url()?>existing_user">Existing User?</a></span>
          <label class="switch">
          <input type="checkbox" id="reg_123" name="reg_123" onclick="return yousendit();"  checked>
          <span class="slider round"></span>
        </label>
        
         <span class="togsw1"><a href="<?=base_url()?>new_user">New User?</a></span>
       </div>
       <div class="row">
         <form method="post" id="formfield" action="<?=base_url()?>frontend/register_data" >
		 <input type="hidden" name="action" value="add_form" /> 
          <div class="col-md-4">
            <div class="form-group">
                <select class="form-control id="title1" name="title1" input-lg intial">
                  <option value="Mr">Mr</option>
                  <option value="Ms">Ms</option>
                  <option value="Mrs">Mrs</option>
                  <option value="Dr">Dr</option>
                </select>
            </div>
          </div>   
          <div class="col-md-8">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user-plus"></i></div>
                <input type="text" id="first_name" name="first_name" value="<?= set_value('first_name')?>" class="form-control input-lg txtOnly" placeholder="Firstname" >
              </div>
            </div>            
          </div>
           <div class="col-md-12">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                <input type="text" id="email" name="email" value="<?= set_value('email')?>" class="form-control input-lg" placeholder="Email" >
              </div>
			  <span id="email_error"></span> <span style="color:red; font-size: 12px;"><?php echo form_error('email');?></span>
            </div>            
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="number" id="phone"  name="phone" value="<?= set_value('phone')?>"  class="form-control input-lg" placeholder="Mobile Number" >
            </div>
			<span  style ="color:red;font-size: 12px;"><?php echo form_error('phone');?></span>            
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password">
              </div>
			  <span id="password_error1"></span>
            </div>            
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-refresh"></i></div>
                <input type="password" id="re_password" class="form-control input-lg" placeholder="Retype Password">
              </div>
			  <span id="password_error"></span>
            </div>
				
          </div> 
          <div align="center" class="mb-10">
          <span class="togsw"><a href="">Tutor?</a></span>
          <label class="switch">		 
          <input type="checkbox" name="method_type" id="type12" value="1"  onchange="send_type();" checked>
          <span class="slider round"></span>
        </label>
         <span class="togsw1"><a href="">Student?</a></span>
       </div>  
          <div class="col-md-12">
            <div class="text-center">
              <label for=""><input type="checkbox" name="agree" id="terms" checked> I agree to <a href="">Terms and Conditions</a></label>
            </div>
            <div class="form-group">
        <button class="btn pull-right" id="reg_btn" data-toggle="modal" data-target="#confirmModal"><i class="icofont icofont-paper-plane"></i> REGISTER</button>
      </div>
          </div>
         </form>
       </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="pt-40">You are selected for<span id='result_type'> student </span> registration process. <br>Is it correct?</h4>
                  <hr>
			 
              <div class="form-group">
					
					
                <button type="button" class="btn" id="submit" name="yes"><i class="icofont icofont-checked"></i> YES</button>
				
                <!--<button type="button" class="btn" onclick="location.href='<?=base_url()?>otp_verification'"><i class="icofont icofont-checked"></i> YES</button>-->
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn"><i class="icofont icofont-close"></i> NO</button> 
              </div>                
                
      </div>
    </div>
  </div>
</div>
<script>
  $('.timeset select').timezones();
    $("#phone").intlTelInput({
      utilsScript: "<?=base_url()?>front_assets/js/utils.js"
    });
</script>


<script>
  function yousendit(){ 
  if(document.getElementById('reg_123').checked == false){ 
  window.location='<?base_url()?>existing_user'; 
  return false;
   }
    return true;
     }
 
 
     function send_type()
     {
		 
       if( $(this).prop('checked',false)) 
       
       {		   
          $('#result_type').html(' tutor');
		            
       }
       else
         {
            $('#result_type').html('student');
             
         }
         
     }
      </script>
	  
	  <script>
	  $('#reg_btn').click(function() {
		  //alert('hai');
		var str=true;
  var name = $('#first_name').val();
  var email = $('#email').val();
  var phone = $('#phone').val();
  var password = $('#password').val();
  var re_password = $('#re_password').val();
  var emailpattern = /^[a-zA-Z0-9][a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   var mobilepattern = /^[6-9]+[0-9]{9}$/;
   var passwordpattern=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
   var terms = $('#terms').val();

  //$('#name_error,#phone_error,#email_error,#message_error').html('');
  $('#first_name,#phone,#email,#password').css('border','');
    
  if(name =='' ){
  str= false;
  
  $('#first_name').css('border','1px solid red');
  }
  
    
  if(email==''|| email==' '){ 
  str=false;
  $('#email').css('border','1px solid red');
  
  }else if(!emailpattern.test(email)){
  str=false;
  
  $('#email_error').css('color','red');
  $('#email_error').html(' Please enter valid email');
  }
  
  if(phone =='' ){
  str=false;
  $('#phone').css('border','1px solid red');
  } /*else if(!mobilepattern.test(phone) || phone.length !=10){
  str=false;
  $('#phone').css('border','1px solid red');
  }	*/
  if(password =='' ){
  str= false;  
  $('#password').css('border','1px solid red');
  }else if(!passwordpattern.test(password)){
  str=false;  
  $('#password_error1').css('color','red');
  $('#password_error1').html('Password should be 6 to 16 characters enter at least a number and a special character');
  }else{
	 $('#password_error1').html(''); 
  }
  if(re_password =='' ){
  str= false;  
  $('#re_password').css('border','1px solid red');
  }
  if(re_password != password){
  str= false;  
  $('#password_error').css('color','red');
  $('#password_error').html('Password Not matched');
  }else{	 
  $('#password_error').html(''); 
  }
  if(terms =='' ){
  str= false;  
  $('#terms').css('border','1px solid red');
  }
	 
	 event.preventDefault();
	 return str;
	}); 
	
	
	$('#submit').click(function(){
   
    $('#formfield').submit();
	return true;
	
});
	  
	  </script>
	  
	  
	  
