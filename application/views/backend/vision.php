<hr />
<div class="row">
	<div class="col-md-12">
    
    
        
	

        <br>
        
			
                        <?php echo form_open(base_url() . 'index.php/admin/about', array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                     
                         
                                    <textarea class="form-control"  name="btext"><?php echo $about->btext;?></textarea>
                             

                      

                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo 'Update About Content';?></button>
                              </div>
								</div>
                        </form>
		
	</div>
</div>

		
		<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

	
		<script>
			CKEDITOR.replace( 'btext' );
		</script>

<br>


