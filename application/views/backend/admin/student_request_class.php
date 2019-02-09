
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>                    
                            <th><div><?php echo 'Student';?></div></th>
                            <th><div><?php echo 'Request Tutor';?></div></th>
                            <th><div><?php echo 'Course and Timing';?></div></th>
                            <th><div><?php echo 'Price per Hour';?></div></th>
                            <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>
                            <td><?php echo $this->Home_model->get_student_name($row->student_id);?><br>
								ID : <?php echo $this->db->where('id',$row->student_id)->get('student')->row()->generated_id;?>
							</td>
                            <td><?php echo $this->Home_model->get_tutor_name($row->request_tutor_id);?><br>
								ID : <?php echo $this->db->where('id',$row->request_tutor_id)->get('tutor')->row()->generated_id;?>
							</td>                                              
                            <td>Course :	<?php echo $this->Home_model->course_by_subject($row->request_tutor_id,$row->course);?><br>
								Subject : <?php echo $this->Home_model->sub_course_name($row->course);?><br>
                                From-time : <?php echo $row->from_time;?><br>
                                To-time : <?php echo $row->to_time;?>
                            </td>
                            <td><?php if($row->currency_type == "inr"){echo "₹";}else{echo "$";}?> <?= $row->hour_price;?></td>

                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_student_request/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Edit';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        
                                        <li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_student_request/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Send mail';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        
                                        
                                        
                                      <!-- <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/course_page/student_request/delete/<?php echo $row->id;?>');">
                                                <i class="entypo-trash"></i>
                                                                              <?php echo 'Delete';?>
                                                </a>
                                                            </li>-->
                                                
                                        
                                    </ul>
                                </div>    
                                
                                
                            </td>
                        </tr>
                        <?php $i++; endforeach;?>
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

