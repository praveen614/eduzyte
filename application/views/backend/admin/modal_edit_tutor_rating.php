<?php 
$edit_data      =   $this->db->get_where('tutor_ratings' , array('id' => $param2) )->row();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit
                </div>
            </div>
            <div class="panel-body">
                
                <?php echo form_open(base_url() . 'admin/course_page/tutor_rating_update/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucfirst('Rating');?></label>
                    <div class="col-sm-5 controls">
					<select name="rating" class="form-control">					
					<option value="0.5" <?php echo($edit_data->rating == '0.5')?'selected':'' ?>>0.5</option>
					<option value="1" <?php echo($edit_data->rating == '1')?'selected':'' ?>>1</option>
					<option value="1.5" <?php echo($edit_data->rating == '1.5')?'selected':'' ?>>1.5</option>
					<option value="2" <?php echo($edit_data->rating == '2')?'selected':'' ?>>2</option>
					<option value="2.5" <?php echo($edit_data->rating == '2.5')?'selected':'' ?>>2.5</option>
					<option value="3" <?php echo($edit_data->rating == '3')?'selected':'' ?>>3</option>
					<option value="3.5" <?php echo($edit_data->rating == '3.5')?'selected':'' ?>>3.5</option>
					<option value="4" <?php echo($edit_data->rating == '4')?'selected':'' ?>>4</option>
					<option value="4.5" <?php echo($edit_data->rating == '4.5')?'selected':'' ?>>4.5</option>
					<option value="5" <?php echo($edit_data->rating == '5')?'selected':'' ?>>5</option>
					
					
						</select>
                        
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucfirst('Testimonial');?></label>
                    <div class="col-sm-5 controls">
                        <textarea class="form-control" name="testimonial"><?=$edit_data->message?></textarea>
                    </div>
                </div>
               
                  <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo ucfirst('update');?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





