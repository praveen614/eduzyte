<?php $country=$this->Front_end_model->get_active_data('country');
 $list=$this->Front_end_model->get_shortlist_tutor();
?>
                    <div class="left-sidebar">      
                      <aside class="single-widget" id="hide_shortlist">
                            <h6 class="widget-title">Tutor Shortlist</h6>
                            <div class="widget-content categories-widget shrtlist">
                              <div class="add_shortlist"><?php if(count($list)>0){
								  foreach($list as $row){$data=$this->Front_end_model->get_shortlist_by_id($row->shortlist_tutor_id);if(!empty($data->profile_image)){$image_url=base_url()."uploads/tutor_profile/".$data->profile_image;}else{$image_url=base_url()."front_assets/img/tutor1.jpg";}?><span id="<?=$data->generated_id?>">
<a role="button" class="shimgremove" onclick=remove_shortlist("<?=$data->generated_id?>","<?=$data->id?>","<?=$data->first_name?>","<?=$image_url?>")><i class="fa fa-close"></i></a>
<img src="<?=$image_url?>" class="img-responsive img-circle res-mb-10" width="60" height="60"><small><?=$data->first_name?></small>
<input type="hidden" name="shortlist_tutor_id[]" value="<?=$data->id?>" /></span>											
<?php }	}?></div><a role="button" onclick="save_shortlist()" class="blubtn">Save Shortlist <i class="fa fa-angle-right"></i></a></div>
</aside>                  
                        <aside class="single-widget">
                            <h6 class="widget-title">LOCATIONS</h6>
                            <div class="widget-content categories-widget locationsel">
                                <ul>
								
                                    <li><input type="checkbox"> From any Country</li>
								<?php foreach($country as $row){?>
									<li><input type="checkbox" class="item_filter country" value="<?=$row->id?>"> <?=$row->country?></li>
								<?php } ?>
                                </ul>
                            </div>
                        </aside>
                        <aside class="single-widget">
                            <h6 class="widget-title">GENDER</h6>
                            <div class="widget-content">
                                <label><input type="checkbox"  class="item_filter gender" id="Male" name="gender" value="Male"> Male</label>
                                <label><input type="checkbox"  class="item_filter gender" id="Female" name="gender" value="Female"> Female</label>
                            </div>
                        </aside>                        
                        <aside class="single-widget">
                            <h6 class="widget-title">Experience </h6>
                            <div class="widget-content">
                                <label><input type="checkbox" class="item_filter experience" id="1" name="experience" value="1"> 1 Year</label>
                                <label><input type="checkbox" class="item_filter experience" id="2" name="experience" value="2"> 2 Years</label>
                                <label><input type="checkbox" class="item_filter experience" id="3" name="experience" value="3"> 3 Years</label>
                                <label><input type="checkbox" class="item_filter experience" id="4" name="experience" value="4"> 4 Years</label>
                                <label><input type="checkbox" class="item_filter experience" id="5" name="experience" value="5"> 5 Years</label>
                            </div>
                        </aside>
                        <aside class="single-widget">
                            <h6 class="widget-title">Age (years)  </h6>
                            <div class="widget-content">
                                <label><input type="checkbox" class="item_filter age" name="age" id="18" value="18"> Age 18-30 years</label>
                                <label><input type="checkbox" class="item_filter age" name="age" id="45" value="45"> Age 31-45 years</label>
                                <label><input type="checkbox" class="item_filter age" name="age" id="46" value="46"> Age 46+ years </label>
                            </div>
                        </aside>                        
                    </div>

		