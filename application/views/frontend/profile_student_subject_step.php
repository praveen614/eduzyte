<style>
  label.error{
    color:red;
  }
  .redlink{
    color:red;
  }
</style>
<script>
	var arr = new Array();
j=1;
for(i=1;i<=24;i++){
if(i==24){
arr[j++] = i+':00';
}else{
arr[j++] = i+':00';
arr[j++] = i+':30';
}
}
</script>

<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>REQUIRED SUBJECTS WITH TIMINGS</h2>
  </div>
</section>
<section id="how-it-works-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="about-app mt-0 profsingle-widget">
          <div class="progress mtmb-20">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
            Page 2/3
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
          <?php if(isset($subjects_edit_data)){$form_id="student_subject_form_update";}else{$form_id="student_subject_form";}?>
          <form method="post" id="<?=$form_id?>" action="">
          <div class="row">
            <div class="col-md-7">
              <h4>Required  Subjects And Timings</h4><hr>
              <div class="col-md-12 timeset1">
              <div class="form-group">
               <label for=""><strong>Timezone </strong> <span class="txt_red">*</span></label> <br>
                (Enter correct time zone - it is important for scheduling of your classes.)
                <select name="time_zone" class="form-control input-lg seexam select2">
					<option value="28"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 28)?'selected':'' ;} ?>>(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
					<option value="30"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 30)?'selected':'' ;} ?>>(GMT) Monrovia, Reykjavik</option>
					<option value="72"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 72)?'selected':'' ;} ?>>(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
					<option value="53"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 53)?'selected':'' ;} ?>>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
					<option value="14"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 14)?'selected':'' ;} ?>>(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
					<option value="71"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 71)?'selected':'' ;} ?>>(GMT+01:00) West Central Africa</option>
					<option value="83"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 83)?'selected':'' ;} ?>>(GMT+02:00) Amman</option>
					<option value="84"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 84)?'selected':'' ;} ?>>(GMT+02:00) Beirut</option>
					<option value="24"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 24)?'selected':'' ;} ?>>(GMT+02:00) Cairo</option>
					<option value="61"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 61)?'selected':'' ;} ?>>(GMT+02:00) Harare, Pretoria</option>
					<option value="27"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 27)?'selected':'' ;} ?>>(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
					<option value="35"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 35)?'selected':'' ;} ?>>(GMT+02:00) Jerusalem</option>
					<option value="21"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 21)?'selected':'' ;} ?>>(GMT+02:00) Minsk</option>
					<option value="86"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 86)?'selected':'' ;} ?>>(GMT+02:00) Windhoek</option>
					<option value="31"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 31)?'selected':'' ;} ?>>(GMT+03:00) Athens, Istanbul, Minsk</option>
					<option value="2"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 2)?'selected':'' ;} ?>>(GMT+03:00) Baghdad</option>
					<option value="49"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 49)?'selected':'' ;} ?>>(GMT+03:00) Kuwait, Riyadh</option>
					<option value="54"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 54)?'selected':'' ;} ?>>(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
					<option value="19"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 19)?'selected':'' ;} ?>>(GMT+03:00) Nairobi</option>
					<option value="87"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 87)?'selected':'' ;} ?>>(GMT+03:00) Tbilisi</option>
					<option value="34"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 34)?'selected':'' ;} ?>>(GMT+03:30) Tehran</option>
					<option value="1"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 1)?'selected':'' ;} ?>>(GMT+04:00) Abu Dhabi, Muscat</option>
					<option value="88"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 88)?'selected':'' ;} ?>>(GMT+04:00) Baku</option>
					<option value="9"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 9)?'selected':'' ;} ?>>(GMT+04:00) Baku, Tbilisi, Yerevan</option>
					<option value="89"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 89)?'selected':'' ;} ?>>(GMT+04:00) Port Louis</option>
					<option value="47"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 47)?'selected':'' ;} ?>>(GMT+04:30) Kabul</option>
					<option value="25"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 25)?'selected':'' ;} ?>>(GMT+05:00) Ekaterinburg</option>
					<option value="90"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 90)?'selected':'' ;} ?>>(GMT+05:00) Islamabad, Karachi</option>
					<option value="73"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 73)?'selected':'' ;} ?>>(GMT+05:00) Islamabad, Karachi, Tashkent</option>
					<option value="33"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 33)?'selected':'' ;} ?>>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
					<option value="62"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 62)?'selected':'' ;} ?>>(GMT+05:30) Sri Jayawardenepura</option>
					<option value="91"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 91)?'selected':'' ;} ?>>(GMT+05:45) Kathmandu</option>
					<option value="42"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 42)?'selected':'' ;} ?>>(GMT+06:00) Almaty, Novosibirsk</option>
					<option value="12"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 12)?'selected':'' ;} ?>>(GMT+06:00) Astana, Dhaka</option>
					<option value="41"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 41)?'selected':'' ;} ?>>(GMT+06:30) Rangoon</option>
					<option value="59"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 59)?'selected':'' ;} ?>>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
					<option value="50"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 50)?'selected':'' ;} ?>>(GMT+07:00) Krasnoyarsk</option>
					<option value="17"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 17)?'selected':'' ;} ?>>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
					<option value="46"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 46)?'selected':'' ;} ?>>(GMT+08:00) Irkutsk, Ulaan Bataar</option>
					<option value="60"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 60)?'selected':'' ;} ?>>(GMT+08:00) Kuala Lumpur, Singapore</option>
					<option value="70"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 70)?'selected':'' ;} ?>>(GMT+08:00) Perth</option>
					<option value="63"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 63)?'selected':'' ;} ?>>(GMT+08:00) Taipei</option>
					<option value="65"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 65)?'selected':'' ;} ?>>(GMT+09:00) Osaka, Sapporo, Tokyo</option>
					<option value="77"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 77)?'selected':'' ;} ?>>(GMT+09:00) Seoul</option>
					<option value="75"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 75)?'selected':'' ;} ?>>(GMT+09:00) Yakutsk</option>
					<option value="10"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 10)?'selected':'' ;} ?>>(GMT+09:30) Adelaide</option>
					<option value="4"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 4)?'selected':'' ;} ?>>(GMT+09:30) Darwin</option>
					<option value="20"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 20)?'selected':'' ;} ?>>(GMT+10:00) Brisbane</option>
					<option value="5"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 5)?'selected':'' ;} ?>>(GMT+10:00) Canberra, Melbourne, Sydney</option>
					<option value="74"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 74)?'selected':'' ;} ?>>(GMT+10:00) Guam, Port Moresby</option>
					<option value="64"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 64)?'selected':'' ;} ?>>(GMT+10:00) Hobart</option>
					<option value="69"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 69)?'selected':'' ;} ?>>(GMT+10:00) Vladivostok</option>
					<option value="15"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 15)?'selected':'' ;} ?>>(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
					<option value="44"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 44)?'selected':'' ;} ?>>(GMT+12:00) Auckland, Wellington</option>
					<option value="26"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 26)?'selected':'' ;} ?>>(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
					<option value="6"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 6)?'selected':'' ;} ?>>(GMT-01:00) Azores</option>
					<option value="8"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 8)?'selected':'' ;} ?>>(GMT-01:00) Cape Verde Is.</option>
					<option value="39"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 39)?'selected':'' ;} ?>>(GMT-02:00) Mid-Atlantic</option>
					<option value="22"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 22)?'selected':'' ;} ?>>(GMT-03:00) Brasilia</option>
					<option value="94"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 94)?'selected':'' ;} ?>>(GMT-03:00) Buenos Aires</option>
					<option value="55"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 55)?'selected':'' ;} ?>>(GMT-03:00) Buenos Aires, Georgetown</option>
					<option value="29"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 29)?'selected':'' ;} ?>>(GMT-03:00) Greenland</option>
					<option value="95"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 95)?'selected':'' ;} ?>>(GMT-03:00) Montevideo</option>
					<option value="45"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 45)?'selected':'' ;} ?>>(GMT-03:30) Newfoundland</option>
					<option value="3"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 3)?'selected':'' ;} ?>>(GMT-04:00) Atlantic Time (Canada)</option>
					<option value="57"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 57)?'selected':'' ;} ?>>(GMT-04:00) Georgetown, La Paz, San Juan</option>
					<option value="96"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 96)?'selected':'' ;} ?>>(GMT-04:00) Manaus</option>
					<option value="51"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 51)?'selected':'' ;} ?>>(GMT-04:00) Santiago</option>
					<option value="76"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 76)?'selected':'' ;} ?>>(GMT-04:30) Caracas</option>
					<option value="56"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 56)?'selected':'' ;} ?>>(GMT-05:00) Bogota, Lima, Quito</option>
					<option value="23"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 23)?'selected':'' ;} ?>>(GMT-05:00) Eastern Time (US & Canada)</option>
					<option value="67"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 67)?'selected':'' ;} ?>>(GMT-05:00) Indiana (East)</option>
					<option value="11"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 11)?'selected':'' ;} ?>>(GMT-06:00) Central America</option>
					<option value="16"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 16)?'selected':'' ;} ?>>(GMT-06:00) Central Time (US & Canada)</option>
					<option value="37"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 37)?'selected':'' ;} ?>>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
					<option value="7"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 7)?'selected':'' ;} ?>>(GMT-06:00) Saskatchewan</option>
					<option value="68"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 68)?'selected':'' ;} ?>>(GMT-07:00) Arizona</option>
					<option value="38"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 38)?'selected':'' ;} ?>>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
					<option value="40"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 40)?'selected':'' ;} ?>>(GMT-07:00) Mountain Time (US & Canada)</option>
					<option value="52"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 52)?'selected':'' ;} ?>>(GMT-08:00) Pacific Time (US & Canada)</option>
					<option value="104"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 104)?'selected':'' ;} ?>>(GMT-08:00) Tijuana, Baja California</option>
					<option value="48"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 48)?'selected':'' ;} ?>>(GMT-09:00) Alaska</option>
					<option value="32"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 32)?'selected':'' ;} ?>>(GMT-10:00) Hawaii</option>
					<option value="58"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 58)?'selected':'' ;} ?>>(GMT-11:00) Midway Island, Samoa</option>
					<option value="18"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 18)?'selected':'' ;} ?>>(GMT-12:00) International Date Line West</option>
					<option value="105"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 105)?'selected':'' ;} ?>>(GMT-4:00) Eastern Daylight Time (US & Canada)</option>
					<option value="13"<?php if(isset($subjects_edit_data)){echo($subjects_edit_data->time_zone == 13)?'selected':'' ;} ?>>GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>

				</select>
            </div>
            </div>
            
			 <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>" >
			 <input type="hidden" name="table_id" value="<?php if(isset($subjects_edit_data)){echo $subjects_edit_data->id;}?>" >
			<div class="row">
			<div class="col-md-6">
               <label>From <span class="txt_red">*</span></label>
              <div class="form-group">
                <select name="" class="form-control input-lg" onchange="get_to_time(this.value)">
                    <option value="">-- Select --</option>
					<script>
					
					for(i=1;i<arr.length;i++){
					s='';
					<?php if(isset($subjects_edit_data)){ ?>
					if('<?=$subjects_edit_data->from_time?>' == arr[i]){
					s='selected';
					}
					<?php } ?>
					document.write('<option value="'+i+'" '+s+'>'+arr[i]+'</option>');
					}
					</script>
					
                  </select>
              </div>
			  <input type='hidden' id='from_time' name='from_time' value='<?php if(isset($subjects_edit_data)){echo $subjects_edit_data->from_time;} ?>'>
            </div>
			<div class="col-md-6">
               <label>To <span class="txt_red">*</span></label>
              <div class="form-group">
                <select name="to_time" class="form-control input-lg" id='to_time'>
                    <?php if(isset($subjects_edit_data)){ ?>
						<script>
						function arraySearch(arr,val) {
							for (var t=0; t<arr.length; t++)
								if (arr[t] === val)                    
									return t;
							return false;
						  }
						  z = arraySearch(arr,'<?=$subjects_edit_data->to_time;?>');
						  for(i=z;i<arr.length;i++){
							document.write('<option value="'+arr[i]+'">'+arr[i]+'</option>');
							}
						</script>
					<?php } ?>
                  </select>
              </div>
            </div>
			</div>
			
            <div class="col-md-12">
               <label>Study Level <span class="txt_red">*</span></label>
              <div class="form-group">
                <select name="study_level_id" id="study_level" class="form-control input-lg teach" onchange="return get_level(this.value)">
                  <option value="">-- Select --</option>
				   <?php foreach($study_level as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($subjects_edit_data)){echo($subjects_edit_data->study_level_id == $row->id)?'selected':'' ;} ?> ><?=$row->study_level?></option>
               <?php } ?>
                 
                </select>
              </div>
			  <span style="color:red; font-size: 12px;"><?php echo form_error('study_level_id');?></span>
            </div>
			
			<div class="col-md-12">
                <div>
                  <label>Level's <span class="txt_red">*</span></label>
                  <select id="level_get" name="from_level_id" class="form-control input-lg seexam" onchange="get_subject()" >
						<?php if(isset($subjects_edit_data)){?>
						<option value="<?php if(isset($subjects_edit_data)){echo $subjects_edit_data->from_level_id;} ?>"><?php if(isset($subjects_edit_data)){ echo $this->load->Student_model->levels_id('from_level',$subjects_edit_data->from_level_id);} ?></option>
						<?php }else{?>
						<option>--Select First  study level--</option>
				<?php } ?>              
					</select>
                </div>
					<span style="color:red; font-size: 12px;"><?php echo form_error('from_level_id');?></span>				
			</div>
			
			<div class="col-md-12">
                <div class="form-group optbtn">
                  <label>Subject (One at a time) <span class="txt_red">*</span></label>
                  <select id="basic4" name="subject_id" class="form-control input-lg seexam" >
				  <?php if(isset($subjects_edit_data)){?>
				<option value="<?=$subjects_edit_data->subject_id;?>"><?=$this->Student_model->get_subject_course($subjects_edit_data->subject_id);?></option>
				<?php }else{?>
						<option>--Select First Courses--</option>
				<?php }?>
                    </select>
                </div>
				<span style="color:red; font-size: 12px;"><?php echo form_error('subject_id');?></span>
				
				<?php  if(isset($subjects_edit_data)) { $display="none"	;}else{ $display="" ;}?>

                <p style="margin-bottom: 0px; display:<?=$display?>;"><a href="#addNewsubject" class="redlink" data-toggle="modal">If not in options in above, <b>Click Here</b></a></p>
            </div>
			
			

			
           <!-- <div class="col-md-12">
                <div class="form-group optbtn">
                  <label>Subject / Course (One at a time) <span class="txt_red">*</span></label>
                  <select id="basic2"  class="show-tick form-control" >
                      <option value="">--Select--<option>                    	       
                    </select>
                </div>
				<?php  if(isset($subjects_edit_data)) { $display="none"	;}else{ $display="" ;}?>
                <p style="margin-bottom: 5px; display:<?=$display?>;"><a href="#addNewsubject" class="redlink" data-toggle="modal">If not in options in above, <b>Click Here</b></a></p>
				
			</div>-->
            <div class="form-group">
			
             <!-- <button style="display:<?=$display?>;" type="button" class="btn pull-right mb-20 small-btn" data-toggle="modal" data-target="#addSubmsg"><i class="icofont icofont-plus-circle"></i> ADD SUBJECT</button>-->
				<button type="submit" style="display:<?=$display?>;" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> ADD MORE SUBJECTS</button>
		   </div>
            </div>
            <div class="col-md-5">
			<?php if(!empty($subjects_data)){?>
			
              <table class="table table-bordered table-striped table-hover addsub mt-20">
			  <?php foreach($subjects_data as $row){?>
                <tr>
                  <td><?=$this->Student_model->levels_id('from_level',$row->from_level_id);?> - <?=$this->Student_model->get_subject_course($row->subject_id);?> (<?=$this->Student_model->get_study_level($row->study_level_id);?>) <br>
                   <?=$row->from_time?> - <?=$row->to_time?>
                  </td>
                  <td>
                    <a href="<?=base_url()?>student_subject_update/<?=$this->Student_model->get_subject_url($row->subject_id);?>" class="btn greenbtn btn-sm btn-success"><i class="fa fa-edit"></i> EDIT</a>
                    <a href="<?=base_url()?>student_subject_delete/<?=$row->id?>" class="btn btn-sm btn-danger res-mgt-5"><i class="fa fa-trash-o"></i> DELETE</a>
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
				<a href="<?=base_url()?>student_personal_information" class="btn pull-left" ><i class="icofont icofont-simple-left res-mt-10"></i> BACK</a>
				<?php if(!empty($subjects_data)){?>
					<a href="<?=base_url()?>student_final_step" class="btn pull-right ml-5 res-mt-10" > Go To Next Step  <i class="fa fa-chevron-right"></i></a>
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

<script src="<?=base_url()?>front_assets/js/timezones.full.js"></script>
			<script>
			  $('.timeset select').timezones();
			
			/*$('#basic2').selectpicker({
			liveSearch: true,
			maxOptions: 1
			});*/
			
			</script>


<!-- Modal -->
<div class="modal fade" id="addNewsubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add A New Subject</h4> <hr>
		
              <div class="row">
                  <form id="student_request_subject" method="post" action="<?=base_url()?>student/request_subject">
                
                <input type="hidden" name="student_id" value="<?=$this->session->userdata('user_id')?>" >
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

<div class="modal fade" id="addSubmsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Subject</h4> <hr>
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">More than one subjects required more than one tutors <br> depents on your requirement. If you agree</p>   
              <hr>          
              <div class="form-group text-center">                
                <button type="submit" id="modal_submit"  class="btn"><i class="icofont icofont-paper-plane"></i> OK</button> 
                <button type="submit" class="btn" data-dismiss="modal"><i class="icofont icofont-close"></i> CANCEL</button> 
              </div> 
                </div>
              </div>                             
                
      </div>
    </div>
  </div>
</div>

<script>
			function get_level(study_level_id) {       

        $.ajax({
            url: '<?php echo base_url();?>student/get_from_level/' + study_level_id ,
            success: function(response)
            {                
                jQuery('#level_get').html(response);
				
            }
        });
		};
		
		function get_level_request(study_level_id) {       
			
        $.ajax({
            url: '<?php echo base_url();?>student/get_from_level/' + study_level_id ,
            success: function(response)
            {                
                jQuery('#request_level_get').html(response);
				
            }
        });
	
    };
	
    
	function get_subject() {
			
			var course_id=$("#level_get").val();			
        $.ajax({			
			type: 'POST',
			data: { course_id:course_id },
			
            url: '<?php echo base_url();?>student/get_subject/',
            success: function(response)
            {   			
				jQuery('#basic4').html(response);				
				
				
            }
        });

    }
</script>
			</script>

<script>

			function get_to_time(k){
			
				option = '';
				$('#from_time').val(arr[k]);
				for(i=++k;i<arr.length;i++){
					option +='<option value="'+arr[i]+'">'+arr[i]+'</option>';
					}
				
				$('#to_time').html(option);
			}
			
		/*	function get_course() {		
			var study_level_id=$("#study_level").val();			
			
        $.ajax({			
			type: 'POST',
			data: { study_level_id: study_level_id},
			
            url: '<?php echo base_url();?>student/get_course/',
            success: function(response)
            {                
                alert(response);
				jQuery('#basic3').html(response);
					
            }
        });

    } */
	
	/*$('#modal_submit').click(function(){
			alert('hau');
			$("#student_subject_form").validate ({
		   
             rules: {
               time_zone: {
                   required: true                   
               },
               study_level_id:{ 
                  required:true
               },
               subject_course_id:{ 
                  required:true
               },
			   from_time:{ 
                  required:true
               }
               }
               
       });
			
    $("#student_subject_form").submit();
	
});*/
			</script>

<script type="text/javascript">

 // Setup form validation on the #register-form element
       $("#student_subject_form").validate ({
		   
             rules: {
               time_zone: {
                   required: true                   
               },
			   from_time:{ 
                  required:true
               },
               study_level_id:{ 
                  required:true
               },
               from_level_id:{ 
                  required:true
               },			   
			   subject_id:{ 
                  required:true,
				  remote: {
                    url: "<?=base_url()?>student/check_subject",
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
	   $("#student_subject_form_update").validate ({
		   
             rules: {
               time_zone: {
                   required: true                   
               },
               from_time:{ 
                  required:true
				  
               },
               study_level_id:{ 
                  required:true,				  
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
       $("#student_request_subject").validate ({
		   
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
 

