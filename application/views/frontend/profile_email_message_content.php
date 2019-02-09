
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>WELCOME TO EDUZYTE</h2>
  </div>
</section>
<section id="how-it-works-area" class="ptb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 profstep">
        <div class="prfabout mt-0 single-widget emsg">
          <h4 class="blutxt">Hello <?= ucfirst($this->session->userdata('user_name'));?></h4><hr>
          <p>Creating your tutor profile is the first step of the application process. As Eduzyte has hundreds of tutors, your tutor profile needs to stands out and let potential students know why they should choose you !</p>
          <p>Please try to create a strong, descriptive, and professional profile. The form may require or recommend that you submit documents supporting your credentials.</p>
          <h4>The form consists of sections as below.</h4>
          <ul>
            <li>Personal Information</li>
            <li>Subjects You Teach</li>
            <li>Educational Qualifications</li>
            <li>Teaching Details</li>
            <li>Tuition Timings</li>
          </ul>
          <p>Please note all the tutor application will be scrutinized for quality and credentials. Inaccurate and inconsistent information might result in your application getting rejected. </p>
          <p>We strongly recommend you to add supporting documents for your academics and work experience and get your profile verified. And get further credentials added to your profile by requesting your students for testimonials and submitting articles at Eduzyte. </p>
          <p>We look forward to having you join 450+ other tutors onboard Eduzyte. </p>
          <hr>
          <h3 class="grentxt">All the Best !</h3>
          <div align="center">
		  <form method="post" action="">
		  <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>" >       
			<button type="submit" class="btn res-mt-10"><i class="icofont icofont-save"></i> SAVE</button>
			</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- app about area start -->
