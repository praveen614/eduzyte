<hr />
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-user"></i> 
					<?php echo 'Edit';?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
        <br>
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content">
                    
                    
					
                        <?php echo form_open(base_url() . 'admin/cms_page/about_us/update/'.$data->id, array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                            

                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Title & Content';?></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="title_content" value=""><?php echo $data->title_content;?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'About_us Content';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="about_us" value=""><?php echo $data->about_us;?></textarea>
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

<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

    
        <script>
            CKEDITOR.replace( 'title_content' );
        </script>

        <script>
            CKEDITOR.replace( 'about_us' );
        </script>

<br>

<!--password-->
