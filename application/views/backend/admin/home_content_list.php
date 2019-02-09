
            
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo 'Photo';?></div></th>
                            <th><div><?php echo 'Title';?></div></th>
                            <th><div><?php echo 'Content';?></div></th>
                            <th><div><?php echo 'Options';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                
                                foreach($data as $row):?>
                        <tr>
                            <td><img src="<?= base_url();?>uploads/eduzyte/<?= $row->image?>" class="img-square" width="70" /></td>
                            <td><?php echo $row->title;?></td>
                            <td><?php echo $row->content;?></td>
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!-- EDITING LINK -->
                                        <li>
                                        	<a href="<?php echo base_url();?>admin/home_page/home_content/edit/<?php echo $row->id;?>" >
                                            	<i class="entypo-pencil"></i>
													<?php echo 'Edit';?>
                                               	</a>
                                        				</li>
                                        <li class="divider"></li>
                                        
                                        <!-- DELETION LINK -->
                                       <!-- <li>
                                        	<a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/about_block/delete/<?php echo $row->id;?>');">
                                            	<i class="entypo-trash"></i>
													<?php echo 'Delete';?>
                                               	</a>
                                        				</li> -->
                                        		
                                        </li>
                                    </ul>
                                </div>	
                                
                                
                            </td>
                        </tr>
                        <?php endforeach;?>
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

