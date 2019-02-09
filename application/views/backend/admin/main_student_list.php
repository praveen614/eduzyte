
            
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Slno';?></div></th>
							 <th><div><?php echo 'Class ID';?></div></th>
                            <th><div><?php echo 'Student';?></div></th> 
                            <th><div><?php echo 'Class Link';?></div></th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?= $i;?></td>
							<td><?= $row->class_id;?></td>
                            <td>StudentID: <?= $row->student_id;?> <br>
                                Student  : <?= $row->student_name;?>                     
                            </td>                            
                            <td> <?= $row->class_link;?> </td> 
                           
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

