
            <a href="<?php echo base_url();?>admin/cms_page/address_prof/add" 
              class="btn btn-primary pull-right">
                <i class="entypo-plus-circled"></i>
              <?php echo 'ADD';?>
                </a> 
                <br><br>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            
                            <th><div><?php echo 'Sino';?></div></th>                                                                    
                            <th><div><?php echo 'Address Proof';?></div></th>
                            <th><div><?php echo 'Option';?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $i=1;
                                foreach($data as $row):?>
                        <tr>
                        
                            <td><?php echo $i;?></td>                            
                             <td><?php echo $row->address_prof;?></td>                   
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <!-- teacher EDITING LINK -->
                                        <li>
                                          <a href="<?php echo base_url();?>admin/cms_page/address_prof/edit/<?php echo $row->id;?>" >
                                              <i class="entypo-pencil"></i>
                          <?php echo 'Edit';?>
                                                </a>
                                                </li>
                                        <li class="divider"></li>
                                        
                                        <!-- teacher DELETION LINK -->
                                       <li>
                                          <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/cms_page/address_prof/delete/<?php echo $row->id;?>');">
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

