<!-- <section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>LOGIN</h2>
  </div>
</section> -->
<section style="background-image:url(<?=base_url()?>front_assets/img/Teacher-and-student.jpg);  background-position: left center; background-image: no-repeat; height: 900px;" class="bg-img">
  <div class="clearfix">
    <div class="col-md-8"></div>
    <div class="col-md-4 login bg-white z-index2 relative skew-section left-bottom">
      <div align="center" class="pt-60 pb-20">
        <!--<img src="<?=base_url()?>front_assets/img/checkmark.gif" width="80" height="80">-->
		<?php if($this->session->flashdata('error_message')){?>
            <span style="color: red"><b><?=$this->session->flashdata('error_message') ?></b></span>
          <?php }?>
		   <?php  if($this->session->flashdata('success')) { ?>
          <div class="alert alert-success alert-dismissible" style="margin-bottom: -1px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $this->session->flashdata('success'); ?> .
            </div>
              <?php } ?>
      </div>
      <div class="about-app">
          <div class="section-heading text-center mb-0">
            <h2 class="tutprofile" style="padding-bottom:10px;"><span>Verification </span></h2>
          </div>
        </div>
        <h5 class="text-center">Enter the verification code </h5>
      <form method="post" action="">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
          <input type="text" name="otp_number" class="form-control input-lg" placeholder="Enter OTP" required>
        </div>
      </div>
	 
      <div class="form-group clearfix">
        <a href="<?=base_url()?>frontend/resend_otp/<?=$this->uri->segment(2)?>" class="btn-link pull-right pt-10"><i class="icofont icofont-refresh"></i> Resend OTP</a>
        <button type="submit" class="btn"><i class="icofont icofont-checked"></i> VERIFY</button>
      </div>
      </form>
      <p class="text-center lh18"><small>If you did not receive OTP via SMS. Then please contact help@eduzyte.com or you can call to +916303145155.If you did not receive the OTP to Email then please contact the above after checking in spam/junk folder.</small></p>
    </div>
  </div>
</section>

