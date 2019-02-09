<?php 
$edit_data      =   $this->db->get_where('student_messages' , array('id' => $param2) )->row();

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
                
                <?php echo form_open(base_url() . 'admin/course_page/student_message_update/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucfirst('Subject');?></label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="subject" value="<?=$edit_data->subject?>" required/>
                    </div>
                </div>
        <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucfirst('Message');?></label>
                    <div class="col-sm-5 controls">
                        <textarea class="form-control" name="message"><?=$edit_data->message?></textarea>
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





