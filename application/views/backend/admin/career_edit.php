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
					
                        <?php echo form_open(base_url() . 'admin/cms_page/career/update/'.$data->id, array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                            
                           

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Job Title';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="job_title" value="<?= $data->job_title ?>" data-validate="required" data-message-required="<?php echo 'required';?>" required autofocus />
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Department';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="department" value="<?= $data->department ?>" data-validate="required" data-message-required="<?php echo 'required';?>" required autofocus />
                                </div>
                            </div>
							<!--<div class="form-group">
                                <select name="type"  class="form-control" value="" autofocus >
                              <option value="">--Select Type--</option>
							  <option value="">--Select Type--</option>
							  <option value="">--Select Type--</option>
                                                                                    
                          </select>
                            </div>-->
							<?php $type = explode(',',$data->type);?>
							
							 <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Type';?></label>
                                <div class="col-sm-5">
                                    <input type="checkbox" value="Full Time" name="type[]" <?php foreach ($type as $t){if($t=='Full Time'){ echo 'checked';}}?> required>
                                 <small> Full Time.</small>
								 <input type="checkbox" value="Part Time" name="type[]" <?php foreach ($type as $t){if($t=='Part Time'){ echo 'checked';}}?>>
                                 <small> Part Time.</small>
								 <input type="checkbox" value="Profit Sharing" name="type[]" <?php foreach ($type as $t){if($t=='Profit Sharing'){ echo 'checked';}}?>>
                                 <small> Profit Sharing.</small>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Location';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" rows="5" name="location" value=""><?= $data->location ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Description';?></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="desc" value=""><?= $data->description ?></textarea>
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
                        </div>-->
                            
                            
                            

                           

                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                    <a href="<?=base_url()?><?=$this->router->fetch_class().'/'.$this->router->fetch_method()?>/view" class="btn btn-white">Cancel</a>
                                  <button type="submit" class="btn btn-success"><?php echo 'Update';?></button>
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
            CKEDITOR.replace( 'desc' );
        </script>

<br>

<!--password-->
