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
                        
                        
    					
                            <?php echo form_open(base_url() . 'admin/cms_page/our_values/update/', array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                                
                                <?php  $count= count($data); for($i=0;$i<$count;$i++){?>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo 'Content';?></label>
                                    <div class="col-sm-5">
                                        <input type="hidden" id="content_id" name="content_id[]" value="<?=$data[$i]->id?>">
                                        <textarea class="form-control" rows="2" name="content[]" value=""><?= $data[$i]->content?> </textarea>
                                    </div>
                                </div> 
                            <?php } ?>

                               


                                
                                 

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

        <!-- 
            <script>
                CKEDITOR.replace( 'content' );
            </script>
     -->
    <br>

    <!--password-->
