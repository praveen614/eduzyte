<style>
  label.error{
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
    <h2>TUITION TIMINGS</h2>
  </div>
</section>
<section id="how-it-works-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="about-app mt-0 single-widget">
          <div class="progress mtmb-20">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 83%">
            Page 5/5
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
          <?php if($this->session->flashdata('page_error')){?>
          <div class="alert alert-danger alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_error');?>
          </div>
          <?php }?>
         <form id="tutor_timeslot_form" method="post" action="">
         <div class="col-md-12 mb-20">
     <div class="row">
	 <input type="hidden" name="tutor_id" value="<?=$this->session->userdata('user_id')?>" > 
       <div class="col-md-7">
           <div class="timeset1">
             <div class="form-group">
               <label for=""><strong>Timezone </strong> <span>*</span></label> <br>
                (Enter correct time zone - it is important for scheduling of your classes.)
                <select name="time_zone" class="form-control input-lg seexam select2">
					<option value="28"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 28)?'selected':'' ;} ?>>(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
					<option value="30"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 30)?'selected':'' ;} ?>>(GMT) Monrovia, Reykjavik</option>
					<option value="72"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 72)?'selected':'' ;} ?>>(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
					<option value="53"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 53)?'selected':'' ;} ?>>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
					<option value="14"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 14)?'selected':'' ;} ?>>(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
					<option value="71"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 71)?'selected':'' ;} ?>>(GMT+01:00) West Central Africa</option>
					<option value="83"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 83)?'selected':'' ;} ?>>(GMT+02:00) Amman</option>
					<option value="84"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 84)?'selected':'' ;} ?>>(GMT+02:00) Beirut</option>
					<option value="24"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 24)?'selected':'' ;} ?>>(GMT+02:00) Cairo</option>
					<option value="61"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 61)?'selected':'' ;} ?>>(GMT+02:00) Harare, Pretoria</option>
					<option value="27"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 27)?'selected':'' ;} ?>>(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
					<option value="35"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 35)?'selected':'' ;} ?>>(GMT+02:00) Jerusalem</option>
					<option value="21"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 21)?'selected':'' ;} ?>>(GMT+02:00) Minsk</option>
					<option value="86"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 86)?'selected':'' ;} ?>>(GMT+02:00) Windhoek</option>
					<option value="31"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 31)?'selected':'' ;} ?>>(GMT+03:00) Athens, Istanbul, Minsk</option>
					<option value="2"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 2)?'selected':'' ;} ?>>(GMT+03:00) Baghdad</option>
					<option value="49"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 49)?'selected':'' ;} ?>>(GMT+03:00) Kuwait, Riyadh</option>
					<option value="54"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 54)?'selected':'' ;} ?>>(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
					<option value="19"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 19)?'selected':'' ;} ?>>(GMT+03:00) Nairobi</option>
					<option value="87"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 87)?'selected':'' ;} ?>>(GMT+03:00) Tbilisi</option>
					<option value="34"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 34)?'selected':'' ;} ?>>(GMT+03:30) Tehran</option>
					<option value="1"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 1)?'selected':'' ;} ?>>(GMT+04:00) Abu Dhabi, Muscat</option>
					<option value="88"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 88)?'selected':'' ;} ?>>(GMT+04:00) Baku</option>
					<option value="9"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 9)?'selected':'' ;} ?>>(GMT+04:00) Baku, Tbilisi, Yerevan</option>
					<option value="89"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 89)?'selected':'' ;} ?>>(GMT+04:00) Port Louis</option>
					<option value="47"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 47)?'selected':'' ;} ?>>(GMT+04:30) Kabul</option>
					<option value="25"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 25)?'selected':'' ;} ?>>(GMT+05:00) Ekaterinburg</option>
					<option value="90"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 90)?'selected':'' ;} ?>>(GMT+05:00) Islamabad, Karachi</option>
					<option value="73"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 73)?'selected':'' ;} ?>>(GMT+05:00) Islamabad, Karachi, Tashkent</option>
					<option value="33"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 33)?'selected':'' ;} ?>>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
					<option value="62"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 62)?'selected':'' ;} ?>>(GMT+05:30) Sri Jayawardenepura</option>
					<option value="91"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 91)?'selected':'' ;} ?>>(GMT+05:45) Kathmandu</option>
					<option value="42"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 42)?'selected':'' ;} ?>>(GMT+06:00) Almaty, Novosibirsk</option>
					<option value="12"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 12)?'selected':'' ;} ?>>(GMT+06:00) Astana, Dhaka</option>
					<option value="41"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 41)?'selected':'' ;} ?>>(GMT+06:30) Rangoon</option>
					<option value="59"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 59)?'selected':'' ;} ?>>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
					<option value="50"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 50)?'selected':'' ;} ?>>(GMT+07:00) Krasnoyarsk</option>
					<option value="17"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 17)?'selected':'' ;} ?>>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
					<option value="46"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 46)?'selected':'' ;} ?>>(GMT+08:00) Irkutsk, Ulaan Bataar</option>
					<option value="60"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 60)?'selected':'' ;} ?>>(GMT+08:00) Kuala Lumpur, Singapore</option>
					<option value="70"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 70)?'selected':'' ;} ?>>(GMT+08:00) Perth</option>
					<option value="63"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 63)?'selected':'' ;} ?>>(GMT+08:00) Taipei</option>
					<option value="65"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 65)?'selected':'' ;} ?>>(GMT+09:00) Osaka, Sapporo, Tokyo</option>
					<option value="77"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 77)?'selected':'' ;} ?>>(GMT+09:00) Seoul</option>
					<option value="75"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 75)?'selected':'' ;} ?>>(GMT+09:00) Yakutsk</option>
					<option value="10"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 10)?'selected':'' ;} ?>>(GMT+09:30) Adelaide</option>
					<option value="4"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 4)?'selected':'' ;} ?>>(GMT+09:30) Darwin</option>
					<option value="20"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 20)?'selected':'' ;} ?>>(GMT+10:00) Brisbane</option>
					<option value="5"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 5)?'selected':'' ;} ?>>(GMT+10:00) Canberra, Melbourne, Sydney</option>
					<option value="74"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 74)?'selected':'' ;} ?>>(GMT+10:00) Guam, Port Moresby</option>
					<option value="64"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 64)?'selected':'' ;} ?>>(GMT+10:00) Hobart</option>
					<option value="69"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 69)?'selected':'' ;} ?>>(GMT+10:00) Vladivostok</option>
					<option value="15"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 15)?'selected':'' ;} ?>>(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
					<option value="44"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 44)?'selected':'' ;} ?>>(GMT+12:00) Auckland, Wellington</option>
					<option value="26"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 26)?'selected':'' ;} ?>>(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
					<option value="6"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 6)?'selected':'' ;} ?>>(GMT-01:00) Azores</option>
					<option value="8"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 8)?'selected':'' ;} ?>>(GMT-01:00) Cape Verde Is.</option>
					<option value="39"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 39)?'selected':'' ;} ?>>(GMT-02:00) Mid-Atlantic</option>
					<option value="22"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 22)?'selected':'' ;} ?>>(GMT-03:00) Brasilia</option>
					<option value="94"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 94)?'selected':'' ;} ?>>(GMT-03:00) Buenos Aires</option>
					<option value="55"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 55)?'selected':'' ;} ?>>(GMT-03:00) Buenos Aires, Georgetown</option>
					<option value="29"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 29)?'selected':'' ;} ?>>(GMT-03:00) Greenland</option>
					<option value="95"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 95)?'selected':'' ;} ?>>(GMT-03:00) Montevideo</option>
					<option value="45"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 45)?'selected':'' ;} ?>>(GMT-03:30) Newfoundland</option>
					<option value="3"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 3)?'selected':'' ;} ?>>(GMT-04:00) Atlantic Time (Canada)</option>
					<option value="57"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 57)?'selected':'' ;} ?>>(GMT-04:00) Georgetown, La Paz, San Juan</option>
					<option value="96"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 96)?'selected':'' ;} ?>>(GMT-04:00) Manaus</option>
					<option value="51"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 51)?'selected':'' ;} ?>>(GMT-04:00) Santiago</option>
					<option value="76"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 76)?'selected':'' ;} ?>>(GMT-04:30) Caracas</option>
					<option value="56"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 56)?'selected':'' ;} ?>>(GMT-05:00) Bogota, Lima, Quito</option>
					<option value="23"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 23)?'selected':'' ;} ?>>(GMT-05:00) Eastern Time (US & Canada)</option>
					<option value="67"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 67)?'selected':'' ;} ?>>(GMT-05:00) Indiana (East)</option>
					<option value="11"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 11)?'selected':'' ;} ?>>(GMT-06:00) Central America</option>
					<option value="16"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 16)?'selected':'' ;} ?>>(GMT-06:00) Central Time (US & Canada)</option>
					<option value="37"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 37)?'selected':'' ;} ?>>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
					<option value="7"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 7)?'selected':'' ;} ?>>(GMT-06:00) Saskatchewan</option>
					<option value="68"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 68)?'selected':'' ;} ?>>(GMT-07:00) Arizona</option>
					<option value="38"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 38)?'selected':'' ;} ?>>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
					<option value="40"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 40)?'selected':'' ;} ?>>(GMT-07:00) Mountain Time (US & Canada)</option>
					<option value="52"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 52)?'selected':'' ;} ?>>(GMT-08:00) Pacific Time (US & Canada)</option>
					<option value="104"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 104)?'selected':'' ;} ?>>(GMT-08:00) Tijuana, Baja California</option>
					<option value="48"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 48)?'selected':'' ;} ?>>(GMT-09:00) Alaska</option>
					<option value="32"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 32)?'selected':'' ;} ?>>(GMT-10:00) Hawaii</option>
					<option value="58"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 58)?'selected':'' ;} ?>>(GMT-11:00) Midway Island, Samoa</option>
					<option value="18"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 18)?'selected':'' ;} ?>>(GMT-12:00) International Date Line West</option>
					<option value="105"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 105)?'selected':'' ;} ?>>(GMT-4:00) Eastern Daylight Time (US & Canada)</option>
					<option value="13"<?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->time_zone == 13)?'selected':'' ;} ?>>GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>



					</select>
            </div>
           </div>
            <div class="form-group">
              <label for="">Day <span class="txt_red">*</span></label>
              <select name="week" class="form-control input-lg seexam">
                <option value="">-Select-</option>
				<?php foreach($days as $row){?>
                <option value="<?=$row->id?>" <?php if(isset($timeslot_edit_data)){echo($timeslot_edit_data->week == $row->id)?'selected':'' ;} ?>><?=$row->title?> - <?=$row->days?></option>
                <?php }?>
              </select>
              
            </div> 
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">From Time <span class="txt_red">*</span></label>
                <select name="" class="form-control input-lg" onchange="get_to_time(this.value)">
                    <option value="">-- Select --</option>
					<script>
					
					for(i=1;i<arr.length;i++){
					s='';
					<?php if(isset($timeslot_edit_data)){ ?>
					if('<?=$timeslot_edit_data->from_time?>' == arr[i]){
					s='selected';
					}
					<?php } ?>
					document.write('<option value="'+i+'" '+s+'>'+arr[i]+'</option>');
					}
					</script>
					
                  </select>
				  
				  <input type='hidden' id='from_time' name='from_time' value='<?php if(isset($timeslot_edit_data)){echo $timeslot_edit_data->from_time;} ?>'>
				  
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">To Time <span class="txt_red">*</span></label>
                <select name="to_time" class="form-control input-lg" id='to_time'>
                    <?php if(isset($timeslot_edit_data)){ ?>
						<script>
						function arraySearch(arr,val) {
							for (var t=0; t<arr.length; t++)
								if (arr[t] === val)                    
									return t;
							return false;
						  }
						  z = arraySearch(arr,'<?=$timeslot_edit_data->to_time;?>');
						  for(i=z;i<arr.length;i++){
							document.write('<option value="'+arr[i]+'">'+arr[i]+'</option>');
							}
						</script>
					<?php } ?>
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
               <!-- <label for="">Period <span class="txt_red">*</span></label>
                <select class="form-control input-lg">
                    <option>-Select-</option>
                    <option>AM</option>
                    <option>PM</option>
                  </select>-->
              </div>
            
            </div>
            <!--<a href="#" class="mb-10 blutxt pull-right"><i class="fa fa-plus-circle"></i> Add Timings</a>-->
          </div>
		  <?php  if(isset($timeslot_edit_data)) { $display="none"	;}else{ $display="" ;}?>
		   <div class="form-group">
              <button type="submit" style="display:<?=$display?>" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> ADD MORE TIMINGS</button> 
            </div>
  </div>
 
  <div class="col-md-5">
               <div class="row">
             <div class="col-md-12">
               <!--<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> Tuition Timings added
          </div>-->
          <div class="row">
            <div class="col-md-12">
			<?php if(!empty($timeslot_data)){?>
              <table class="table table-bordered table-striped table-hover addsub">
			  <?php foreach($timeslot_data as $row){?>
                <tr>
				
                  <td><?=$this->db->where('id',$row->week)->get('days_list')->row()->title?> <br> <?=$this->db->where('id',$row->week)->get('days_list')->row()->days?> <br>
                  <?=$row->from_time?> to <?=$row->to_time?></td>
                  <td>
                    <a href="<?=base_url()?>tutor_timeslot_update/<?=$row->id?>" class="greenbtn btn btn-sm btn-success"><i class="fa fa-edit"></i> EDIT</a>
                    <a href="<?=base_url()?>tutor_timeslot_delete/<?=$row->id?>" class="btn btn-sm btn-danger res-mgt-5"><i class="fa fa-trash-o"></i> DELETE</a>
                  </td>
                </tr>
				<?php } ?> 
              </table>
			<?php } ?> 
            </div>
          </div>
             </div>
           </div>         
  </div>
</div>
 


<div class="modal fade bs-example-modal-sm" id="exTimes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Timings Notice</h4> <hr>
              <div class="row">
                <div class="col-md-12">
                 Timings can be selected one hour at a time only ( Eg: 05:00 to 06:00 PM).
If you need to teach for multiple timings then click on ADD TIMINGS
                </div>
              </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn" data-dismiss="modal">OK</button> 
      </div>
    </div>
  </div>
</div>
         </div>

         <div class="col-md-12">
            <div class="form-group">              
			  <?php if(isset($timeslot_edit_data)){?>
			  <a href="javascript: history.go(-1)" class="btn pull-left" ><i class="icofont icofont-simple-left"></i> BACK</a>
                <button type="submit" class="btn pull-right res-mt-10"><i class="icofont icofont-save"></i> Update</button>
				<?php }else{?>
				<a href="tutor_teaching" class="btn pull-left" ><i class="icofont icofont-simple-left"></i> BACK</a>
				<?php if(!empty($timeslot_data)){?>
              <a href="tutor_final_step" class="btn pull-right ml-5 res-mt-10" > Go To Next Step  <i class="fa fa-chevron-right"></i></a>
				<?php } ?>
              
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
<script src="<?=base_url()?>front_assets/js/timezones.full.js"></script>
<script>
    $('.timeset select').timezones();
  $(function () {
   $('[data-toggle="tooltip"]').tooltip()
})
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
			</script>
			
			<script type="text/javascript">

 // Setup form validation on the #register-form element
       $("#tutor_timeslot_form").validate ({
		   
             rules: {
               time_zone: {
                   required: true                   
               },               
               week:{ 
                  required:true
               },
			   from_time:{ 
                  required:true
               },
			   to_time:{ 
                  required:true
               }
               }
               
       });

       </script>

