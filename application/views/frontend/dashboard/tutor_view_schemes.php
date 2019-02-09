
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
                        <th>Scheme ID</th>   
                        <th>Valid From</th>  
                        <th>Valid Till</th>  
                        <th>Reward Amount</th>   
                        <th>Get Reward When</th>
                      </tr>
                    </thead>
					<?php if(!empty($scheme)){ foreach($scheme as $row){?>
                    <tr>
                      <td data-title="Scheme ID"><?=$row->scheme_id?></td>
                      <td data-title="Valid From"><?=date('d-m-Y',strtotime($row->valid_from))?></td>
                      <td data-title="Valid Till"><?=date('d-m-Y',strtotime($row->valid_to))?></td>
                      <td data-title="Reward Amount"><i class="fa fa-rupee"></i> <?=$row->reward_amount?>/-</td>
                      <td data-title="Get Reward When"><?=$row->reward_content?>.</td>
                    </tr>
					<?php } } ?>
                  </table>
               </div>
               <div class="alert alert-info text-center">
                 <h4 class="text-left">How it works?</h4>
                 <p>Refer a student to Eduzyte. A classmate, a junior, a friend or even your sibling, older or younger. Student enrolls with a Eduzyte tutor and starts taking paid classes and Eduzyte rewards you for your good deed!</p>
               </div>
            </div>
          </div>
        </div>
  </div>
</section>                                       
