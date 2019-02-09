
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
			<?php if($this->session->flashdata('page_success')){?>
          <div class="alert alert-success alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_success');?>
          </div>
          <?php }?>
            <div class="col-md-9">
               <?php include 'dashboard_tabmenu.php';?>
               <form method="post" id="rating_form" class="form-horizontal mt-20 profstep">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">To: </label>
                    <div class="col-sm-10">
                      <select name="send_id" id="" class="form-control input-lg seexam">
                        <option value="">Choose <?=ucfirst($ratting)?></option>
						<?php foreach($users_list as $user){?>
						<option value="<?=$user->user->id;?>"><?=$user->user->name;?></option>						
						 <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Rating:</label>
                    <div class="col-sm-10">
                      <span>
                        <fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" />
                              <label class = "full" for="star5" title="Awesome - 5 stars">
                              </label>
                              <input type="radio" id="star4half" name="rating" value="4.5" />
                              <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                              </label>
                              <input type="radio" id="star4" name="rating" value="4" />
                              <label class = "full" for="star4" title="Pretty good - 4 stars">
                              </label>
                              <input type="radio" id="star3half" name="rating" value="3.5" />
                              <label class="half" for="star3half" title="Meh - 3.5 stars">
                              </label>
                              <input type="radio" id="star3" name="rating" value="3" />
                              <label class = "full" for="star3" title="Meh - 3 stars">
                              </label>
                              <input type="radio" id="star2half" name="rating" value="2.5" />
                              <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                              </label>
                              <input type="radio" id="star2" name="rating" value="2" />
                              <label class = "full" for="star2" title="Kinda bad - 2 stars">
                              </label>
                              <input type="radio" id="star1half" name="rating" value="1.5" />
                              <label class="half" for="star1half" title="Meh - 1.5 stars">
                              </label>
                              <input type="radio" id="star1" name="rating" value="1" />
                              <label class = "full" for="star1" title="Sucks big time - 1 star">
                              </label>
                              <input type="radio" id="starhalf" name="rating" value="0.5" />
                              <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                              </label>
                            </fieldset> 
                             <span class="tutrating">
                            <!--<a href="" class="blutxt" id="ratingshow">Show</a>-->
                          </span>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Testimonial:</label>
                    <div class="col-sm-10">
                      <textarea name="testimonial" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                  </div>
               </form>
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
  var value1 = $("input[name=testimonial]").val();
        $(this).text(value1);
    });
	
	$("#rating_form").validate ({
		   
             rules: {               
               send_id:{ 
                  required:true
               },
			    rating:{ 
                  required:true
               },
			    testimonial:{ 
                  required:true
               }
               }          
               
               
       });
</script>