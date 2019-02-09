<?php 
$study_level		=	$this->Course_model->get_data('study_level');

?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					Edit
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'admin/course_page/course/insert', array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
							
							 <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Study Level';?></label>

                        <div class="col-sm-5">
                            <select name="study_level_id" id="study_level" class="form-control" value="" onchange="return get_level(this.value)" autofocus  required>
                              <option value=""><?php echo '--Select--';?></option>
                              <?php                                
                                foreach($study_level as $row):
                                    ?>
                                    <option value="<?php echo $row->id;?>">
                                        <?php echo $row->study_level;?>
                                    </option>
                                <?php endforeach; ?>                                                      
                          </select>
                        </div>
                    </div>
					
                         <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'From Level';?></label>

                        <div class="col-sm-5">
                            <select name="from_level_id" id="from_level"  class="form-control" value="" autofocus required>
                             <option>--Select First Study Level--</option>                                                                                    
                          </select>
                        </div>
                    </div>
					
					 <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'To Level';?></label>

                        <div class="col-sm-5">
                            <select name="to_level_id" id="to_level"  class="form-control" value="" autofocus required>
                             <option>--Select First Study Level--</option>                                                                                    
                          </select>
                        </div>
                    </div>


                            
                           <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Course';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="course" value="" data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus />
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
                                    <a href="<?=base_url()?><?=$this->router->fetch_class().'/'.$this->router->fetch_method()?>/view" class="btn btn-white">Cancel</a>
                                  <button type="submit" class="btn btn-success"><?php echo 'SAVE';?></button>
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
		$.ajax({			
            url: '<?php echo base_url();?>admin/course_page/get_from_level/' + study_level_id ,
            success: function(response)
            {                
                jQuery('#to_level').html(response);
				
            }
        });

    }
	</script>





