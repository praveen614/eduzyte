<?php 
$edit_data    = $this->db->get_where('student_request_class' , array('id' => $param2) )->row();
$turor_id =$this->db->where('subject_id',$edit_data->course)->get('tutor_subjects')->result();

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
        
                <?php echo form_open(base_url() . 'admin/admin/student_request_edit/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            <div class="padded">
			
			<div class="form-group">
                    <label class="col-sm-3 control-label">Price per Hour</label>
					<div class="col-sm-3 controls">
					<select name="currency_type" class="form-control date1">
						<option value="dollar">$</option>
						<option value="inr">₹</option>
						</select>
					</div>
                    <div class="col-sm-3 controls">
                        <input type="text" name="hour_price" value="<?=$edit_data->hour_price?>"  />
                    </div>
                </div>
			<div class="form-group">
                    <label class="col-sm-3 control-label">Selected Tutor</label>
					
                    <div class="col-sm-5 controls">
                        <input type="text" value="<?=$this->Home_model->get_tutor_name($edit_data->request_tutor_id);?>" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Select tutor</label>
					
                    <div class="col-sm-5 controls">
                        <select name="request_tutor_id" class="form-control">
						<?php foreach($turor_id as $row){?>
						<option value="<?=$row->tutor_id?>"><?=$this->Home_model->get_tutor_name($row->tutor_id);?></option>
						<?php } ?>
						</select>
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





