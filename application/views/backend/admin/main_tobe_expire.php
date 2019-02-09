
            
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Slno';?></div></th>
                            <th><div><?php echo 'Tutor';?></div></th> 
                            <th><div><?php echo 'Timings & Date';?></div></th>
                            <th><div><?php echo 'Fee';?></div></th>
                            <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count=count($data); $j=1; for($i=0;$i<$count;$i++){ 
                                 ?>
                        <tr>
                        
                            <td><?= $j++;?></td>
                            <td>TutorID : <?= $data[$i]->tutor_id;?><br>
                                Tutor   : <?= $this->Home_model->get_tutor_name($data[$i]->tutor_id);?>                                                     
                            </td>                            
                            <td>Time: <?=$data[$i]->from_time.' - '.$data[$i]->to_time?><br>
                                class Duration: <?=$data[$i]->mins_per_class?> mins<br>
                                Total Requested: <?=$data[$i]->requested_mins?> mins<br>
                                No.of Days: <?=$data[$i]->mins_per_class?> days<br>
                                Date: <?='('.$data[$i]->from_date.') - ('.$data[$i]->to_date.')'?><br>
                            </td> 
                            <td>Fee per Hour: <?=$data[$i]->fee_hour?> <br>
                                Total Fee: <?=$data[$i]->total_fee?><br>
                            </td>                   
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!-- teacher EDITING LINK -->
                                        <li>
                                          <a href="<?php echo base_url();?>admin/admin/demo_class/edit/<?php echo $data[$i]->id;?>" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Edit';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        
                                        
                                        <!-- teacher DELETION LINK -->
                                       <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/admin/demo_class/delete/<?php echo $data[$i]->id;?>');">
                                                <i class="entypo-trash"></i>
                                                                              <?php echo 'Delete';?>
                                                </a>
                                                            </li>
                                                
                                        </li>
                                    </ul>
                                </div>    
                                
                                
                            </td>
                        </tr>
                        <?php }?>
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

