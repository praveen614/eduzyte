<b>Total 
				
				
<table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                                <th><div><?php echo 'Slno';?></div></th>
                                <th><div><?php echo 'classId';?></div></th>                                
                                <th><div><?php echo 'userId';?></div></th>
                                <th><div><?php echo 'class duration';?></div></th>
                                <th><div><?php echo 'Percentage';?></div></th>
								<th><div><?php echo 'Attendance';?></div></th>
                                <th><div><?php echo 'session';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
					<?php $count=count($data); $j=1; for($i=0;$i<$count;$i++){  ?>
                        <tr>
                        
                            <td><?= $j++;?></td>
                           <td><?= $data[$i]->classId;?></td> 
                           <td><a href="#" data-toggle="tooltip" title="<?=$this->Course_model->get_name_id($data[$i]->userId)?>"><?= $data[$i]->userId;?></a></td>
						   <td><?= $data[$i]->duration;?></td>
						   <td><?= $data[$i]->percentage;?></td>
						   <td><?= $data[$i]->attendance;?></td>						   
						   <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Times <span class="caret"></span>
                                    </button>
                                    <ul style="min-width:214px" class="dropdown-menu dropdown-default pull-right" role="menu">
									<?php $time = $data[$i]->session;$count1=count($time); for($t=0;$t<$count1;$t++){ ?>
									<li>TimeIn: <?=$time[$t]->time_in?></li>
									   <li>TimeOut: <?=$time[$t]->time_out?></li>
									   <li class="divider"></li>
									<?php }?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
					<?php  } ?>
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
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>


