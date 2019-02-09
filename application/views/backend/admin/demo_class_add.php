<hr />
<div class="row">
  <div class="col-md-12">
    
      <!------CONTROL TABS START------>
    <ul class="nav nav-tabs bordered">

      <li class="active">
              <a href="#list" data-toggle="tab"><i class="entypo-user"></i> 
          <?php echo 'Add';?>
                      </a></li>
    </ul>
      <!------CONTROL TABS END------>
        
  
    <div class="tab-content">
        <br>
          <!----EDITING FORM STARTS---->
      <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content">
          
                        <?php echo form_open(base_url() . 'admin/live_classes/demo_class/insert', array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

                        <div class="form-group">
                                <label class="col-sm-3 control-label">Demo Class ID</label>
                                <div class="col-sm-5">
                                    <input type="text"  class="form-control" name="class_id" value="" data-validate="required" data-message-required="<?php echo ' required';?>" required />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-3 control-label">Is Teacher</label>
                                <div class="col-sm-5">
                                    <input type="radio" id="teacher_check" name="isTeacher" value="1" data-validate="required" >Yes&nbsp; &nbsp;
									<input type="radio" id="student_check" name="isTeacher" value="0">No
                                </div>
                            </div>
							
						<div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Tutor</label>

                        <div class="col-sm-5">
                            <select name="user_id" id="tutor_status" class="form-control select2" data-validate="required"  data-message-required="<?php echo ucfirst('value_required');?>">
                              <option value=""><?php echo '--Select--';?></option>
                              <?php  foreach($tutor_data as $row){ ?>
                                    <option value="<?php echo $row->generated_id;?>"><?= $row->name.' ('.$row->generated_id.')';?></option>
                                <?php } ?>                                                      
                          </select>
                        </div>
                    </div>
                     


                    <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Student</label>
                        
                    <div class="col-sm-5">
                    <select name="user_id[]" id="student_status" class="form-control select2" multiple data-validate="required" data-message-required="<?php echo ucfirst('value_required');?>">
                                   
                        <?php  foreach($student_data as $row){ ?>
                                          <option value="<?php echo $row->generated_id;?>"><?= $row->name.' ('.$row->generated_id.')';?></option>
                                <?php } ?>  
                          </select>
                    </div> 
                  </div>
				  <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Subject</label>
                        
                    <div class="col-sm-5">
                    <select name="course" class="form-control select2" data-validate="required" data-message-required="<?php echo ucfirst('value_required');?>">
                                    <option value="">--Select--</option>
                                    
                        <?php  foreach($course_data as $row){ ?>
                                          <option value="<?php echo $row->subject;?>"><?= $row->subject;?></option>
                                <?php } ?>  
                          </select>
                    </div> 
                  </div>
				  <div class="form-group">
                                <label class="col-sm-3 control-label">Lession Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="lession" value="" data-validate="required" data-message-required="<?php echo ' required';?>"  required autofocus />
                                </div>
                            </div>
							
                  <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Fee per Hour';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control number" name="fee_hour" value="" data-validate="required" data-message-required="<?php echo ' required';?>"  required autofocus />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Requested Hour';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control number" name="requested_hour" value="" data-validate="required" data-message-required="<?php echo ' required';?>"  required autofocus />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'No.of Days';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control number" name="no_of_days" value=""  data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus />
                                </div>
                            </div>
                             
							
                       <!--     <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Class per Minute';?></label>
                                <div class="col-sm-5">
                                    <input type="text" id="class_per_mins1" class="form-control" name="mins_per_class" value="" data-validate="required" data-message-required="<?php echo ' required';?>" required readonly />
                                </div>
                            </div> 

                            
							
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Meeting Link';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="meeting_link" value="" data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus />
                                </div>
                            </div> -->
							
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                    <!--<a href="<?=base_url()?><?=$this->router->fetch_class().'/'.$this->router->fetch_method()?>/view" class="btn btn-white">Cancel</a>-->
                                  <button type="submit" class="btn btn-success"><?php echo 'Get Class Url';?></button>
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
<script>
		  $('#teacher_check').change(function(){
			if ($('#teacher_check').is(':checked') == true){
				$('#student_status').prop('disabled', true);
				$('#tutor_status').prop('disabled', false);
				console.log('checked');
			}	});

		  $('#student_check').change(function(){
			if ($('#student_check').is(':checked') == true){
				$('#student_status').prop('disabled', false);
				$('#tutor_status').prop('disabled', true);	
				console.log('checked');
			}
		});

		  </script>
<script>
	

      function get_to_time(i){
        
        var t = i.split(':');
        
        var option ='';
        
        for(k=++t[0];k<24;k++){
          if(t[1]=='00'){
            option += '<option>'+k+':00</option>';
            option += '<option>'+k+':30</option>';
            option += '<option>'+(++k)+':00</option>';
            break;
          }else{
            option += '<option>'+k+':30</option>';
            option += '<option>'+(++k)+':00</option>';
            option += '<option>'+k+':30</option>';
            break;
          }
          
        }
        $('#to_time1').html(option);
        get_mins();
      }

      function get_mins(){
       var ft = $('#from_time1').val();
       var tt = $('#to_time1').val();
        ft = ft.replace(':','');
        tt = tt.replace(':','');
        mins = tt-ft;
        if(mins == 100){
          hr=60;
        }
        else if(mins == 200){
          hr=120;
        }else{
          hr=90;
        }
        $('#class_per_mins1').val(hr);
      }
      $( "#first_date" ).change(function() {

         var fd = $('#first_date').val();


        $('#second_date').attr('min',fd);
        

       });

 


   </script> 
        


<br>

<!--password-->
