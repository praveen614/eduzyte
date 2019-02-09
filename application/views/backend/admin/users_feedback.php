
           
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>                                                                    
                            <th><div><?php echo 'Name';?></div></th>
                            <th><div><?php echo 'Email';?></div></th>
                            <th><div><?php echo 'Date';?></div></th>
                            <th><div><?php echo 'Reports';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>                            
                             <td><?php echo $row->name;?></td>
                             <td><?php echo $row->email;?></td>
                             <td><?php echo date('d-m-Y',$row->created_at);?></td>
                             <td><a href="<?php echo base_url(); ?>admin/cms_page/report_view/<?=$row->id?>"><button type="button" class="btn btn-info">view</button></a></td>                   

                            
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

