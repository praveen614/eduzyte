<?php 
$data       =   $this->db->get_where('tutor_timeslot' , array('tutor_id' => $param2) )->result();
?>
<h2>Tutor Timeslot details</h2>

<table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>                            
                            <th><div><?php echo 'Sino';?></div></th>
                            <th><div><?php echo 'Time zone';?></div></th> 
                            <th><div><?php echo 'Days';?></div></th>
                            <th><div><?php echo 'From Time';?></div></th>
							<th><div><?php echo 'To Time';?></div></th>
                                                        
                            <!--<th><div><?php echo 'Option';?></div></th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>
                             <td><?php echo $row->time_zone;?></td>                            
                            <td><?php if($row->week=="Full Weak"){echo $row->week.'- Sunday to Saturday ';}if($row->week=="Weekdays"){echo $row->week.'- Monday to Saturday';}if($row->week=="Weekends"){echo $row->week.'- Saturday and Sunday';}?></td>               
                            
                            <td><?php echo $row->from_time;?></td>
							<td><?php echo $row->to_time;?></td> 							
                                
                           <!-- <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        
                                        <li>
                                          <a href="<?php echo base_url();?>admin/course_page/degree/edit/<?php echo $row->id;?>" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Edit';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        
                                        
                                        
                                       <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/course_page/degree/delete/<?php echo $row->id;?>');">
                                                <i class="entypo-trash"></i>
                                                                              <?php echo 'Delete';?>
                                                </a>
                                                            </li>
                                                
                                        </li>
                                    </ul>
                                </div>    
                                
                                
                            </td>-->
                        </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>