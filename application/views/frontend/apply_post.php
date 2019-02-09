

<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">    
    <div id="overlay"></div>
    <div class="img"></div>    
    <div class="subbgheader">
    	<h2>Apply Post</h2>
    </div>
</section>
        <section class="ptb-60 careers">
            <div class="container">               
            	<div class="row">
            	    <form method="post" action="<?= base_url();?>frontend/insert_post" id="form_id" enctype='multipart/form-data'>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name='post_id' value='<?=$post_id?>' >
                                    <label>Resume / CV *</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                        <input type="file" id='user_file' name="user_file" class="form-control input-lg">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="user_file_error"></span>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id='full_name' name="full_name" class="form-control input-lg" placeholder="Full Name" value="<?php echo set_value('full_name');?>">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="full_name_error"></span> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text" id='email' name="email" class="form-control input-lg" placeholder="Email">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="email_error"></span> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" id='mobile' name="phone" class="form-control input-lg" placeholder="Phone">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="phone_error"></span> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Current Company</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                        <input type="text" id='current_company' name="current_company" class="form-control input-lg" placeholder="Current Company">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="current_company_error"></span> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>LinkedIn URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-linkedin"></i></div>
                                        <input type="text"id='linkedin_url' name="linkedin_url" class="form-control input-lg" placeholder="LinkedIn URL">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="linkedin_url_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Twitter URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                                        <input type="text" id='twitter_url' name="twitter_url" class="form-control input-lg" placeholder="Twitter URL">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="twitter_url_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>GitHub URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-github"></i></div>
                                        <input type="text" id='github_url' name="github_url" class="form-control input-lg" placeholder="GitHub URL">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="github_url_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Portfolio URL</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                        <input type="text" id='portfolio_url' name="portfolio_url" class="form-control input-lg" placeholder="Portfolio URL">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="portfolio_url_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Other website</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                                        <input type="text" id='other_website' name="other_website" class="form-control input-lg" placeholder="Other website">
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="other_website_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Additional Information</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-list"></i></div>
                                        <textarea id='additional_information' name="additional_information" rows="7" cols="10" placeholder="Additional Information" class="form-control"></textarea>
                                    </div>
                                    <span style="color:red; font-size: 12px;" id="additional_information_error"></span>
                                </div>
                            </div>
                           <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" id='btn_submit' name="" class="btn btn-primary hvr-bounce-to-right" value="SUBMIT">
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>                                
            </div>
        </section>
        
        
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>-->


<script>
$('#user_file').change(function(){
var ext = $('#user_file').val().split('.').pop().toLowerCase();
if($.inArray(ext,['pdf','doc','docx','']) == -1){
$("#user_file_error").html("please enter doc,docx,pdf files only!"); 
return str= false;	
}
else if(ext==''){
$("#user_file_error").html("please select file");
return str= false;
}
else{	
$("#user_file_error").html(""); 
var file_size = $('#user_file')[0].files[0].size;
if(file_size>2097152){
$("#user_file_error").html("File size is greater than 2MB");
return str= false;	
}
return str= true;	
}
});
</script>
<script type="text/javascript">
  $('#btn_submit').on('click',function(){ 
  
  var str=true;
  var user_file = $('#user_file').val();
  var full_name = $('#full_name').val();
  var email = $('#email').val();
  var phone = $('#mobile').val();
  var current_company = $('#current_company').val();
  var linkedin_url = $('#linkedin_url').val();
    var twitter_url = $('#twitter_url').val();
    var github_url = $('#github_url').val();
    var portfolio_url = $('#portfolio_url').val();
    var other_website = $('#other_website').val();
    var additional_information = $('#additional_information').val();
  
  
  var emailpattern = /^[a-zA-Z0-9][a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   var mobilepattern = /^[6-9]+[0-9]{9}$/;

  $('#full_name_error,#mobile_error,#email_error,#current_company_error,#linkedin_url_error,#twitter_url_error,#github_url_error,#portfolio_url_error,#other_website_error,#additional_information_error').html('');
  $('#full_name,#mobile,#email,#current_company,#linkedin_url,#twitter_url,#github_url,#portfolio_url,#portfolio_url,#other_website,#additional_information').css('border','');
   
   if(user_file =='' ){
  str= false;
  $('#user_file_error').text('Please Upload Resume');
  $('#user_file_error').css('color','red');
  $('#user_file').css('border','1px solid red');
  }
  
  
  if(full_name =='' ){
  str= false;
  $('#full_name_error').text('Please enter  name');
  $('#full_name_error').css('color','red');
  $('#full_name').css('border','1px solid red');
  }
  
    
  if(email==''|| email==' '){ 
  str=false;
  $('#email').css('border','1px solid red');
  $('#email_error').css('color','red');
  $('#email_error').html(' Please enter email');
  }else if(!emailpattern.test(email)){
  str=false;
  $('#email').css('border','1px solid red');
  $('#email_error').css('color','red');
  $('#email_error').html(' Please enter valid email');
  }
  
  if(phone =='' ){
  str=false;
  $('#mobile_error').text('Please enter mobile');
  $('#mobile_error').css('color','red');
  $('#mobile').css('border','1px solid red');
  } else if(!mobilepattern.test(phone) || phone.length !=10){
  str=false;
  $('#mobile').css('border','1px solid red');
  $('#mobile_error').css('color','red');
  $('#mobile_error').html('Please enter 10 digit mobile no');
  }
  
  if(current_company =='' ){
  str= false;
  $('#current_company_error').text('Please enter  current company details');
  $('#current_company_error').css('color','red');
  $('#current_company').css('border','1px solid red');
  }
  
  if(linkedin_url =='' ){
  str= false;
  $('#linkedin_url_error').text('This field is required');
  $('#linkedin_url_error').css('color','red');
  $('#linkedin_url').css('border','1px solid red');
  }
  if(twitter_url =='' ){
  str= false;
  $('#twitter_url_error').text('This field is required');
  $('#twitter_url_error').css('color','red');
  $('#twitter_url').css('border','1px solid red');
  }
  
  if(github_url =='' ){
  str= false;
  $('#github_url_error').text('This field is required');
  $('#github_url_error').css('color','red');
  $('#github_url').css('border','1px solid red');
  }
  if(portfolio_url =='' ){
  str= false;
  $('#portfolio_url_error').text('This field is required');
  $('#portfolio_url_error').css('color','red');
  $('#portfolio_url').css('border','1px solid red');
  }
  
  if(other_website =='' ){
  str= false;
  $('#other_website_error').text('This field is required');
  $('#other_website_error').css('color','red');
  $('#other_website').css('border','1px solid red');
  }
  
  if(additional_information =='' ){
  str= false;
  $('#additional_information_error').text('This field is required');
  $('#additional_information_error').css('color','red');
  $('#additional_information').css('border','1px solid red');
  }
  
  
 
  
  return str;
  
  });
</script>

<!--<script>
$(document).ready(function(){
    $("#form_id").validate({
 rules:
  {
   f_name: "required",
    l_name: "required",
     email: "required email",
      },
       messages: 
       { 
       f_name: "Enter your First Name", 
       l_name: "Enter your Last Name",
        email:
         { required: "Enter your Email",
          email: "Please enter a valid email address.", }
           }
            });
});
</script>-->
