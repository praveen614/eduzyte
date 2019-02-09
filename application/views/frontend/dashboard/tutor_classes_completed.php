<?php if($user_type == "tutor"){$ratting="student";}else{$ratting="tutor";}?>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>MY DASHBOARD</h2>
  </div>
</section>
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
                        <th><?=ucfirst($ratting)?> ID</th>
                        <th><?=ucfirst($ratting)?> Name</th>
                        <th>Fees (INR/Hr)</th>
                        <th>Total Fees(INR)</th>
                        <th>Requested Hours</th>
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Meeting ID</th>
                        <th>Meeting Link</th>
                      </tr>
                    </thead>
                    <tr>
                      <td data-title="Student ID">&nbsp;</td>
                      <td data-title="Student Name">Kumar</td>
                      <td data-title="Fees (INR/Hr)">&nbsp;</td>
                      <td data-title="Total Fees (INR)">&nbsp;</td>
                      <td data-title="Requested Hours">&nbsp;</td>
                      <td data-title="From Time">&nbsp;</td>
                      <td data-title="To Time">&nbsp;</td>
                      <td data-title="From Date">&nbsp;</td>
                      <td data-title="To Date">10-Jan-2018, 06:30PM</td>
                      <td data-title="Meeting ID"></td>
                      <td data-title="Meeting Link"><a href="#"><i class="fa fa-link"></i> kumarclasslink</a></td>
                    </tr>
                  </table>
               </div>
            </div>
          </div>
        </div>
  </div>
</section>                                       
