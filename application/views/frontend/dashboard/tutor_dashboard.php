<?php if($user_type == "tutor"){$ratting="student";}else{$ratting="tutor";}?>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>MY DASHBOARD</h2>
  </div>
</section>
<?php if($this->session->flashdata('page_success')){?>
          <div class="alert alert-success alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_success');?>
          </div>
          <?php }?>
		  
<section id="app-about-area" class="ptb-30 dashboard">
  <div class="container">  
        <div class="about-app mt-0">
          <?php include 'tutor_welcome.php';?>
          <div class="row">
            <div class="col-md-3">
                  <?php include 'myclasses_menu.php';?>
            </div>
            <div class="col-md-9">
               <?php include 'dashboard_tabmenu.php';?>
			  
               <div id="no-more-tables" class="sr-view">
                  <table class="table table-bordered table-striped table-responsive cf mt-20">
                    <thead class="cf">
                      <tr>
                        <th><?=ucfirst($user_type)?> ID</th>
                        <th><?=ucfirst($user_type)?> Name</th>
                        <th>Fees (INR/Hr)</th>
                        <th>Total Fees(INR)</th>
                        <th>Requested Hours</th>
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Meeting ID</th>
                        <th>Meeting Link</th>
                        <th>Balance Hours</th>
                      </tr>
                    </thead>
					<?php foreach($demo_data as $dcdata){?>
                    <tr>
                      <td data-title="Student ID"><?=$this->session->userdata('g_id');?></td>
                      <td data-title="Student Name"><?=$this->session->userdata('user_name');?></td>
                      <td data-title="Fees (INR/Hr)">__</td>
                      <td data-title="Total Fees (INR)">__</td>
                      <td data-title="Requested Hours">__</td>
                      <td data-title="From Time"><?=$dcdata->from_time?></td>
                      <td data-title="To Time"><?=$dcdata->to_time?></td>
                      <td data-title="From Date">&nbsp;</td>
                      <td data-title="To Date">10-Jan-2018, 06:30PM</td>
                      <td data-title="Meeting ID"></td>
                      <td data-title="Meeting Link"><a href="<?=$dcdata->class_link?>" target="_blank"><i class="fa fa-link"></i> classlink</a></td>
                      <td data-title="Balance Hours">__</td>
                    </tr>
					<?php } ?>
                  </table>
                  <div class="alert alert-danger text-center">
                    <strong>Note:</strong> In-case there were audio issues, internet connectivity problem or a class break - the tutor and/or student must inform the team immediately after the class via email (help@eduzyte.com). Then, our technical team will check and confirm. The minutes will be reduced accordingly, If your concern request is fair.
                  </div>
               </div>
            </div>
          </div>
        </div>
  </div>
</section>                                       
