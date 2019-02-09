
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>MY DASHBOARD</h2>
  </div>
</section>
<section id="app-about-area" class="ptb-30 dashboard profstep persform">
  <div class="container">  
        <div class="about-app mt-0">
          <?php include 'tutor_welcome.php';?>
          <div class="row">
            <div class="col-md-3">
                  <?php include 'referrals_menu.php';?>
            </div>
            <div class="col-md-9">
               <?php include 'dashboard_tabmenu.php';?>
               <div id="no-more-tables" class="sr-view">
                  <table class="table table-bordered table-striped table-responsive cf mt-20">
                    <thead class="cf">
                      <tr>
                        <th>Student Name</th>  
                        <th>Student Contact Details</th>   
                        <th>Eduzyte credits (in INR)</th>   
                        <th>Classes Status</th>   
                        <th>Referred on</th>
                      </tr>
                    </thead>
					<?php if(!empty($referrs)){ foreach($referrs as $row){?>					
                    <tr>
                      <td data-title="Student Name"><?=ucfirst($row->name)?></td>
                      <td data-title="Student Contact Details"><?=$row->mobile?></td>
                      <td data-title="Eduzyte credits (in INR)"> will be updated after tution confirmation </td>
                      <td data-title="Classes Taken">lorem ipsum</td>
                      <td data-title="Referred on"><?=date('d-m-Y',$row->created_at)?></td>
                    </tr>
					<?php } }else{?>
					<tr>
                      <td colspan="5"><div class="alert alert-success text-center">
                 You have not referred anybody yet. <a href="<?=$user_type?>_referrals">Refer now</a>
               </div></td>                      
                    </tr>
					<?php }?>
					
                  </table>
               </div>
               
            </div>
          </div>
        </div>
  </div>
</section>                                       
