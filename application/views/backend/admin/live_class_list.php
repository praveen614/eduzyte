               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                                <th><div><?php echo 'Slno';?></div></th>
                                <th><div><?php echo 'Title';?></div></th>
                                <th><div><?php echo 'Class_id';?></div></th>
                                <th><div><?php echo 'Timing';?></div></th>
                                <th><div><?php echo 'class duration';?></div></th>
                                <th><div><?php echo 'timezone country';?></div></th>
                                <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $data=$data->classes; $count=count($data); for($i=0;$i<$count;$i++){ ?>
                        <tr>
                        
                            <td><?= $i;?></td>
                          <td><?= $data[$i]->title;?></td> 
                           <td><?= $data[$i]->id;?></td>                            
                           <td>Strat Time: <?=$data[$i]->start_time?><br>
                                End Time: <?=$data[$i]->end_time?>
                            </td>
                          <td><?php echo  ($data[$i]->duration)/60; ?> mins</td>
                          <td><?php echo $data[$i]->timezone_country;?></td> 
              
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                       
                                        <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/live_classes/remove_class/<?=$data[$i]->id?>');">
                                                <i class="entypo-trash"></i>
                                                                              <?php echo 'Remove Class';?>
                                                </a>
                                                            </li>
                                                
                                        </li>
                                    </ul>
                                </div>    
                                
                                
                            </td>
                        </tr>
                <?php } ?>
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

