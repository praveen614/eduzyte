<?php 
$data		=	$this->db->get_where('student_subject' , array('student_id' => $param2) )->result();
?>
<h2>Student subject details</h2>

<table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>                            
                            <th><div><?php echo 'Sino';?></div></th>
							<th><div><?php echo 'Study Level';?></div></th>	
                            <th><div><?php echo 'Type';?></div></th>
                            <th><div><?php echo 'Name';?></div></th>
							<th><div><?php echo 'Time Zone';?></div></th>
							<th><div><?php echo 'Class Time';?></div></th>							
                            <!--<th><div><?php echo 'Option';?></div></th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>                            
                            <td><?= $this->db->where('id',$row->study_level_id)->get('study_level')->row()->study_level;?></td> 
                            <td><?php echo $this->Home_model->table_type($row->subject_course_id);?></td>
							<td><?php echo $this->Home_model->sub_course_name($row->subject_course_id);?></td>
							<td><?php echo $row->time_zone;?></td>
							<td><?php echo $row->from_time.' to '.$row->to_time;?></td>	
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