
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>                    
                            <th><div><?php echo 'Tutor';?></div></th>
                            <th><div><?php echo 'Study Level';?></div></th>
							<th><div><?php echo 'Level';?></div></th>
                            <th><div><?php echo 'Subject';?></div></th>
                            <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>
                            <td><?php echo $this->db->where('id',$row->tutor_id)->get('tutor')->row()->name;?></td> 
                           <td><?= $this->db->where('id',$row->study_level_id	)->get('study_level')->row()->study_level ;?></td>
                            <td><?= $this->db->where('id',$row->from_level_id)->get('from_level')->row()->from_level ;?></td>							
                            <td><?php echo $row->subject;?> <br>
							<?php $result=$this->Course_model->check_subject($row->id);if($result == 1){echo "<span style='color:red'>This subject already Exists</span>";}else{echo "<span style='color:green'>New Subject</span>";} ?>
								</td>
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_tutor_request_subject/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Edit & Add Subject';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        
                                        
                                        <!-- teacher DELETION LINK -->
                                       <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/course_page/tutor_request/delete/<?php echo $row->id;?>');">
                                                <i class="entypo-trash"></i>
                                                                              <?php echo 'Delete';?>
                                                </a>
                                                            </li>
                                                
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

