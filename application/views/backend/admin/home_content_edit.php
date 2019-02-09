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
                    
                    
					
                        <?php echo form_open(base_url() . 'admin/home_page/home_content/update/'.$data->id, array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                            

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Title';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" value="<?php echo $data->title;?>" data-validate="required" data-message-required="<?php echo 'value required';?>" required autofocus />
                                </div>
                            </div>
                            
                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Content';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="content" value=""><?php echo $data->content;?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ucfirst('photo');?></label>

                        <div class="col-sm-5">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="<?= base_url();?>uploads/eduzyte/<?= $data->image?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="user_file" accept="image/*">
                                        <input type="hidden" name="old_image" value="<?= $data->image?>">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
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
            CKEDITOR.replace( 'content' );
        </script>

<br>

<!--password-->
