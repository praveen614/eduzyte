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
					
                        <?php echo form_open(base_url() . 'admin/home_page/testimonials/insert', array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                            
                             <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Name';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" value="" data-validate="required" data-message-required="<?php echo 'Name required';?>" required autofocus />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Designation';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="designation" value="" data-validate="required" data-message-required="<?php echo 'designation required';?>" required autofocus />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Description';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" rows="6" name="description" value=""></textarea>
                                </div>
                            </div>  

                            <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo ucfirst('photo');?></label>

                        <div class="col-sm-5">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/200x200" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="user_file" data-validate="required" data-message-required="<?php echo 'image required';?>" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    <p style="color: red">*please upload image in size 501x501</p>
                                    <p style="color: red">*please upload jpeg/jpg format images</p>
                                </div>
                            </div>
                        </div>
                    </div>

                            <!-- <div class="form-group">
                            <label class="col-sm-3 control-label">Status *</label>
                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_active" value="1" data-validate="required" data-message-required="<?php echo 'required';?>" required ><span class="label label-success">Active</span>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_inactive" value="0" ><span class="label label-danger">Inactive</span>
                                </label>
                            </div>
                        </div> -->
                            
                            
                            

                           

                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                    <a href="<?=base_url()?><?=$this->router->fetch_class().'/'.$this->router->fetch_method()?>/view" class="btn btn-white">Cancel</a>
                                  <button type="submit" class="btn btn-success"><?php echo 'SAVE';?></button>
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
