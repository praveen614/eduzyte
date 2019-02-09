<?php $study_level = $this->Home_model->get_data('study_level'); ?>
                  <div class="tutorsearchbox">
                    <div class="row">
					<form method="post" action="" id="sea">
                      <div class="col-md-2 col-sm-3 col-xs-12 nopadding">
                        <select id="study_level" name="study_level_id" class="form-control input-lg seexam" onchange="return get_level(this.value)" required>
                          <option value="">Study Level</option>
                          <?php foreach($study_level as $row){?>
                <option value="<?=$row->id?>"><?=$row->study_level?></option>
               <?php } ?>
                        </select>
                      </div>
                      <!--<div class="col-md-2 col-sm-3 col-xs-12 nopadding">
                          <select id="level_get" name="from_level" class="form-control input-lg seexam" required>
                            <option>From Level</option>
                            
                          </select>
                      </div>-->
                      <div class="col-md-2 col-sm-3 col-xs-12 nopadding">
                          <select id="level_get" name="to_level" class="form-control input-lg seexam" onchange="get_subject()" required>
                            <option>Level</option>
                            
                          </select>
                      </div>
                      <div class="col-md-2 col-sm-3 col-xs-12 nopadding">
                <div class="form-group optbtn">
                  <select id="course" name="course_id" class="form-control input-lg seexam" required>
                      <option value="">--Select Subject--</option>
                                       
                    </select>
                </div>
            </div>
                      <div class="col-md-2 col-sm-3 col-xs-12 nopadding">
                        <button type="button" id="submit"  class="item_filter btn"><i class="icofont icofont-search"></i> Search</button>
                      </div>
					  </form>
                    </div>
                  </div>

<script type="text/javascript">
	
	
	
	function get_level(study_level_id) {       

        $.ajax({
            url: '<?php echo base_url();?>frontend/get_from_level/' + study_level_id ,
            success: function(response)
            {     
				
                jQuery('#level_get').html(response);				
        
            }
        });
    };

    function get_subject() {
      
      var course_id=$("#level_get").val();      
        $.ajax({      
      type: 'POST',
      data: { course_id:course_id },
      
            url: '<?php echo base_url();?>frontend/get_subject/',
            success: function(response)
            {     
			
			jQuery('#course').html(response);       
        
        
            }
        });

    }

   /* function get_level(study_level_id) {       
	
        $.ajax({
            url: '<?php echo base_url();?>frontend/get_from_level/' + study_level_id ,
            success: function(response)
            {                
                jQuery('#level_get').html(response);
				
            }
        });
		
		$.ajax({
            url: '<?php echo base_url();?>frontend/get_to_level/' + study_level_id ,
            success: function(response)
            {   
				jQuery('#level_get1').html(response);
            }
        });

    }
	function get_course() {		
			var study_level_id=$("#study_level").val();
			var from_level=$("#level_get").val();
			var to_level=$("#level_get1").val();
			
        $.ajax({			
			type: 'POST',
			data: { study_level_id: study_level_id,from_level:from_level,to_level:to_level },
			
            url: '<?php echo base_url();?>frontend/get_course/',
            success: function(response)
            {          
               jQuery('#course').html(response);
				
            }
        });

    }*/
</script>	