<?php 
$classid = $param2;

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
                
                <?php echo form_open(base_url() . 'admin/live_classes/cancel_demo_class/'.$param2 , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Class Id</label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="class_id" value="<?=$classid?>" readonly />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label">Class Id</label>
                    <div class="col-sm-6 controls">
                        <select name="iscancel" class="form-control" value="" autofocus >
                             <option value="0">Activate canceled class</option>
							 <option value="1">Cancel class </option>							
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





