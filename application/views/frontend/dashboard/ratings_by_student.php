
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
                  <?php include 'student_rate_menu.php';?>
            </div>
			
            <div class="col-md-9">
               <?php include 'dashboard_tabmenu.php';?>
               <div id="no-more-tables" class="sr-view">
                  <table class="table table-bordered table-striped table-responsive cf mt-20">
                    <thead class="cf">
                      <tr>
                        <th><?=ucfirst($ratting)?> ID</th>
                        <th><?=ucfirst($ratting)?> Name</th>
                        <th>Rating</th>
                        <th>Testimonial By <?=ucfirst($ratting)?></th>
                      </tr>
                    </thead>
					<?php foreach($rating_data as $row){?>
                    <tr>
                      <td data-title="Student ID"><?=$row->generated_id?></td>
                      <td data-title="Student Name"><?=$row->name?></td>
                      <td data-title="Rating"><?=$row->rating?></td>
                      <td data-title="Testimonial By Student">
                        <?=$row->message?>
                      </td>
                    </tr>
					<?php }?>
                  </table>
               </div>
			   <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger text-center">
                    <strong>Note:</strong> All the messages will be delivered to the tutors after approved by Eduzyte admin and if messages contains any inappropriate words, contact details will not be delivered and same will be displayed on ‘Rejected Mails’
                  </div>
            </div>
          </div>
            </div>
          </div>
        </div>
  </div>
</section>                                       

<script>
  $("#ratingshow").click(function(){
        $(this).text("4.5");
    });
</script>