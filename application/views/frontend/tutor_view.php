
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>TUTOR COMPLETE PROFILE</h2>
    <p>View Tutors <i class="fa fa-angle-right"></i> <?= ucfirst($tutor_data->name);?></p>
  </div>
</section>
<?php //echo "<pre>";print_r($tutor_data);
?>
<!-- blog area start -->
<div id="blog-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="tutorshoftprofilebox">
          <div class="row">
		  <?php
		  if(!empty($tutor_data->profile_image)){
							   $image_url=base_url()."uploads/tutor_profile/".$tutor_data->profile_image;
						   }else{
								   $image_url=base_url()."front_assets/img/tutor1.jpg";
							   } ?>
            <div class="col-md-3" align="center"><img src="<?=$image_url?>" class="img-responsive img-thumbnail res-mb-10"></div>
            <div class="col-md-9">
              <strong>Tutor ID : <a href=""><?=$tutor_data->generated_id?></a></strong>  <small>(On Eduzyte since <?= date('M d, Y',$tutor_data->created_at)?>)</small>  <br>
              <small>
              <i class="fa fa-book"></i> <strong>Education :</strong><?=$tutor_data->degree?>. from  <?=$tutor_data->institution?><br>
              <i class="fa fa-clock-o"></i> <strong>Tutoring Experience :</strong> 9 Years 9 Months
              <span class="pull-right"><i class="fa fa-clock-o"></i> <strong>Total Hours Taught on eduzyte :</strong> 1044 Hours</span><br>
              <i class="fa  fa-hourglass-2"></i> <strong>Tutor Expertise :</strong> <?=$tutor_data->teaching_expertise?>
              </small>
              <div class="row">
                <div class="col-md-4"><small><i class="fa fa-map-marker"></i> <?=ucfirst($tutor_data->city)?></small></div>
                <div class="col-md-1"><small><i class="fa fa-user"></i><?=$tutor_data->gender?> </small></div>
                <?php
                  $dateOfBirth = $tutor_data->dob;
                  $today = date("Y-m-d");
                  $diff = date_diff(date_create($dateOfBirth), date_create($today));
                  ?>
                <div class="col-md-2"><small><i class="fa fa-calendar"></i> Age <?=$diff->format('%y')?></small></div>
               <!-- <div class="col-md-5"><small><i class="fa fa-clock-o"></i> Local time: Wed, Dec 06, 2017 07:54 PM (Asia/Kolkata)</small></div>-->
              </div>
              <div class="row">
                <div class="col-md-6">
                  <span>
                    <form method="get">
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
                    </form>
                    <span class="tutrating">
                      4.5 Rating from 681 Classes
                    </span>
                  </span>
                </div>
                <!--<div class="col-md-6"><a href="#mailtotutor" class="grebtn res-mt-10" data-toggle="tab">Message <i class="fa fa-angle-right"></i></a></div>-->
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <ul class="nav nav-tabs mb-20" role="tablist">
                <li role="presentation" class="active"><a href="#basic_info" aria-controls="basic_info" role="tab" data-toggle="tab">Basic Info</a></li>
                <li role="presentation"><a href="#subjects" aria-controls="subjects" role="tab" data-toggle="tab">Subjects</a></li>
                <li role="presentation"><a href="#answers" aria-controls="answers" role="tab" data-toggle="tab">Answers</a></li>
                <!--<li role="presentation"><a href="#mailtotutor" aria-controls="maitltotutor" role="tab" data-toggle="tab">Email <?=$tutor_data->generated_id?></a></li>-->
              </ul>
              <div class="tab-content tutcon pl-20">
                <div role="tabpanel" class="tab-pane active" id="basic_info">
                  <div class="row">
                    <div class="col-md-8 col-sm-7">
                      <h5>About</h5>
                      <p><?=$tutor_data->teaching_approach?></p>
                      <h5>Objective</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit natus neque ipsa, tempora quisquam fugiat maxime repellendus molestiae at id nostrum consectetur hic culpa consequuntur, est veniam eum praesentium! Mollitia!</p>
                      <h5>Educational Qualification</h5>
                      <?php $edu_data = $this->Front_end_model->tutor_multi_data('tutor_degree',$tutor_data->id);
                      foreach ($edu_data as $edu) {
                      ?>
                      <p><?=$this->Front_end_model->get_degree_name($edu->degree_id);?></p>
                    <?php }?>
                    </div>
                    <div class="col-md-4 col-sm-5">
                      <?php include 'request_class.php';?>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="subjects">
                  <div class="row">
                    <div class="col-md-8 col-sm-7">
                      <h5>Teaching Expertise</h5>
                      <div>
                        <?php $sub_data = $this->Front_end_model->tutor_multi_data('tutor_subjects',$tutor_data->id);
                        foreach ($sub_data as $sub) {
                          $sb_data = $this->Front_end_model->subject_data($sub->subject_id,$sub->from_level_id);
                        ?>
                        <a href="" class="grnlabel"><?=$sb_data['subject']?> (<?=$sb_data['from_level']?>)</a>
                      <?php }?>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                      <?php include 'request_class.php';?>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="answers">
                  <div class="row">
                    <div class="col-md-8 col-sm-7">
                      <a href="" class="grebtn" data-toggle="modal" data-target="#askQuestion">Ask A Question <i class="fa fa-angle-right"></i></a>
                      <h5>Email <?=$tutor_data->generated_id?> answer to student's question</h5>
                      <?php for($i=1;$i<=5;$i++){?>
                      <div class="tutanswerbox">
                        <h4>Q : Question Title Here?</h4>
                        <p><strong>A:</strong> Hi, Morrison and Boyd with Organic Chemistry by R.K. Gupta (Arihant publications) I followed. Morrison and Boyd is for theory understanding and R.K. Gupta for question solving. Good luck with your exams. Regards, Puneet. ...</p>
                        <a href="#viewquestions" class="blubtn" data-toggle="tab"><i class="fa fa-chevron-circle-right"></i> View More</a>
                      </div>
                      <?php }?>
                    </div>
                    <div class="col-md-4 col-sm-5">
                      <?php include 'request_class.php';?>
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="viewquestions">
                  <div class="row">
                    <div class="col-md-8 col-sm-7">
                      <div class="post-comment-section">
                        <ul class="media-list">
                          <?php for($i=1;$i<=5;$i++){?>
                      <li class="media">
                            <div class="media-left">
                              <a href="#"><img width="64"  height="64" src="<?=base_url()?>front_assets/img/tutor1.jpg" class="img-circle"> </a>
                            </div>
                            <div class="media-body">
                              <div class="pull-right grentxt"><small>Answered: 06 Dec 2017 16:49</small></div>
                              <h5 class="c-title"><a href="#">Kumar</a></h5>
                              <small>IIT student, Physics and Maths tutor with more than 2 years experience</small>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                          </li>
                      <?php }?>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                      <?php include 'request_class.php';?>
                    </div>
                  </div>
                </div>
                <!--<div role="tabpanel" class="tab-pane" id="mailtotutor">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <div class="panel panel-primary">
                        <h4 class="panel-heading">Contact <?=$tutor_data->generated_id?></h4>
                          <div class="panel-body">
                            <form>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input type="text" class="form-control input-lg" placeholder="Name">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input type="text" class="form-control input-lg" placeholder="Email ID">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input id="phone" type="tel" class="form-control input-lg" placeholder="Mobile Number">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <select class="form-control input-lg sublevel">
                                        <option>Study Level</option>
                                        <option>--Skill Level--</option>
                                        <option>Beginner</option>
                                        <option>Intermediate</option>
                                        <option>Expert</option>
                                        <option>--Grades--</option>
                                        <option>Grade 1</option>
                                        <option>Grade 2</option>
                                        <option>Grade 3</option>
                                        <option>Grade 4</option>
                                        <option>Grade 5</option>
                                        <option>Grade 6</option>
                                        <option>Grade 7</option>
                                        <option>Grade 8</option>
                                        <option>Grade 9</option>
                                        <option>Grade 10</option>
                                        <option>Grade 11</option>
                                        <option>A levels</option>
                                        <option>Grade 12</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <select class="form-control input-lg teach">
                                      <option>Subjects</option>
                                        <option>Acadamics</option>
                                        <option>Accounting</option>
                                        <option>Chemistry</option>
                                        <option>Finance</option>
                                        <option>Maths</option>
                                        <option>Physics</option>
                                        <option>Earth Science</option>
                                        <option>Social Science</option>
                                        <option>StatiStics</option>
                                        <option>Botony</option>
                                        <option>Zoology</option>
                                        <option>Commerce</option>
                                        <option>Economics</option>
                                        <option>Geology</option>
                                        <option>Political Science</option>
                                        <option>Psychology</option>
                                        <option>Space Science</option>
                                        <option>Philosophy</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control input-lg" rows="5" cols="10" placeholder="Type your message here. Request for a class, get doubts clarified, seek tips on preparation plan..."></textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <button type="submit" class="btn site-button dgreen p-b30 pull-right">Send Message</button> <br>
                                    <small class="fl res-mt-10 pull-right" style="padding-right: 10px">By clicking 'Send Message' you are agreeing to all <a href="#" class="grentxt">Terms & Conditions</a></small>
                                  </div>
                                </div>
                            </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- blog area end -->
<!-- app about area start -->
<!-- Modal -->
<div class="modal fade" id="askQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ask A Question</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <textarea rows="5" cols="10" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <select class="form-control input-lg">
              <option value=''>Study Level</option>
              <option>--Skill Level--</option>
                  <option>Beginner</option>
                  <option>Intermediate</option>
                  <option>Expert</option>
                  <option>--Grades--</option>
                  <option>Grade 1</option>
                  <option>Grade 2</option>
                  <option>Grade 3</option>
                  <option>Grade 4</option>
                  <option>Grade 5</option>
                  <option>Grade 6</option>
                  <option>Grade 7</option>
                  <option>Grade 8</option>
                  <option>Grade 9</option>
                  <option>Grade 10</option>
                  <option>Grade 11</option>
                  <option>A levels</option>
                  <option>Grade 12</option>
            </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <select class="form-control input-lg">
              <option>Subject / Course</option>
              <option>Acadamics</option>
                      <option>Accounting</option>
                      <option>Chemistry</option>
                      <option>Finance</option>
                      <option>Maths</option>
                      <option>Physics</option>
                      <option>Earth Science</option>
                      <option>Social Science</option>
                      <option>StatiStics</option>
                      <option>Botony</option>
                      <option>Zoology</option>
                      <option>Commerce</option>
                      <option>Economics</option>
                      <option>Geology</option>
                      <option>Political Science</option>
                      <option>Psychology</option>
                      <option>Space Science</option>
                      <option>Philosophy</option>
            </select>
            </div>
          </div>
          <div class="col-md-12">
           <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Topic">
           </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Submit Question</button>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/intlTelInput.css">
<script src="<?=base_url()?>front_assets/js/intlTelInput.js"></script>
<script>
    $('.timeset select').timezones();
    $("#phone,#phone1,#phone2").intlTelInput({
      utilsScript: "js/utils.js"
    });
</script>
