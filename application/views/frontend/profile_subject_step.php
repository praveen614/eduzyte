<style>
  label.error{
    color:red;
  }
  .redlink{
    color:red;
  }
</style>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>SUBJECTS YOU TEACH</h2>
  </div>
</section>

<section id="how-it-works-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="about-app mt-0 profsingle-widget">
          <div class="progress mtmb-20">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
            Page 2/5
          </div>
        </div>
		<?php if($this->session->flashdata('page_success')){?>
          <div class="alert alert-success alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_success');?>
          </div>
          <?php }?>
          <?php if($this->session->flashdata('page_error')){?>
          <div class="alert alert-danger alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_error');?>
          </div>
          <?php }?>
		  
			<?php if(isset($subjects_edit_data)){$form_id="tutor_subject_form_update";}else{$form_id="tutor_subject_form";}?>
          <form id="<?=$form_id?>" method="post" action="">
          <div class="row">
            <div class="col-md-7">
              <h4>Add  Subjects</h4><hr>
			  <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>" >
			  <input type="hidden" name="table_id" value="<?php if(isset($subjects_edit_data)){echo $subjects_edit_data->id;}?>" >
			  
            <div class="col-md-12">
               <label>Study Level <span class="txt_red">*</span></label>
              <div class="form-group">
                <select id="study_level" name="study_level_id" class="form-control input-lg teach" onchange="return get_level(this.value)">                  
                 <option value="">-- Select --</option>
				   <?php foreach($study_level as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($subjects_edit_data)){echo($subjects_edit_data->study_level_id == $row->id)?'selected':'' ;}else{ echo (set_value('study_level_id')== $row->id)?'selected':'' ;} ?> ><?=$row->study_level?></option>
               <?php } ?>
                </select>
              </div>
			   <span style="color:red; font-size: 12px;"><?php echo form_error('study_level_id');?></span>
            </div>
           
			 <div class="col-md-12">
                <div class="form-group optbtn">
                  <label>Level's <span class="txt_red">*</span></label>
                    <select id="level_get" name="from_level_id" class="form-control input-lg seexam" onchange="get_subject()" >
					             <?php if(isset($subjects_edit_data)){?>
              				<option value="<?=$subjects_edit_data->from_level_id;?>"><?=$this->Tutor_model->levels_id('from_level',$subjects_edit_data->from_level_id);?></option>
              				<?php }else{?>
              						<option>--Select First  Study Level--</option>
              				<?php } ?>
                    </select>
                </div>
				        <span style="color:red; font-size: 12px;"><?php echo form_error('subject_course_id');?></span>				
            </div>
			
			<div class="col-md-12">
                <div class="form-group optbtn">
                  <label>Subject (One at a time) <span class="txt_red">*</span></label>
                  <select id="basic4" name="subject_id" class="form-control input-lg seexam" >
				  <?php if(isset($subjects_edit_data)){?>
				<option value="<?=$subjects_edit_data->subject_id;?>"><?=$this->Tutor_model->get_subject_course($subjects_edit_data->subject_id);?></option>
				<?php }else{?>
						<option>--Select First level--</option>
				<?php }?>
                    </select>
                </div>
				<span style="color:red; font-size: 12px;"><?php echo form_error('subject_id');?></span>				
            </div>
			<div class="col-md-12">
            <label>Topics (optional)</label>
            <div class="form-group">
              <input type="text" name="topics" class="input-lg form-control" placeholder="topics" value="<?php if(isset($subjects_edit_data)){echo $subjects_edit_data->topics;}else{ echo set_value('topics'); }?>" >
            </div>
			 <span  style="color:red; font-size: 12px;"><?php echo form_error('topics');?></span>
          </div>
		  <?php  if(isset($subjects_edit_data)) { $display="none"	;}else{ $display="" ;}?>

                <p style="margin-bottom: 0px; display:<?=$display?>;"><a href="#addNewsubject" class="redlink" data-toggle="modal">If not in options in above, <b>Click Here</b></a></p>
			
			
			
			
            <div class="form-group">
              <button type="submit" style="display:<?=$display?>;" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> ADD MORE SUBJECTS</button> 
            </div>
            </div>

            <div class="col-md-5">
			<?php if(!empty($subjects_data)){?>
              <table class="table table-bordered table-striped table-hover addsub mt-20">
			   <?php foreach($subjects_data as $row){?>
                <tr>
                  <td><?=$this->Tutor_model->levels_id('from_level',$row->from_level_id);?> - <?=$this->Tutor_model->get_subject_course($row->subject_id);?><br>(<?=$this->Tutor_model->get_study_level($row->study_level_id);?>)
                  </td>
                  <td>
                    <a href="<?=base_url()?>tutor_subject_update/<?=$this->Tutor_model->get_subject_url($row->subject_id);?>" class="btn greenbtn btn-sm btn-success"><i class="fa fa-edit"></i> EDIT</a>
                    <a href="<?=base_url()?>tutor_subject_delete/<?=$row->id?>" class="btn btn-sm btn-danger res-mgt-5"><i class="fa fa-trash-o"></i> DELETE</a>
                  </td>
                </tr>
                <?php }?>
              </table>
            <?php }?>
            </div>
          </div><hr>
          <div class="row">
           <div class="col-md-12">
              <div class="form-group">
               
                <?php if(isset($subjects_edit_data)){?>
				<a href="javascript: history.go(-1)" class="btn pull-left" ><i class="icofont icofont-simple-left res-mt-10"></i> BACK</a>
                <button type="submit" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> Update</button>
				<?php }else{?>
				<a href="tutor_personal_information" class="btn pull-left" ><i class="icofont icofont-simple-left res-mt-10"></i> BACK</a>
				<?php if(!empty($subjects_data)){?>
				<a href="tutor_qualifications" class="btn pull-right ml-5 res-mt-10" > Go To Next Step  <i class="fa fa-chevron-right"></i></a>
                <?php } ?>
				<?php }?>
              </div>
            </div>
          </div>
</form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- app about area start -->



<!-- Modal -->
<div class="modal fade" id="addNewsubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add A New Subject</h4> <hr>
              <div class="row">
                  <form id="add_subject_form" method="post" action="<?=base_url()?>tutor/request_subject">
                
				<input type="hidden" name="tutor_id" value="<?=$this->session->userdata('user_id')?>" >
			  <div class="form-group">
                    <label><strong>Study Level</strong></label><br>                   
                <div class="input-group">
				<div class="input-group-addon"><i class="fa fa-sticky-note-o fa-lg"></i></div>
                   <select id="request_study_level" name="request_study_level_id" class="form-control input-lg teach" onchange="return get_level_request(this.value)">                  
                 <option value="">-- Select --</option>
				   <?php foreach($study_level as $row){?>
                <option value="<?=$row->id?>"><?=$row->study_level?></option>
               <?php } ?>
                </select>
                </div>				
              </div>
			  
			  <div class="form-group">
                    <label><strong>Level's</strong></label><br>                   
                <div class="input-group">
				<div class="input-group-addon"><i class="fa fa-sticky-note-o fa-lg"></i></div>
                  <select id="request_level_get" name="request_from_level_id" class="form-control input-lg seexam">					             
              						<option>--Select First  Study Level--</option>              				
                    </select>
                </div>                 
              </div>
			  
			  
                  <div class="form-group">
                    <label><strong>Subject Name</strong></label><br>                   
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-sticky-note-o fa-lg"></i></div>
                  <input type="text" name="request_subject" class="form-control input-lg" placeholder="Subject">
                </div>
                 <small class="text-danger text-center"><strong>Please add only one subject at a time.</strong></small>
              </div>    <hr> 
			  
              <div class="form-group text-center">                
                <button type="submit" class="btn"><i class="icofont icofont-paper-plane"></i> SAVE</button> 
                <button type="button" class="btn" data-dismiss="modal"><i class="icofont icofont-close"></i> CANCEL</button> 
              </div>
			   </form>
                </div>
               
              </div>                             
                
      </div>
    </div>
  </div>
</div>


<script>
$( document ).ready(function() {
  $('#basic2').selectpicker();
});
</script>
<script type="text/javascript">

    function get_level(study_level_id) {       

        $.ajax({
            url: '<?php echo base_url();?>tutor/get_from_level/' + study_level_id ,
            success: function(response)
            {                
                jQuery('#level_get').html(response);
				
            }
        });
	
    };
	function get_level_request(study_level_id) {       

        $.ajax({
            url: '<?php echo base_url();?>tutor/get_from_level/' + study_level_id ,
            success: function(response)
            {                
                jQuery('#request_level_get').html(response);
				
            }
        });
	
    };
    
  
	function get_course() {		
			var study_level_id=$("#study_level").val();
			var from_level=$("#level_get").val();
			var to_level=$("#level_get1").val();
			//jQuery('#basic2').html('');
        $.ajax({			
			type: 'POST',
			data: { study_level_id: study_level_id,from_level:from_level,to_level:to_level },
			
            url: '<?php echo base_url();?>tutor/get_course/',
            success: function(response)
            {          
                
                //alert(response);				
				jQuery('#basic3').html(response);				
				//$('#basic2').selectpicker('refresh');
				
            }
        });

    }
	function get_subject() {
			
			var course_id=$("#level_get").val();			
        $.ajax({			
			type: 'POST',
			data: { course_id:course_id },
			
            url: '<?php echo base_url();?>tutor/get_subject/',
            success: function(response)
            {   			
				jQuery('#basic4').html(response);				
				
				
            }
        });

    }
</script>



<script type="text/javascript">
$.validator.addMethod("check_levels", function(value, element) {
   return $('#level_get').val() < $('#level_get1').val()
}, "* From level should be small Than To level");

 // Setup form validation on the #register-form element
       $("#tutor_subject_form").validate ({
		   
             rules: {
               study_level_id: {
                   required: true                   
               },
               from_level_id:{ 
                  required:true
				  
               },
			   subject_id:{ 
                  required:true,
				  remote: {
                    url: "<?=base_url()?>tutor/check_subject",
                    type: "post"
                 }
               }
               
               },
			   messages: {
					subject_id: {												
						remote: "You already selected this Subject"
					}
				},
               
       });
       $("#tutor_subject_form_update").validate ({
		   
             rules: {
               study_level_id: {
                   required: true                   
               },
               from_level_id:{ 
                  required:true
				  
               },
			   subject_id:{ 
                  required:true			  
               }
               
               }
               
       });
       
       </script>
       
       <script type="text/javascript">

 // Setup form validation on the #register-form element
       $("#add_subject_form").validate ({
		   
             rules: {               
               request_study_level_id:{ 
                  required:true				  
               },
			    request_from_level_id:{ 
                  required:true				  
               },
			   request_subject:{ 
                  required:true				 
               }
               }
			    
               
       });
       
       </script>
			