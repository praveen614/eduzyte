<hr />
<div class="row">
  <div class="col-md-12">
    
      <!------CONTROL TABS START------>
    <ul class="nav nav-tabs bordered">

      <li class="active">
              <a href="#list" data-toggle="tab"><i class="entypo-user"></i> 
          <?php echo 'Photo Edit';?>
                      </a></li>
    </ul>
      <!------CONTROL TABS END------>
        
  
    <div class="tab-content">
        <br>
          <!----EDITING FORM STARTS---->
      <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content">
                    
                    
          
                        <?php echo form_open(base_url() . 'admin/admin/demo_class/update/'.$data->id, array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>


                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Tutor</label>

                        <div class="col-sm-5">
                            <select name="tutor_id" class="form-control select2" data-validate="required" data-message-required="<?php echo ucfirst('value_required');?>">
                              <option value=""><?php echo '--Select--';?></option>
                              <?php  foreach($tutor_data as $row){ ?>
                                    <option value="<?php echo $row->id;?>" <?php if(isset($data)){echo($data->tutor_id == $row->id)?'selected':'' ;} ?>><?= $row->name.' ('.$row->generated_id.')';?></option>
                                <?php } ?>                                                      
                          </select>
                        </div>
                    </div>
                     


                    <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Student</label>
                        
                    <div class="col-sm-5">
                    <select name="student_id" class="form-control select2" data-validate="required" data-message-required="<?php echo ucfirst('value_required');?>">
                                    <option value=""><?php echo ucfirst('select');?></option>
                                    
                        <?php  foreach($student_data as $row){ ?>
                                          <option value="<?php echo $row->id;?>"<?php if(isset($data)){echo($data->student_id == $row->id)?'selected':'' ;} ?>><?= $row->name.' ('.$row->generated_id.')';?></option>
                                <?php } ?>  
                          </select>
                    </div> 
                  </div>
                  <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Fee per Hour';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control number" name="fee_hour" value="<?= $data->fee_hour?>" data-validate="required" data-message-required="<?php echo ' required';?>"  required autofocus />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Requested Hour';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control number" name="requested_hour" value="<?= $data->requested_hour?>" data-validate="required" data-message-required="<?php echo ' required';?>"  required autofocus />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'No.of Days';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control number" name="no_of_days" value="<?= $data->no_of_days?>"  data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus />
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Timings';?></label>
                                <div class="col-sm-5">
                                <div class="col-sm-6">
                                   <select id="from_time1" name="from_time" class="form-control" data-validate="required" data-message-required="<?php echo ucfirst('value_required');?>" onchange="get_to_time(this.value)">
                              <option value=""><?php echo 'From time';?></option>
                              <?php for($i=0;$i<22;$i++){?>
                                <option value="<?=$i;?>:00" <?php if(isset($data)){echo($data->from_time == $i.':00')?'selected':'' ;} ?>><?=$i;?>:00</option>
                        <option value="<?=$i;?>:30" <?php if(isset($data)){echo($data->from_time == $i.':30')?'selected':'' ;} ?>><?=$i;?>:30</option>
                          <?php } ?>                                                                              
                          </select>
                                </div>
                                <div class="col-sm-6">
                                   <select id="to_time1" name="to_time" class="form-control" data-validate="required" data-message-required="<?php echo ucfirst('value_required');?>" onchange="get_mins()">
                                    <?php if(isset($data)){?>                                   
                              <option value=""><?=$data->to_time ?></option>
                            <?php }?>                                                                          
                          </select>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Class per Minute';?></label>
                                <div class="col-sm-5">
                                    <input type="text" id="class_per_mins1" class="form-control" name="mins_per_class" value="<?=$data->mins_per_class?>" data-validate="required" data-message-required="<?php echo ' required';?>" required readonly />
                                </div>
                            </div> 

                            <div class="form-group">                              
                                <label class="col-sm-3 control-label"><?php echo 'Class Date';?></label>

                                <div class="col-sm-5">
                                  <div class="col-sm-6">
                                    <input type="Date" id="first_date" class="form-control" name="from_date" value="<?=$data->from_date?>" data-validate="required" data-message-required="<?php echo ' required';?>" required placeholder />
                                  </div>
                                <div class="col-sm-6">
                                    <input type="Date" id="second_date" class="form-control" name="to_date" value="<?=$data->to_date?>" data-validate="required" data-message-required="<?php echo ' required';?>" required placeholder />
                                </div>
                              </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Meeting Link';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="meeting_link" value="<?= $data->meeting_link?>" data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus />
                                </div>
                            </div>                    

                                           

                            
                                                        

                            <!--<div class="form-group">
                            <label class="col-sm-3 control-label">Status *</label>
                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_active" value="1" <?= (isset($data->status) && ($data->status == '1')) ? 'checked':''?> ><span class="label label-success">Active</span>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_inactive" value="0" <?= (isset($data->status) && ($data->status == '0')) ? 'checked':''?> ><span class="label label-danger">Inactive</span>
                                </label>
                            </div>
                        </div>-->
                            

                            
                             

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
