<?php 
$data       =   $this->db->get_where('tutor_degree' , array('tutor_id' => $param2) )->result();
?>
<h2>Tutor Qualification details</h2>

<table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>                            
                            <th><div><?php echo 'Sino';?></div></th>
                            <th><div><?php echo 'Institution';?></div></th> 
                            <th><div><?php echo 'Degree';?></div></th>
                            <th><div><?php echo 'Specialization';?></div></th>                                                    
                                                        
                            <!--<th><div><?php echo 'Option';?></div></th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>
                             <td><?php echo $row->institution;?></td>                            
                            <td><?= $this->db->where('id',$row->degree_id)->get('degree')->row()->degree;?></td>               
                            
                            <td><?php echo $row->specialization;?></td>                          
                                
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