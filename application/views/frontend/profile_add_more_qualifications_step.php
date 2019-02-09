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
    <h2>EDUCATIONAL QUALIFICATIONS</h2>
  </div>
</section>

<section id="how-it-works-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="about-app mt-0 single-widget">
          <div class="progress mtmb-20">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
            Page 3/5
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
		  <?php if(isset($degree_edit_data)){$form_id="tutor_qualification_form_update";}else{$form_id="tutor_qualification_form";}?>
         <form id="<?=$form_id?>" method="post" action="">
           <div class="row">
             <div class="col-md-7">
			 <input type="hidden" name="table_id" value="<?php if(isset($degree_edit_data)){echo $degree_edit_data->id;}?>" > 
			 <input type="hidden" name="tutor_id" value="<?=$this->session->userdata('user_id')?>" > 
          <div class="col-md-12">
            <label>Institution name with city <span class="txt_red">*</span></label>
            <div class="form-group">
              <input type="text" name="institution" class="form-control input-lg" placeholder="Institution name with city" value="<?php if(isset($degree_edit_data)){echo $degree_edit_data->institution;}else{ echo set_value('institution');}?>" >
            </div>
				 <span style="color:red; font-size: 12px;"><?php echo form_error('institution');?></span>
          </div>
          <div class="col-md-12">
            <label>Degree Name</label>
            <div class="form-group">
              <select name="degree_id" class="form-control input-lg seexam">
                <option value="">-Select Degree-</option>
                 <?php foreach($degree as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($degree_edit_data)){echo ($degree_edit_data->degree_id == $row->id)?'selected':'' ;}else{ echo (set_value('degree_id') == $row->id)?'selected':'' ;}?> ><?=$row->degree?></option>
               <?php } ?>   
              </select>
            </div> 
				<span  style="color:red; font-size: 12px;"><?php echo form_error('degree_id');?></span>			         
          </div> 

          <div class="col-md-12">
            <label>Specialization <span class="txt_red">*</span></label>
            <div class="form-group">
              <input type="text" name="specialization" class="input-lg form-control" placeholder="Specialization" value="<?php if(isset($degree_edit_data)){echo $degree_edit_data->specialization;}else{ echo set_value('specialization'); }?>" >
            </div>
			 <span  style="color:red; font-size: 12px;"><?php echo form_error('specialization');?></span>
          </div>
		  <?php  if(isset($degree_edit_data)) { $display="none"	;}else{ $display="" ;}?>
             <p style="margin-bottom: 0px; display:<?=$display?>"><a href="#addNewdegree" class="redlink" data-toggle="modal">If not in options in above, <b>Click Here</b></a></p> <br> 
          
          <div class="form-group">
		  <button type="submit" style="display:<?=$display?>" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> ADD MORE QUALIFICATION</button>
              
            </div>
             </div>
             <div class="col-md-5">
               <div class="row">
             <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
			<?php if(!empty($degree_data)){?>
              <table class="table table-bordered table-striped table-hover addsub">
			   <?php foreach($degree_data as $row){?>
                <tr>
                  <td><?=$this->Tutor_model->get_degree($row->degree_id);?>,<br> <?=$row->specialization?></td>
                  <td>
                    <a href="<?=base_url()?>tutor_degree_update/<?=$this->Tutor_model->get_degree_url($row->degree_id);?>" class="greenbtn btn btn-sm btn-success"><i class="fa fa-edit"></i> EDIT</a>
                    <a href="<?=base_url()?>tutor_degree_delete/<?=$row->id?>" class="btn btn-sm btn-danger res-mgt-5"><i class="fa fa-trash-o"></i> DELETE</a>
                  </td>
                </tr>
                <?php }?>
              </table>
			  <?php }?>
            </div>
          </div>
             </div>
           </div> 
             </div>
           </div><hr>
           <div class="row">
              <div class="col-md-12">
            <div class="form-group">              
			   <?php if(isset($degree_edit_data)){?>
			   <a href="javascript: history.go(-1)" class="btn pull-left res-mt-10" ><i class="icofont icofont-simple-left"></i> BACK</a>
                <button type="submit" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> Update</button>
				<?php }else{?>
				<a href="tutor_subject" class="btn pull-left res-mt-10" ><i class="icofont icofont-simple-left"></i> BACK</a>
				<?php if(!empty($degree_data)){?>
        <a href="tutor_teaching" class="btn pull-right ml-5 res-mt-10" > Go To Next Step  <i class="fa fa-chevron-right"></i></a>
				<?php }?>
        
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

<div class="modal fade" id="addNewdegree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add A New Degree</h4> <hr>
              <div class="row">
			  <form id="tutor_request_form" method="post" action="<?=base_url()?>tutor/request_degree">
                <div class="col-md-12">
				<input type="hidden" name="tutor_id1" value="<?=$this->session->userdata('user_id')?>" >
				<div class="form-group">
                    <label><strong>Institution name with city</strong></label><br>                   
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-sticky-note-o fa-lg"></i></div>
                  <input type="text" name="institution1" class="form-control input-lg" placeholder="Institution name with city">
                </div>                 
              </div>
			  <div class="form-group">
                    <label><strong>Specialization</strong></label><br>                   
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-sticky-note-o fa-lg"></i></div>
                  <input type="text" name="specialization1" class="form-control input-lg" placeholder="Specialization">
                </div>                 
              </div>
                  <div class="form-group">
                    <label><strong>Degree Name</strong></label><br>                   
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-sticky-note-o fa-lg"></i></div>
                  <input type="text" name="degree_id1" class="form-control input-lg" placeholder="Degree">
                </div>
                 <small class="text-danger text-center"><strong>Please add only one Degree at a time.</strong></small>
              </div>    <hr>          
              <div class="form-group text-center">                
                <button type="submit" class="btn"><i class="icofont icofont-paper-plane"></i> SAVE</button> 
                <button type="submit" class="btn" data-dismiss="modal"><i class="icofont icofont-close"></i> CANCEL</button> 
              </div> 
                </div>
				</form>
              </div>                             
                
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

 // Setup form validation on the #register-form element
       $("#tutor_qualification_form").validate ({
		   
             rules: {
               institution: {
                   required: true,                   
               },
               degree_id:{ 
                  required:true,
				  remote: {
                    url: "<?=base_url()?>tutor/check_degree1",
                    type: "post"
                 }
				  
               },               
			   specialization:{ 
                  required:true,
               }
               
               },
				messages: {
					degree_id: {												
						remote: "You already selected this Qualification"
					}
				},
			  
               
       });
	   $("#tutor_qualification_form_update").validate ({
		   
             rules: {
               institution: {
                   required: true,                   
               },
               degree_id:{ 
                  required:true,			  
				  
               },               
			   specialization:{ 
                  required:true,
               }
               
               }
			  
               
       });
	   
	   $("#tutor_request_form").validate ({
		   
             rules: {
               institution1: {
                   required: true                   
               },
               degree_id1:{ 
                  required:true
               },               
			   specialization1:{ 
                  required:true
               }
               
               }
               
       });
       
       </script>