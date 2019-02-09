<?php include 'includes/header.php';?>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>COURSES</h2>
  </div>
</section>
<!-- blog area start -->
    <div id="blog-area" class="ptb-60 search-area">
        <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <?php include 'search-all.php'?>
               </div>               
            </div>
            <div class="row filter">
                 <div class="col-md-8 col-sm-6 col-xs-12">
                   <div class="alert filtbtn" role="alert" aria-label="Close">Age 46 year plus <a class="close" data-dismiss="alert">x</a></div>
                   <div class="alert filtbtn" role="alert" aria-label="Close">INR 900+ <a class="close" data-dismiss="alert">x</a></div>
                   <div class="alert filtbtn" role="alert" aria-label="Close">INR 601+ <a class="close" data-dismiss="alert">x</a></div>
                 </div>
                 <div class="col-md-2 col-sm-3 col-xs-6">
                    <div class="form-group">
                      <select class="form-control">
                      <option value=''>Exam</option>
                      <option>IIT JEE</option>
                      <option>BITSAT</option>
                      <option>PMT</option>
                      <option>SAT</option>
                      <option>GRE</option>
                      <option>GMAT</option>
                      <option>CBSE</option>
                      <option>TOEFL</option>
                      <option>CAT</option>
                    </select>
                    </div>                    
                 </div>
                 <div class="col-md-2 col-sm-3 col-xs-6">
                   <div class="form-group">
                     <select class="form-control">
                      <option>Subject</option>
                    </select>
                   </div>
                 </div>
               </div>
            <div class="row">
                <div class="col-md-9 col-md-push-3 col-xs-12">
                    <?php for($i=1;$i<=5;$i++){?>
                        <div class="tutorshoftprofilebox">
                        <div class="row">
                          <div class="col-md-3 col-sm-3 col-xs-12" align="center"><a href="tutor_view.php" class="res-mb-10">
                            <img src="img/tutor1.jpg" class="img-responsive img-thumbnail"></a></div>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <a href="" class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>
                            <strong><a href="tutor_view.php">Kumar</a></strong>  <small>(On Spanedea since July 27, 2014)</small>  <br>
                            <h6>If English is what you desire, Let me help you achieve higher.</h6>                            
                            <small>
                              <i class="fa fa-book"></i> <strong>Education :</strong> M.Tech. from IIT Kharagpur in Mechanical Engineering, 2007 <br>                              
                              <i class="fa fa-clock-o"></i> <strong>Tutoring Experience :</strong> 9 Years 9 Months 
                              <span class="pull-right"><i class="fa fa-clock-o"></i> <strong>Total Hours Taught on eduzyte :</strong> 1044 Hours</span><br>
                              <i class="fa  fa-hourglass-2"></i> <strong>Tutor Expertise :</strong> QuantitativeGMATCAT & 12 others
                            </small>
                             <div class="row">
                              <div class="col-md-8 col-sm-9">
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
                              <div class="col-md-4 col-sm-3"><a href="tutor_view.php" class="grebtn res-mt-10">Message <i class="fa fa-angle-right"></i></a></div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <?php }?>
                    <div align="center"><a href="#" class="btn btn-default"><i class="fa fa-spinner fa-spin fa-fw"></i> LOAD MORE</a></div>
                </div>
                <!-- left sidebar -->
                <div class="col-md-3 col-md-pull-9 col-xs-12">
                  <?php include 'search-leftsidebar.php'?>
                </div>
                <!-- left sidebar end -->
            </div>
        </div>
    </div>
    <!-- blog area end -->
<!-- app about area start -->
<?php include 'includes/footer.php';?>