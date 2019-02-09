<hr />
<div class="row">
  <div class="col-md-12">
    
      <!------CONTROL TABS START------>
    <ul class="nav nav-tabs bordered">

      <li class="active">
              <a href="#list" data-toggle="tab"><i class="entypo-user"></i> 
          <?php echo 'Edit';?>
                      </a></li>
    </ul>
      <!------CONTROL TABS END------>
        
  
    <div class="tab-content">
        <br>
          <!----EDITING FORM STARTS---->
      <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content">
                    
                    
          
                        <?php echo form_open(base_url() . 'admin/course_page/course/update/'.$data->id, array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

                        
							
							 <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Study Level';?></label>

                        <div class="col-sm-5">
                            <select name="study_level_id" id="study_level" class="form-control" value="" onchange="return get_level(this.value)" autofocus >
                              
                              <?php                                
                                foreach($study_level as $row):
                                    ?>
                                    <option value="<?php echo $row->id;?>" <?php if(isset($data)){echo($data->study_level_id == $row->id)?'selected':'' ;} ?>> <?php echo $row->study_level;?> </option>
                                <?php endforeach; ?>                                                      
                          </select>
                        </div>
                    </div>
					
                         <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'From Level';?></label>

                        <div class="col-sm-5">
                            <select name="from_level_id" id="from_level"  class="form-control" value="" autofocus >
                             <option value="<?=$data->from_level_id;?>"><?=$this->Course_model->get_from_level($data->from_level_id);?></option>                                                                                   
                          </select>
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'To Level';?></label>

                        <div class="col-sm-5">
                            <select name="to_level_id" id="to_level"  class="form-control" value="" autofocus >
                             <option value="<?=$data->to_level_id;?>"><?=$this->Course_model->get_from_level($data->to_level_id);?></option>                                                                                    
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Course';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="course" value="<?= $data->course?>" data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus />
                                </div>
                            </div>                         

                            
                                                        

                            <div class="form-group">
                            <label class="col-sm-3 control-label">Status *</label>
                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_active" value="1" <?= (isset($data->status) && ($data->status == '1')) ? 'checked':''?> ><span class="label label-success">Active</span>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_inactive" value="0" <?= (isset($data->status) && ($data->status == '0')) ? 'checked':''?> ><span class="label label-danger">Inactive</span>
                                </label>
                            </div>
                        </div>
                            

                            
                             

                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                <a href="<?=base_url()?><?=$this->router->fetch_class().'/'.$this->router->fetch_method()?>/view" class="btn btn-white">Cancel</a>
                                  <button type="submit" class="btn btn-info"><?php echo 'Update';?></button>
                              </div>
                </div>
                        </form>
            
                </div>
      </div>
            <!----EDITING FORM ENDS-->
            
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

    
        

<br>

<!--password-->

<script>

    function get_level(study_level_id) {	
        $.ajax({			
            url: '<?php echo base_url();?>admin/course_page/get_from_level/' + study_level_id ,
            success: function(response)
            {                
                jQuery('#from_level').html(response);
				
            }
        });
		$.ajax({			
            url: '<?php echo base_url();?>admin/course_page/get_from_level/' + study_level_id ,
            success: function(response)
            {                
                jQuery('#to_level').html(response);
				
            }
        });

    }
	</script>
