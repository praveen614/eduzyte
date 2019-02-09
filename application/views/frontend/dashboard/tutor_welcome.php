<?php $id = $this->session->userdata('user_id');			
   if($user_type == "tutor"){
	   $data = $this->Tutor_model->get_tutor_data('tutor_personal_profile',$id);
	   if(!empty($data->profile_image)){
		   $image_url="uploads/tutor_profile/".$data->profile_image;		   	   
	   }else{
			   $image_url="front_assets/img/tutor1.jpg";
		   }
	   }else{
		   $data = $this->Student_model->get_student_data('student_personal_profile',$id);
		   if(!empty($data->profile_image)){
		   $image_url="uploads/student_profile/".$data->profile_image;		   	
		   }else{
			   $image_url="front_assets/img/tutor1.jpg";
	   }} ?>
   
<div class="well">
  <div class="row">
    <div class="col-md-1" align="center">	
      <img src="<?=base_url($image_url)?>" alt="" class="prfimg" width="100" height="100">
    </div>
    <div class="col-md-11 pl-60 pt-20">
      <span>
        <h4>Hello <?=$this->Front_end_model->get_session_name();?></h4>
        <p>Welcome to Eduzyte! On Eduzyte awesome tutors take 1-to-1 live and interactive classes to help you achieve your academic goals! <a href="#" class="blutxt">Start Now.</a></p>
      </span>
    </div>
	        <a data-toggle="modal" href="#changeModal" class="pt-10"><i class="fa fa-lock"></i> Change Password</a>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CHANGE PASSWORD ?</h4> <hr>
              <div class="row">			  
                <div class="col-md-8 col-md-offset-2">
				<div id="box"></div>
				
				<form id="forget_password"  onsubmit="return change_password();">
				<input type="hidden" name="table_type" value="<?=$user_type?>"/>
				<div class="form-group">                                    
                <div class="input-group">                  
                  <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                  <input type="password" name="old_password" class="form-control input-lg" placeholder="old password">
				  </div> 
					<span id="oldpass_error" style="color:red"></span>
              </div>
                  <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                  <input type="password" name="new_password" class="form-control input-lg" placeholder="New password">
                </div>
				<span id="newpass_error" style="color:red"></span>
              </div>              
              <div class="form-group">                
                <button type="submit" class="btn btn-custom"><i class="icofont icofont-paper-plane"></i> Update password </button> 
              </div> 
			  </form>
                </div>
              </div>                             
                
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	   function change_password()
{
	var old_password=$('input[name=old_password]').val();
    var new_password=$('input[name=new_password]').val();
	 var errorcount=0;
	if(old_password=='')
  {
    $('#oldpass_error').html('Please Enter Your old password');
    $('#oldpass_error').css('color','red');
    errorcount++;
  }else {
    $('#oldpass_error').html('');
  }
  if(new_password==''){
    $('#newpass_error').html('Please Enter Your new password');
    $('#newpass_error').css('color','red');
    errorcount++;
  }else {
    $('#newpass_error').html('');
  }
if(errorcount>0){
    return false;
  }else{
	  var form_data = {
		'table_type' : $('input[name=table_type]').val(),
		'old_password' : $('input[name=old_password]').val(),
		'new_password' : $('input[name=new_password]').val(),
	  }
	 
  $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "frontend/change_password",
        data:form_data,
        success : function(response) {		
         
       if (response.trim() == 'success') {         
          $('#box').html('<span style="color:green">Your Password changed Successfully</span>');
        }         
        if (response.trim() == 'failure') {
          $('#box').html('<span style="color:red">Your old password not matching</span>');
        }
      }
      });
	  
	  return false;
  }  
	
	  
}
</script>