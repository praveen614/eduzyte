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
          
                        <?php echo form_open(base_url() . 'admin/live_classes/create_main_class_id', array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

                        <div class="form-group">
                                <label class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-5">
                                    <input type="text"  class="form-control" name="title" value="" data-validate="required" data-message-required="<?php echo ' required';?>" required />
                                </div>
                            </div> 
						
						<div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Time Zone</label>
                        <div class="col-sm-5">
                            <select name="timezone" class="form-control select2" data-validate="required" data-message-required="<?php echo ucfirst('value_required');?>">
                              <option value="28">(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
							<option value="30">(GMT) Monrovia, Reykjavik</option>
							<option value="72">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
							<option value="53">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
							<option value="14">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
							<option value="71">(GMT+01:00) West Central Africa</option>
							<option value="83">(GMT+02:00) Amman</option>
							<option value="84">(GMT+02:00) Beirut</option>
							<option value="24">(GMT+02:00) Cairo</option>
							<option value="61">(GMT+02:00) Harare, Pretoria</option>
							<option value="27">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
							<option value="35">(GMT+02:00) Jerusalem</option>
							<option value="21">(GMT+02:00) Minsk</option>
							<option value="86">(GMT+02:00) Windhoek</option>
							<option value="31">(GMT+03:00) Athens, Istanbul, Minsk</option>
							<option value="2">(GMT+03:00) Baghdad</option>
							<option value="49">(GMT+03:00) Kuwait, Riyadh</option>
							<option value="54">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
							<option value="19">(GMT+03:00) Nairobi</option>
							<option value="87">(GMT+03:00) Tbilisi</option>
							<option value="34">(GMT+03:30) Tehran</option>
							<option value="1">(GMT+04:00) Abu Dhabi, Muscat</option>
							<option value="88">(GMT+04:00) Baku</option>
							<option value="9">(GMT+04:00) Baku, Tbilisi, Yerevan</option>
							<option value="89">(GMT+04:00) Port Louis</option>
							<option value="47">(GMT+04:30) Kabul</option>
							<option value="25">(GMT+05:00) Ekaterinburg</option>
							<option value="90">(GMT+05:00) Islamabad, Karachi</option>
							<option value="73">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
							<option value="33">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
							<option value="62">(GMT+05:30) Sri Jayawardenepura</option>
							<option value="91">(GMT+05:45) Kathmandu</option>
							<option value="42">(GMT+06:00) Almaty, Novosibirsk</option>
							<option value="12">(GMT+06:00) Astana, Dhaka</option>
							<option value="41">(GMT+06:30) Rangoon</option>
							<option value="59">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
							<option value="50">(GMT+07:00) Krasnoyarsk</option>
							<option value="17">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
							<option value="46">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
							<option value="60">(GMT+08:00) Kuala Lumpur, Singapore</option>
							<option value="70">(GMT+08:00) Perth</option>
							<option value="63">(GMT+08:00) Taipei</option>
							<option value="65">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
							<option value="77">(GMT+09:00) Seoul</option>
							<option value="75">(GMT+09:00) Yakutsk</option>
							<option value="10">(GMT+09:30) Adelaide</option>
							<option value="4">(GMT+09:30) Darwin</option>
							<option value="20">(GMT+10:00) Brisbane</option>
							<option value="5">(GMT+10:00) Canberra, Melbourne, Sydney</option>
							<option value="74">(GMT+10:00) Guam, Port Moresby</option>
							<option value="64">(GMT+10:00) Hobart</option>
							<option value="69">(GMT+10:00) Vladivostok</option>
							<option value="15">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
							<option value="44">(GMT+12:00) Auckland, Wellington</option>
							<option value="26">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
							<option value="6">(GMT-01:00) Azores</option>
							<option value="8">(GMT-01:00) Cape Verde Is.</option>
							<option value="39">(GMT-02:00) Mid-Atlantic</option>
							<option value="22">(GMT-03:00) Brasilia</option>
							<option value="94">(GMT-03:00) Buenos Aires</option>
							<option value="55">(GMT-03:00) Buenos Aires, Georgetown</option>
							<option value="29">(GMT-03:00) Greenland</option>
							<option value="95">(GMT-03:00) Montevideo</option>
							<option value="45">(GMT-03:30) Newfoundland</option>
							<option value="3">(GMT-04:00) Atlantic Time (Canada)</option>
							<option value="57">(GMT-04:00) Georgetown, La Paz, San Juan</option>
							<option value="96">(GMT-04:00) Manaus</option>
							<option value="51">(GMT-04:00) Santiago</option>
							<option value="76">(GMT-04:30) Caracas</option>
							<option value="56">(GMT-05:00) Bogota, Lima, Quito</option>
							<option value="23">(GMT-05:00) Eastern Time (US & Canada)</option>
							<option value="67">(GMT-05:00) Indiana (East)</option>
							<option value="11">(GMT-06:00) Central America</option>
							<option value="16">(GMT-06:00) Central Time (US & Canada)</option>
							<option value="37">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
							<option value="7">(GMT-06:00) Saskatchewan</option>
							<option value="68">(GMT-07:00) Arizona</option>
							<option value="38">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
							<option value="40">(GMT-07:00) Mountain Time (US & Canada)</option>
							<option value="52">(GMT-08:00) Pacific Time (US & Canada)</option>
							<option value="104">(GMT-08:00) Tijuana, Baja California</option>
							<option value="48">(GMT-09:00) Alaska</option>
							<option value="32">(GMT-10:00) Hawaii</option>
							<option value="58">(GMT-11:00) Midway Island, Samoa</option>
							<option value="18">(GMT-12:00) International Date Line West</option>
							<option value="105">(GMT-4:00) Eastern Daylight Time (US & Canada)</option>
							<option value="13">GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>                                                                                
                          </select>
                        </div>
                    </div>
					<div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Timings';?></label>
                                <div class="col-sm-5">
                                <div class="col-sm-6">
                                   <input type="text" class="form-control" name="from_time" placeholder="09:30AM" value="" data-validate="required" data-message-required="<?php echo ' required';?>"  required autofocus />
                                </div>
                                <div class="col-sm-6">
                                   <input type="text" class="form-control" name="to_time" placeholder="12:30PM" value="" data-validate="required" data-message-required="<?php echo ' required';?>"  required autofocus />
                                </div>
                                </div>
                            </div>

							<div class="form-group">                              
                                <label class="col-sm-3 control-label">Date's</label>

                                <div class="col-sm-5">
                                  <div class="col-sm-6">
                                    <input type="Date" id="first_date" class="form-control" name="from_date" value="" data-validate="required" data-message-required="<?php echo ' required';?>" required placeholder />
                                  </div>
                                <div class="col-sm-6">
                                    <input type="Date" id="second_date" class="form-control" name="to_date" value="" data-validate="required" data-message-required="<?php echo ' required';?>" required placeholder />
                                </div>
                              </div>
                            </div>
							
							 <div class="form-group">
                                <label class="col-sm-3 control-label">Seat Attendees</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="seat_attendees" value="" data-validate="required" data-message-required="<?php echo ' required';?>"  required autofocus />
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-3 control-label">Class type</label>
                                <div class="col-sm-5">
                                    <input type="radio" name="ispaid" value="1">Free&nbsp; &nbsp;
									<input type="radio" name="ispaid" value="0">Paid
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-3 control-label">Record Class</label>
                                <div class="col-sm-5">
                                    <input type="radio" name="record" value="1">Yes&nbsp; &nbsp;
									<input type="radio" name="record" value="0">No
                                </div>
                            </div>
							
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                    <!--<a href="<?=base_url()?><?=$this->router->fetch_class().'/'.$this->router->fetch_method()?>/view" class="btn btn-white">Cancel</a>-->
                                  <button type="submit" class="btn btn-success"><?php echo 'Create class ID';?></button>
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
