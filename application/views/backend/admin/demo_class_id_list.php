<b>Total Classes:  <?=$data->total;?></b> <a href="<?php echo base_url();?>admin/live_classes/demo_class_id/" 
                  class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
                  <?php echo 'ADD';?>
                </a> 
                <br><br>
				<div class="col-md-12">
				<form method="post">
					<div class="col-md-3">
					<label>Start</label>
						<input type="number" name="limitstart" class="form-control" placeholder="Enter starting Limit" >
					</div>
					<div class="col-md-3">
					<label>End</label>
						<input type="number" name="limit" class="form-control" placeholder="Enter ending Limit ">
					</div>
					<div class="col-md-3">
					<label>Class Title</label>
						<input type="text" name="search" class="form-control" placeholder="Enter class Title" >
					</div>
					
					<div class="col-md-2">	
					<br>
						<input type="submit" class="btn btn-md btn-info" value="Search">
						<br><br>
					</div>
					
				</form>
				</div>
				
<table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                                <th><div><?php echo 'Slno';?></div></th>
                                <th><div><?php echo 'Title';?></div></th>
                                <th><div><?php echo 'Class_id';?></div></th>
                                <th><div><?php echo 'Timing & Dates';?></div></th>
                                <th><div><?php echo 'class duration';?></div></th>
                                <th><div><?php echo 'timezone country';?></div></th>
								<th><div><?php echo 'Class status';?></div></th>
								<th><div><?php echo 'Expire status';?></div></th>
                                <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $data=$data->classes; $count=count($data); $j=1; for($i=0;$i<$count;$i++){ 
							foreach($demo_data as $demo_data1){
							if($demo_data1->class_id == $data[$i]->id){
							?>
                        <tr>
                        
                            <td><?= $j++;?></td>
                          <td><?= $data[$i]->title;?></td> 
                           <td><?= $data[$i]->id;?></td>                            
                           <td>Strat Time: <?=$data[$i]->start_time?><br>
                                End Time: <?=$data[$i]->end_time?>
								<hr>
								Strat Date: <?=$data[$i]->date?><br>
                                End Date: <?=$data[$i]->end_date?>
                            </td>
                          <td><?php echo  ($data[$i]->duration)/60; ?> mins</td>
                          <td><?php echo $data[$i]->timezone_country;?></td>
						  <td><?php  if($data[$i]->isCancel == 0){echo '<button class="btn btn-sm btn-success">Active</button>';}else{echo '<button class="btn btn-sm btn-warning">Cancel</button><br>Canceled On: '.$data[$i]->canceled_date ;}?></td>
                            <td><?php if($data[$i]->end_date == 0000-00-00 && $data[$i]->date < date('Y-m-d')){echo '<button class="btn btn-sm btn-danger">Expired</button>';}
                            elseif($data[$i]->end_date != 0000-00-00 && $data[$i]->end_date < date('Y-m-d')){echo '<button class="btn btn-sm btn-danger">Expired</button>';}
                            else{echo '<button class="btn btn-sm btn-success">Active</button>';}?></td>    
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                       <li>
                                          <a href="<?=base_url()?>admin/live_classes/class_report/<?=$data[$i]->id?>" target="_blank">
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Class report';?>
                                                </a>
                                                            </li> <li class="divider"></li>
                                       <li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/cancel_demo_class/<?=$data[$i]->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Cancel class';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/live_classes/remove_demo_class/<?=$data[$i]->id?>');">
                                                <i class="entypo-trash"></i>
                                                                              <?php echo 'Remove Class';?>
                                                </a>
                                                            </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
							<?php } } }?>
                    </tbody>
                </table>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">
	
        jQuery(document).ready(function($)
      {
            
            
            $(".dataTables_wrapper select").select2({
                  minimumResultsForSearch: -1
            });
      });
            
</script>

