
            <a href="<?php echo base_url();?>admin/course_page/scheme/add" 
                  class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
                  <?php echo 'ADD';?>
                </a> 
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>                    
                            <th><div><?php echo 'Scheme Id';?></div></th>
                            <th><div><?php echo 'Valid from';?></div></th>
                            <th><div><?php echo 'Valid till';?></div></th>
                            <th><div><?php echo 'Reward Amount';?></div></th>
                            <th><div><?php echo 'Reward Content';?></div></th>
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
                            <td><?php echo $row->scheme_id;?></td>
                            <td><?php echo $row->valid_from;?></td> 
                            <td><?php echo $row->valid_to;?></td> 
                            <td><?php echo $row->reward_amount;?></td> 
                            <td><?php echo $row->reward_content;?></td>  
                            <td><?php if($row->status==1){echo "<span class='label label-success'>Active</span>";}else{echo "<span class='label label-danger'>Inactive</span>";} ?></td>                   
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!-- teacher EDITING LINK -->
                                        <li>
                                          <a href="<?php echo base_url();?>admin/course_page/scheme/edit/<?php echo $row->id;?>" >
                                                <i class="entypo-pencil"></i>
                                                                              <?php echo 'Edit';?>
                                                </a>
                                                            </li>
                                        <li class="divider"></li>
                                        
                                        
                                        <!-- teacher DELETION LINK -->
                                       <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/course_page/scheme/delete/<?php echo $row->id;?>');">
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

