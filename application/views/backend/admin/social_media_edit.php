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
                    
                    
					
                        <?php echo form_open(base_url() . 'admin/admin/social_media/update/'.$data->id, array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>                          

                           <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Facebook';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="facebook" value=""><?php echo $data->facebook?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Twitter';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="twitter" value=""><?php echo $data->twitter?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Linked In';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="linked_in" value=""><?php echo $data->linked_in ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Google+';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="google_plus" value=""><?php echo $data->google_plus ?></textarea>
                                </div>
                            </div>

                            

                            
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
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

<!-- <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

    
        <script>
            CKEDITOR.replace( 'location' );
        </script> -->

<br>

<!--password-->
