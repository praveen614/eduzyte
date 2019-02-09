
            <a href="<?php echo base_url();?>admin/cms_page/sub_faq/add" 
            	class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
            	<?php echo 'ADD';?>
                </a> 
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>
							<th><div><?php echo 'Priority';?></div></th>
                             <th><div><?php echo 'FAQ';?></div></th>                                                                  
                            <th><div><?php echo 'Questions';?></div></th>
                             <th><div><?php echo 'Answers';?></div></th>
							 <th><div><?php echo 'Tutor';?></div></th>
							<th><div><?php echo 'Student';?></div></th>
							<th><div><?php echo 'Home';?></div></th>
                            <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>
							<td><?php echo $row->priority;?></td>
                             <td><?php echo $this->db->where('id',$row->faq_id)->get('faq')->row()->faq;?></td>                             
                             <td><?php echo $row->question;?></td> 
                              <td><?php echo $row->answer;?></td>
							  <td><?php if($row->tutor_status == 1){echo '<button type="button" class="btn btn-success btn-sm">Yes</button>';}else{echo '<button type="button" class="btn btn-danger btn-sm">No</button>';}?></td>
<td><?php if($row->student_status == 1){echo '<button type="button" class="btn btn-success btn-sm">Yes</button>';}else{echo '<button type="button" class="btn btn-danger btn-sm">No</button>';}?></td>
<td><?php if($row->home_status == 1){echo '<button type="button" class="btn btn-success btn-sm">Yes</button>';}else{echo '<button type="button" class="btn btn-danger btn-sm">No</button>';}?></td>
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!-- teacher EDITING LINK -->
                                        <li>
                                        	<a href="<?php echo base_url();?>admin/cms_page/sub_faq/edit/<?php echo $row->id;?>" >
                                            	<i class="entypo-pencil"></i>
													<?php echo 'Edit';?>
                                               	</a>
                                        				</li>
                                        <li class="divider"></li>
                                        
                                        <!-- teacher DELETION LINK -->
                                       <li>
                                        	<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/cms_page/sub_faq/delete/<?php echo $row->id;?>');">
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

