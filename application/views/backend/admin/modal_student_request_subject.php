<?php 
	$where['id'] = $param2;
	$request=$this->Course_model->edit_operation('student_request_subject',$where);
	$study_level=$this->Course_model->get_data('study_level');

?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					Edit & Add Subject
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'admin/course_page/add_student_subject', array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

                        <div class="form-group">
						<input type="hidden" name="request_id" value="<?=$param2?>" />
                        <label for="field-2" class="col-sm-3 control-label">study level</label>

                        <div class="col-sm-5">
                            <select name="study_level_id" id="study_level" class="form-control" value="" onchange="return get_level(this.value)" autofocus >
                              <option value=""><?php echo '--Select--';?></option>
                              <?php                                
                                foreach($study_level as $row):
                                    ?>
                                    <option value="<?php echo $row->id;?>" <?php echo($request->study_level_id == $row->id)?'selected':'' ; ?>>
                                        <?php echo $row->study_level;?>
                                    </option>
                                <?php endforeach; ?>                                                      
                          </select>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">level's</label>
					<div class="col-sm-5">
                            <select name="from_level_id" id="from_level"  class="form-control" value="" autofocus required >
                             <option value="<?=$request->from_level_id;?>"><?=$this->Course_model->get_from_level($request->from_level_id);?></option>                                                                                    
                          </select>
                        </div>
                    </div>
                          
                           <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'subject';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="subject" value="<?=$request->subject?>" data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus />
                                </div>
                            </div>                                                     


                             <div class="form-group">
                            <label class="col-sm-3 control-label">Status *</label>
                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_active" value="1" data-validate="required" data-message-required="<?php echo 'required';?>" required ><span class="label label-success">Active</span>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_inactive" value="0" ><span class="label label-danger">Inactive</span>
                                </label>
                            </div>
                        </div>
                            
                            
                            

                           

                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">                                    
                                  <button type="submit" class="btn btn-success"><?php echo 'Add Subject';?></button>
                              </div>
                </div>
                        </form>
            </div>
        </div>
    </div>
</div>


<script>

    function get_level(study_level_id) {	
        $.ajax({			
            url: '<?php echo base_url();?>admin/course_page/get_from_level/' + study_level_id ,
            success: function(response)
            {      
			
                jQuery('#from_level').html(response);
				
            }
        });
    }
	</script>






