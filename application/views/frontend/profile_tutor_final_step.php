
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>Tutor Application Process</h2>
  </div>
</section>
<section id="how-it-works-area" class="ptb-60">
  <div class="container">
   <?php if($this->session->flashdata('page_success')){?>
          <div class="alert alert-success alert-dismissible fade in mb-0 col-md-10 col-md-offset-1 profstep" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_success');?>
          </div>
          <?php }?>
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="prfabout mt-0 single-widget emsg">
         <p>Thank you for your participaltion is Eduzyte Tutor Application Process. We are glad to inform that you have completed all the steps with respect to tutor application.We might ask you for additional information as part of the application review process. You will receive a status update regarding tutor profile approval at Eduzyte after review of your application.</p>
          <h4 class="blutxt">Declaration</h4>
          <p>I declare that the details provided by me in this form are true and correct to the best of knowledge and belief and I undertake to inform Eduzyte of any changes there in immediately. In case any of the above information is found to be false or untrue or misleading or misrepresenting, I am aware that I may be held liable for it.</p>
          <hr>
          <div>
		  <form method="post" action="">
		  <input type="hidden" name="tutor_id" value="<?=$this->session->userdata('user_id')?>" >
            <a href="tutor_time_slot" class="btn pull-left" ><i class="icofont icofont-simple-left"></i> BACK</a>
			<button type="submit" class="btn btn-fr btn-primary pull-right" >SUBMIT</button>
           <!--<button type="submit" class="btn btn-fr btn-primary pull-right" data-toggle="modal" data-target="#finalModal">SUBMIT</button>-->
		   </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- app about area start -->

<!-- Modal -->
<div class="modal fade" id="tesreqModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Request Later</h4> <hr>
              <div class="row">
                <div class="col-md-12">
                    <p>Please note that testimonials are very important as credentials for your teaching experience. We strongly recommend you to get testimonials added from your past or previous students. You can also request testimonials later, after form submission, through your Eduzyte dashboard.</p>
                </div>
              </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn" data-dismiss="modal">OK</button> 
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="finalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">     
      <div class="modal-body forgot">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="row">
                <div class="col-md-12">
                    <p>www.eduzyte.com <br>
Please note is mandatory to upload your latest marksheet/ degree or diploma certificate for bachelors/undergraduate before final submission of the form.</p>
                </div>
              </div>  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn" data-dismiss="modal">OK</button> 
      </div>
    </div>
  </div>
</div>