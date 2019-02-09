
            
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'User';?></div></th>
                            <th><div><?php echo 'IP address';?></div></th>
                            <th><div><?php echo 'city';?></div></th>
                            <th><div><?php echo 'Country';?></div></th>
                            <th><div><?php echo 'Date';?></div></th>                                              
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                
                                foreach($data as $row):?>
                        <tr>
                            
                            <td><?php echo $row->login_type ?></td>
                            <td><?php echo $row->ip_address ?></td>
                            <td><?php echo $row->city ?></td>
                            <td><?php echo $row->country ?></td>
                            <td><?php echo $row->date ?></td>
                                                       
                            
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

