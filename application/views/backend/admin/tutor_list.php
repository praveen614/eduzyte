<a href="<?php echo base_url();?>admin/admin/incompleted_tutor" 
              class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
              <?php echo 'Incompleted Tutors';?>
                </a> 
            
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>                    
                            <th><div><?php echo 'Tutor';?></div></th>
                            <th><div><?php echo 'Email & Mobile';?></div></th>
                            <th><div><?php echo 'Password';?></div></th>
                            <th><div><?php echo 'Status';?></div></th>
							<th><div><?php echo 'Login Status';?></div></th>
                            <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>                            
                            <td><?php echo $row->name;?></td>
                            <td>Email :<?php echo $row->email;?><br><hr>Mobile :<?php echo $row->mobile;?></td>
                            <td><?php echo $row->show_password;?></td>
                            <td><?php if($row->admin_status==1){echo "<span class='label label-success'>Active</span>";}else{echo "<span class='label label-danger'>Inactive</span>";}?>							
							</td>
							<td><?php if($row->block_status==1){echo "<span class='label label-success'>Active</span>";}else{echo "<span class='label label-danger'>Blocked</span>";}?>
							</td>	
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!--<li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_tutor_information/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'personal information';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>                                      
                                        
                                        
                                       <li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_tutor_subjects/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Subjects Details';?>
                                                </a>
                                                            </li>
                                                            <li class="divider"></li>                                      
                                        
                                        
                                       <li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_tutor_qualifications/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Qualifications Details';?>
                                                </a>
                                                            </li>
                                                            <li class="divider"></li>                                      
                                        
                                        
                                       <li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_tutor_teaching/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Teaching Details';?>
                                                </a>
                                                            </li>
															<li class="divider"></li> 
										<li>
                                          <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php/modal/popup/modal_tutor_timeslot/<?=$row->id?>');" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Timeslot Details';?>
                                                </a>
                                                            </li>-->
																<li>
                                          <a href="<?=base_url()?>admin/admin/tutor_details/<?=$row->id?>" target="_blank" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'View';?>
                                                </a>
                                                            </li>
															<li>
                                          <a href="<?php echo base_url();?>admin/admin/active_tutor/<?php echo $row->id;?>">
                                                <i class="entypo-pencil"></i>
                                                                              <?php if($row->admin_status==1){ echo 'Inactive';}else{echo 'Active';}?>
                                                </a>
                                                            </li>
																<li>
                                          <a href="<?php echo base_url();?>admin/admin/block_tutor/<?php echo $row->id;?>">
                                                <i class="entypo-pencil"></i>
                                                                              <?php if($row->block_status==1){ echo 'Block';}else{echo 'Active';}?>
                                                </a>
                                                            </li>
															<li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/admin/delete_tutor/<?php echo $row->id;?>');">
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

