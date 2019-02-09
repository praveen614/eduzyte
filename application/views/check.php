<?php
	
	echo "hai";
/*
<div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Study Level';?></label>

                        <div class="col-sm-5">
                            <select name="study_level_id" id="study_level_id" class="form-control" value="" autofocus data-validate="required" data-message-required="<?php echo ' required';?>" required >
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
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Level Heading';?></label>

                        <div class="col-sm-5">
                            <select name="level_heading_id" id="level_heading_id" class="form-control" value="" onchange="return get_level_id(this.value)" data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus >
                              <option value=""><?php echo '--Select--';?></option>
                              <?php                                
                                foreach($level_heading as $row):
                                    ?>
                                    <option value="<?php echo $row->id;?>">
                                        <?php echo $row->level_heading;?>
                                    </option>
                                <?php endforeach; ?>                                                      
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Lower Levels';?></label>

                        <div class="col-sm-5">
                            <select name="levels_id" id="levels_id" class="form-control" value="" autofocus data-validate="required" data-message-required="<?php echo ' required';?>" required >
                              
                      <option value=""><?php echo '--Select  First Level Heading--';?></option>                                                      
                          </select>
                        </div>
                    </div>


                    <script>
       function get_level_id(level_heading_id) {
        //alert(level_heading_id);

        $.ajax({
            url: '<?php echo base_url();?>admin/course_page/get_level_id/' + level_heading_id ,
            success: function(response)
            {
                
                jQuery('#levels_id').html(response);
            }
        });

    }
	
	
	
	
	<div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Study Level';?></label>

                        <div class="col-sm-5">
                            <select name="study_level_id" id="study_level_id" class="form-control"  value=""  >
                              
                              <?php                                
                                foreach($study_level as $row):
                                    ?>
                                    <option value="<?php echo $row->id;?>" <?=($data->study_level_id == $row->id)?'selected':''?> >
                                        <?php echo $row->study_level;?>
                                    </option>
                                <?php endforeach; ?>                                                      
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Level Heading';?></label>

                        <div class="col-sm-5">
                            <select name="level_heading_id" id="level_heading_id" onchange="return get_level_id(this.value)" class="form-control"  value=""  >
                              
                              <?php                                
                                foreach($level_heading as $row):
                                    ?>
                                    <option value="<?php echo $row->id;?>" <?=($data->level_heading_id == $row->id)?'selected':''?> >
                                        <?php echo $row->level_heading;?>
                                    </option>
                                <?php endforeach; ?>                                                      
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Lower Levels';?></label>

                        <div class="col-sm-5">
                            <select name="levels_id" id="levels_id" class="form-control"  value=""  >
                              <option value="<?= $data->levels_id?>" >
                                        <?= $this->db->get_where('levels',array('id'=>$data->levels_id))->row()->levels; ?>
                                    </option>                                                                                  
                          </select>
                        </div>
                    </div>

     </script>
*/
?>