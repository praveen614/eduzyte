<hr />

    <div class="row">
    <?php echo form_open(base_url() . 'admin/admin/system_settings/do_update' ,
      array('class' => 'form-horizontal form-groups-bordered','target'=>'_top'));?>
        <div class="col-md-9">

            <div class="panel panel-primary" >

                <div class="panel-heading">
                    <div class="panel-title">
                        <?php echo 'System Settings';?>
                    </div>
                </div>

                <div class="panel-body">

                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo 'System Name';?></label>
                      <div class="col-sm-9">
                          <input type="text" required="true" class="form-control" name="system_name"
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;?>" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo 'System Title';?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="system_title"
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'system_title'))->row()->description;?>" required>
                      </div>
                  </div>

                  

                 
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo 'Footer Description';?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="footer_description"
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'footer_description'))->row()->description;?>">
                      </div>
                  </div>

                  

                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo 'Meta Title';?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="meta_title"
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'meta_title'))->row()->description;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo 'Meta keywords';?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="meta_keywords"
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'meta_keywords'))->row()->description;?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo 'Meta Description';?></label>
                      <div class="col-sm-9">
                          
                              <textarea class="form-control" name="meta_description" value=""><?php echo $this->db->get_where('settings' , array('type' =>'meta_description'))->row()->description;?></textarea>
                      </div>
                  </div>

                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo 'Google Analytics Script';?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="google_analytics_script"
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'google_analytics_script'))->row()->description;?>">
                      </div>
                  </div>



               

                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo 'System_email';?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="system_email"
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'system_email'))->row()->description;?>" required>
                      </div>
                  </div>

              

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info"><?php echo 'Save';?></button>
                    </div>
                  </div>
                    <?php echo form_close();?>

                </div>

            </div>

			<!--<div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo 'Update_product';?>
                </div>
            </div>


            <div class="panel-body form-horizontal form-groups-bordered">
                <?php echo form_open(base_url().'index.php/updater/update' , array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'));?>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo 'File'; ?></label>

                        <div class="col-sm-5">

                            <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="submit" class="btn btn-info" value="<?php echo 'Install_update'; ?>" />
                        </div>
                    </div>

                <?php echo form_close(); ?>
            </div>

        </div>-->

        </div>

      <?php
        $skin = $this->db->get_where('settings' , array(
          'type' => 'skin_colour'
        ))->row()->description;
      ?>

        <div class="col-md-9">

            <?php echo form_open(base_url() . 'admin/admin/system_settings/upload_logo' , array(
            'class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

              <div class="panel panel-primary" >

                  <div class="panel-heading">
                      <div class="panel-title">
                          <?php echo 'Upload_logo' ;?>
                      </div>
                  </div>

                  <div class="panel-body">


                      <div class="form-group">
                          <label for="field-1" class="col-sm-3 control-label"><?php echo 'Photo';?></label>

                          <div class="col-sm-9">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                      <img src="<?php echo base_url();?>uploads/logo.png" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select image</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile" accept="image/*" required="required">
                                      </span>
                                      <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                              </div>
                          </div>
                      </div>


                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-info"><?php echo 'Upload';?></button>
                      </div>
                    </div>

                  </div>

              </div>

            <?php echo form_close();?>


        </div>

    </div>

<script type="text/javascript">
    $(".gallery-env").on('click', 'a', function () {
        skin = this.id;
        $.ajax({
            url: '<?php echo base_url();?>index.php/admin/system_settings/change_skin/'+ skin,
            success: window.location = '<?php echo base_url();?>index.php/admin/system_settings/'
        });
});
</script>

<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

    
        <script>
            CKEDITOR.replace( 'meta_description' );
        </script>
