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
                    
                    
          
                        <?php echo form_open(base_url() . 'admin/cms_page/currency/update/'.$data->id, array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                            

                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Currency';?></label>
                                <div class="col-sm-5">
                                 <input type="text" name="currency" class="form-control" data-validate="required" data-message-required="<?php echo 'required';?>" required  value="<?= $data->currency?>"/>                                
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
