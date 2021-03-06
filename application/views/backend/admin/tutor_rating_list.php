<a href="<?php echo base_url();?>admin/course_page/student_rating" 
              class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
              <?php echo 'Student ratings';?>
                </a> 
            
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>                    
                            <th><div><?php echo 'Tutor';?></div></th>
                            <th><div><?php echo 'Student';?></div></th>
						  <th><div><?php echo 'rating';?></div></th>
						  <th><div><?php echo 'Testimonial';?></div></th>
						  <th><div><?php echo 'Status';?></div></th>
                            <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>                            
                            <td>TutorID : <?= $this->Course_model->get_gid('tutor',$row->tutor_id)?><br>
                                Tutor   : <?= $this->Course_model->get_name('tutor',$row->tutor_id)?>
                </td> 
                            <td>StudentID : <?= $this->Course_model->get_gid('student',$row->student_id)?><br>
                                Student   : <?= $this->Course_model->get_name('student',$row->student_id)?>
                </td>
              <td><?php echo $row->rating;?></td>
			  <td><?php echo $row->message;?></td>
              <td><?php if($row->admin_status==1){echo "<span class='label label-success'>Active</span>";}else{echo "<span class='label label-danger'>Inactive</span>";}?></td>
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                  <li>
                                          <a href="<?php echo base_url();?>admin/course_page/active_tutor_rating/<?php echo $row->id;?>">
                                                <i class="entypo-pencil"></i>
                                                                              <?php if($row->admin_status==1){ echo 'Inactive';}else{echo 'Active';}?>
                                                </a>
                                                            </li>
                              <li class="divider"></li>
                                       <li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_edit_tutor_rating/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Edit';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        
                                        
                                        <!-- teacher DELETION LINK -->
                                       <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/course_page/tutor_rating_delete/<?php echo $row->id;?>');">
                                                <i class="entypo-trash"></i>
                                                                              <?php echo 'Delete';?>
                                                </a>
                                                            </li>
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

