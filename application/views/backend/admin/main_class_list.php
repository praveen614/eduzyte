
            <a href="<?php echo base_url();?>admin/live_classes/main_class/add" 
                  class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
                  <?php echo 'ADD';?>
                </a> 
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Slno';?></div></th>
							<th><div><?php echo 'Tutor';?></div></th>
							<th><div><?php echo 'Class_id';?></div></th>
                            <th><div><?php echo 'Tutor Link';?></div></th>
                            <th><div><?php echo 'Fee & Meeting';?></div></th>
							<th><div><?php echo 'Students List';?></div></th>
                          <!--  <th><div><?php echo 'Option';?></div></th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data as $row){ ?>
                        <tr>
                        
                            <td><?= $i;?></td>
							<td>TutorID : <?= $row->tutor_id;?><br>
                                Tutor   : <?= $row->tutor_name;?>
                                                    
                            </td> 
							 <td><?= $row->class_id;?></td>
                            <td style="max-width:400px;word-break:break-all;"><?= $row->tutor_link;?></td> 
                            <td>Fee per Hour: <?=$row->fee_hour?> <br>
                                Total Fee: <?=$row->total_fee?><br>
                                classID: <?=$row->class_id?>
                            </td>
							<td><a class="btn btn-success" target="_blank" href="<?php echo base_url();?>admin/live_classes/main_class_student/<?php echo $row->class_id;?>"> VIEW</a></td>
                          <!--  <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                       
                                        <li>
                                          <a href="<?php echo base_url();?>admin/live_classes/demo_class/edit/<?php echo $row->id;?>" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Edit';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        
                                        
                                       
                                       <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/live_classes/demo_class/delete/<?php echo $row->id;?>');">
                                                <i class="entypo-trash"></i>
                                                                              <?php echo 'Delete';?>
                                                </a>
                                                            </li>
                                                
                                        </li>
                                    </ul>
                                </div>    
                                
                                
                            </td>-->
                        </tr>
								<?php $i++; }?>
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

