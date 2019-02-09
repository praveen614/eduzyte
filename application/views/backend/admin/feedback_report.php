
            
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>                                                                    
                            <th><div><?php echo 'Question';?></div></th>
                            <th><div><?php echo 'Replay';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>                            
                             <td><?php echo $this->db->where('id',$row->question_id)->get('feedback_questions')->row()->question;?></td>
                             <td><?php if(!empty($row->answer)){ echo $row->answer;}else{ echo "No Replay"; } ?></td>                   
                            
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

