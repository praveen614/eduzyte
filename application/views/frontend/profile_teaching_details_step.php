<style>
  label.error{
    color:red;
  }
</style>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>TEACHING DETAILS</h2>
  </div>
</section>

<section id="how-it-works-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="about-app mt-0 single-widget">
          <div class="progress mtmb-20">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
            Page 4/5
          </div>
        </div>
		<?php if($this->session->flashdata('form_error')){?>
          <div class="alert alert-danger alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('form_error');?>
          </div>
          <?php }?>
		<?php if($this->session->flashdata('page_success')){?>
          <div class="alert alert-success alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_success');?>
          </div>
          <?php }?>
        
         <form id="tutor_teaching_form" method="post" action="">
		 <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>" >
          <div class="col-md-6">
            <label>Teaching Expertise <span class="txt_red">*</span></label>
            <div class="form-group">
              <input type="text" class="form-control input-lg" value="<?php if(isset($teaching_data)){echo $teaching_data->teaching_expertise ;} ?>" name="teaching_expertise" placeholder="Teaching Expertise" required>
            </div>            
          </div> 
          <div class="col-md-6">
            <label>Medium Of Instruction <span class="txt_red">*</span></label>
            <div class="form-group">
              <select name="medium_id" class="form-control input-lg seexam">
                <option value="">-Select-</option>
					<?php foreach($medium as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($teaching_data)){echo($teaching_data->medium_id == $row->id)?'selected':'' ;} ?> ><?=$row->medium?></option>
               <?php } ?>                
              </select>
            </div> 
            <p><a href="#addMedium" class="blulink" data-toggle="modal">If not in options in above, <b>Click Here</b></a></p>           
          </div>
          <div class="col-md-6">
                <label>Total Teaching Experience (offline+online, in Years) <span class="txt_red">*</span></label>
                <div class="form-group">
                  <input type="number" name="total_experience" value="<?php if(isset($teaching_data)){echo $teaching_data->total_experience ;} ?>" class="form-control input-lg mx150" required min="1" max="50" placeholder="0">
                </div>
              </div>
              <div class="col-md-6">
                <label>Online Teaching Experience (In Years) <span class="txt_red">*</span></label>
                <div class="form-group">
                  <input type="number" name="online_experience" value="<?php if(isset($teaching_data)){echo $teaching_data->online_experience ;} ?>" class="form-control input-lg mx150" required min="1" max="50" placeholder="0">
                </div>
              </div>
          <div class="col-md-3">
            <label>Do you have a digital Pen? <span class="txt_red">*</span></label> <br>
            <div class="form-group">
              <input type="radio" name="digital_pen_status" value="yes" <?php if(isset($teaching_data)){echo ($teaching_data->digital_pen_status == 'yes') ? 'checked':'';}?> data-toggle="modal" data-target="#digitalModal"> Yes
              <input type="radio" name="digital_pen_status" value="no" <?php if(isset($teaching_data)){echo ($teaching_data->digital_pen_status == 'no') ? 'checked':'';}?> > No
            </div>
          </div>
          <div class="col-md-3">
            <label>Do you have a digital Slate? <span class="txt_red">*</span></label> <br>
            <div class="form-group">
              <input type="radio" name="digital_slate_status" value="yes" <?php if(isset($teaching_data)){echo ($teaching_data->digital_slate_status == 'yes') ? 'checked':'';}?>> Yes
              <input type="radio" name="digital_slate_status"  value="no" <?php if(isset($teaching_data)){echo ($teaching_data->digital_slate_status == 'no') ? 'checked':'';}?>> No
            </div>
          </div>
          <div class="col-md-6">
            <label>Are you currently a full time teacher employed by a School/College <span class="txt_red">*</span></label> <br>
            <div class="form-group">
              <input type="radio" name="full_time_teacher" value="yes" <?php if(isset($teaching_data)){echo ($teaching_data->full_time_teacher == 'yes') ? 'checked':'';}?>> Yes
              <input type="radio" name="full_time_teacher" value="no" <?php if(isset($teaching_data)){echo ($teaching_data->full_time_teacher == 'no') ? 'checked':'';}?>> No
            </div>
          </div>
		  <div class="clearfix"></div>
          <div class="col-md-6">
            <label>Opportunities you are interested in <span class="txt_red">*</span></label> <br>
            <div class="form-group">
              <select name="opportunities" class="form-control input-lg seexam">
                <option value="Full time"<?php if(isset($teaching_data)){echo($teaching_data->opportunities == 'Full time')?'selected':'' ;} ?>>Full Time</option>                 
                <option value="Part time"<?php if(isset($teaching_data)){echo($teaching_data->opportunities == 'Part time')?'selected':'' ;} ?>>Part Time</option>
                <option value="Both"<?php if(isset($teaching_data)){echo($teaching_data->opportunities == 'Both')?'selected':'' ;} ?>>Both (Full Time & Part Time)</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <label>Expecting hourly Pricing <span class="txt_red">*</span></label>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">$</div>
                <input type="text" id="usd" name="hourly_price" value="<?php if(isset($teaching_data)){echo $teaching_data->hourly_price ;} ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-lg" onchange="return get_rupee(this.value)">
              </div>
			  <div class="input-group">
                <div class="input-group-addon">₹</div>
                <input type="text" id="inr" name="hourly_price_inr" value="<?php if(isset($teaching_data)){echo $teaching_data->hourly_price_inr;} ?>" class="form-control input-lg" readonly>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12">
            <label>Teaching Approach <span class="txt_red">*</span></label>
            <div class="form-group">
              <textarea name="teaching_approach" rows="5" cols="10" class="form-control" placeholder="Description should be 100 minimum words"><?php if(isset($teaching_data)){echo $teaching_data->teaching_approach ;} ?></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <input type="checkbox" name="not_shared" value="1" <?php if(isset($teaching_data)){echo ($teaching_data->not_shared == '1') ? 'checked':'';}?>> I have not shared any contact details (Email, Phone, Skype, Website etc)
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <a href="tutor_qualifications" class="btn pull-left" ><i class="icofont icofont-simple-left"></i> BACK</a>

              
			   <?php if(isset($teaching_data)){?>
			   <button type="submit" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> UPDATE</button>
			   <a href="tutor_time_slot" class="btn pull-right ml-5 res-mt-10" > Go To Next Step  <i class="fa fa-chevron-right"></i></a>
			   <?php }else{?>
				<button type="submit" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> SAVE</button>
			   <?php }?>

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
<div class="modal fade bs-example-modal-lg" id="digitalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">PEN TABLET/GRAPHIC TABLET</h4> <hr>
              <div class="row">
                <div class="col-md-6">
                  <h4>What is a pen tablet/graphic tablet?</h4>
                  <p>A pen tablet/graphic tablet is a device that allows users to write/draw on computer screen without using a mouse or keyboard. It has a USB connection, that allows users to connect it to their computer.</p>
                  <h4>How it works?</h4>
                  <p>It allows users to write or draw images/ graphics similar to the way a person writes or draws with a pencil/pen on paper.</p>
                  <h4>Why is it required?</h4>
                  <p>Tutors can write on white board in virtual classroom in their own handwriting using pen/graphic tablet. It saves time make sessions more interactive.</p>
                </div>
                <div class="col-md-6">
                  <img src="<?=base_url()?>front_assets/img/digitaltablet.jpg" alt="" class="img-responsive">
                </div>
              </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn" data-dismiss="modal">CLOSE</button> 
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addMedium" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Medium Of Instruction</h4> <hr>
              <div class="row">
                <div class="col-md-12">
				<form id="add_medium_form" method="post" action="<?=base_url()?>tutor/request_medium">
				<input type="hidden" name="tutor_id1" value="<?=$this->session->userdata('user_id')?>" >
                  <div class="form-group">
                    <label><strong>Medium Name</strong></label><br>                   
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-sticky-note-o fa-lg"></i></div>
                  <input type="text" name="medium" class="form-control input-lg" placeholder="Add Medium">
                </div>
                 <small class="text-danger text-center"><strong>Please add only one Medium at a time.</strong></small>
              </div>    <hr>          
              <div class="form-group text-center">                
                <button type="submit" class="btn"><i class="icofont icofont-paper-plane"></i> SAVE</button> 
                <button type="submit" class="btn" data-dismiss="modal"><i class="icofont icofont-close"></i> CANCEL</button> 
              </div> 
			  </form>
                </div>
              </div>                             
                
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
   $('[data-toggle="tooltip"]').tooltip()
})

function get_rupee(usd) {
	        $.ajax({
            url: '<?php echo base_url();?>tutor/converter/' + usd ,
            success: function(response)
            {
				jQuery('#inr').val(response);
				
            }
        });
	
    };
</script>

<script type="text/javascript">

 // Setup form validation on the #register-form element
       $("#tutor_teaching_form").validate ({
		   
             rules: {
               teaching_expertise: {
                   required: true                   
               },
               medium_id:{ 
                  required:true
               },
               total_experience:{ 
                  required:true
               },
			   online_experience:{ 
                  required:true
               },
			   digital_pen_status:{ 
                  required:true
               },
			   digital_slate_status:{ 
                  required:true
               },
			   full_time_teacher:{ 
                  required:true
               },
			   opportunities:{ 
                  required:true				  
               },
			   hourly_price:{ 
                  required:true
               },
			   teaching_approach:{ 
                  required:true,
				  minlength: 100
               },
			   not_shared:{ 
                  required:true
               }
               
               },
			   messages: {
               teaching_approach: {
                   minlength: "Description should be 100 minimum words"
               }
             }, 
               
       });
       
       </script>
	   <script type="text/javascript">

 // Setup form validation on the #register-form element
       $("#add_medium_form").validate ({
		   
             rules: {               
               medium:{ 
                  required:true
               }
               }          
               
               
       });
       
       </script>