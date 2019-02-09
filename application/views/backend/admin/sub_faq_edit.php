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
                    
                    
					
                        <?php echo form_open(base_url() . 'admin/cms_page/sub_faq/update/'.$data->id, array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

                        <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo 'Categories';?></label>

                        <div class="col-sm-5">
                            <select name="faq_id" id="faq_id" class="form-control"  value=""  >
                              <option value="0" >--select--</option>
                              <?php                                
                                foreach($faq as $row):
                                    ?>
                                    <option value="<?php echo $row->id;?>" <?=($data->faq_id == $row->id)?'selected':''?> >
                                        <?php echo $row->faq;?>
                                    </option>
                                <?php endforeach; ?>                                                      
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Question';?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="question" value="<?= $data->question?>" data-validate="required" data-message-required="<?php echo ' required';?>" required autofocus />
                                </div>
                            </div>
                            

                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Answer';?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" rows="3" name="answer" value=""><?= $data->answer?> </textarea>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Priority';?></label>
                                <div class="col-sm-5">
                                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="priority" value="<?= $data->priority ?>" data-validate="required" data-message-required="<?php echo 'required';?>" required autofocus />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'For Tutor';?></label>
                                <div class="col-sm-5">
                                    <input type="checkbox" value="1" name="tutor_status" <?= ($data->tutor_status == '1') ? 'checked':''?> >
                                 <small> You want to show this question for Tutor.</small>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'For Student';?></label>
                                <div class="col-sm-5">
                                    <input type="checkbox" value="1" name="student_status" <?= ($data->student_status == '1') ? 'checked':''?> >
                                 <small> You want to show this question in for Student.</small>
                                </div>
                            </div> 

                             <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Home page';?></label>
                                <div class="col-sm-5">
                                    <input type="checkbox" value="1" name="home_status" <?= ($data->home_status == '1') ? 'checked':''?> >
                                 <small> You want to show this question in Home page.</small>
                                </div>
                            </div> 

                            

                            <div class="form-group">
                            <label class="col-sm-3 control-label">Status *</label>
                            <div class="col-sm-5">
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_active" value="1" <?= (isset($data->status) && ($data->status == '1')) ? 'checked':''?> ><span class="label label-success">Active</span>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="current_status_inactive" value="0" <?= (isset($data->status) && ($data->status == '0')) ? 'checked':''?> ><span class="label label-danger">Inactive</span>
                                </label>
                            </div>
                        </div>
                            

                            
                             

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
            CKEDITOR.replace( 'content' );
        </script>

<br>

<!--password-->
