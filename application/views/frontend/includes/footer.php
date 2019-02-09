<style>
  label.error{
  color:red;
  }
</style>

<!-- app about area start -->
<?php $course=$this->Front_end_model->footer_subject();
$subject=$this->Front_end_model->get_data('subjects'); ?>

<section id="app-about-area" class=" gray-bg ptb-20" style="padding-bottom: 150px;">
	<div class="container">
		<!-- <hr style="border-color: #ccc;"> -->
		<div class="row links">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<h6>Browse Courses</h6>
							<ul>
							<?php foreach($course as $row){?>
								<li><a href="<?=base_url()?>search_a_tutor/course/<?=$row->subject_url_slug?>" class="item_filter"><?= $row->subject.' for '.$row->from_level ?> </a></li>
							<?php } ?>								
								<li><a href="<?=base_url()?>search_a_tutor">View all <i class="fa fa-chevron-right"></i></a></li>
							</ul>
						</div>
						<div class="col-md-4 col-sm-4">
							<h6>Browse Subjects</h6>
							<ul>
							<?php foreach($course as $row){?>
								<li><a href="<?=base_url()?>search_a_tutor/course/<?=$row->subject_url_slug?>" class="item_filter"><?= $row->subject ?> </a></li>
							<?php } ?>
								<li><a href="<?=base_url();?>search_a_tutor">View all <i class="fa fa-chevron-right"></i></a></li>
							</ul>
						</div>
						<div class="col-md-4 col-sm-4">
							<h6>Browse Tutors</h6>
							<ul>
								<?php foreach($course as $row){?>
								<li><a href="<?=base_url()?>search_a_tutor/course/<?=$row->subject_url_slug?>" class="item_filter"><?= $row->subject." Tutor" ?> </a></li>
							<?php } ?>							
								<li><a href="<?=base_url()?>search_a_tutor">View all <i class="fa fa-chevron-right"></i></a></li>
								
							</ul>
						</div></div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="row">
							<div class="col-md-12">
								<h6>Quick Links</h6>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-4">
								<ul>
									<li><a href="<?=base_url()?>about_us">About Us</a></li>
									<li><a href="<?=base_url()?>#how-it-works-area" class="howit">How it works</a></li>
									<li><a href="<?=base_url()?>careers">Careers</a></li>
									<li><a href="<?=base_url()?>tutor_faq_page">FAQ's</a></li>
									<li><a href="<?=base_url()?>feedback">Feedback</a></li>
								</ul>
							</div>
							<div class="col-md-6 col-sm-4">
								<ul>
									<li><a href="<?=base_url()?>terms_and_conditions">Terms of use</a></li>
									<li><a href="<?=base_url()?>privacy_policy">Privacy Policy</a></li>
									<li><a href="<?=base_url()?>cancellation_refund">Cancellation & Refund</a></li>
									<li><a href="">Sitemap</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- app about area end -->
	<!-- subscription area start -->
	<div class="subscribe-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="subscribe-text">
						<h2>Subscribe Now</h2>
					</div>
				</div>
				
				<div class="col-sm-8">
					<span style="color:#fff"></span>
					<div class="subscribe-box">						
						    <input type="email" name="subscribe_email" class="form-control"   id="sub"   placeholder="Enter Your Email to Subscribe!" required >
							<button class="email-submit-btn" onclick="subscribe()" ><i class="icofont icofont-paper-plane"></i></button>
							<br><br>
					       <div id="message"></div> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- subscription area end -->
	<!-- contact area start -->
	<section id="contact-area">
		<div class="gap"></div>
		<div class="contact-box">
			<div class="container">
				<div class="contact-box-inner">
					<div class="row">
						<div class="col-sm-7">
							<div class="get-in-touch p-100" id="dropup">
								<h2>Get in Touch</h2>
								<!-- http://marveltheme.com/tf/html/appai/appai/php/mail.php-->
								<form id="appai-contact-form" action="" method="POST" name="appai_message_form" >
									<div class="form-group rq">
										<input type="text" name="your_name" class="form-control txtOnly" id="name" placeholder="Your Name" required>
										
										<div class="form-grad-border"></div>
									</div>
									<div class="form-group rq">
										<input name="your_mobile" class="form-control" id="phone" type="number" placeholder="Mobile Number" required>
										
										<div class="form-grad-border"></div>
									</div>
									<div class="form-group rq">
										<input name="your_mobile2" class="form-control" id="phone1" type="number" placeholder="Whatsapp Number" required>
										
										<div class="form-grad-border"></div>
									</div>
									<div class="form-group rq">
										<input type="email" name="your_email" class="form-control" id="email" placeholder="Email Address" required>
										
										<div class="form-grad-border"></div>
									</div>
									<div class="form-group rq">
										<input type="text" name="your_subject" class="form-control" placeholder="Your Subject">
										
										<div class="form-grad-border"></div>
									</div>
									<div class="form-group rq">
										<textarea name="your_message" class="form-control" rows="3" placeholder="Write Message" required></textarea>
										
										<div class="form-grad-border"></div>
									</div>
									<button type="submit" onclick="contact_message('appai-contact-form')" class="btn btn-2">SEND MESSAGE</button>
									<p class="appai-form-send-message"></p>
								</form>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="address-box p-100">
								
								<center> <img src="<?=base_url()?>front_assets/img/logo/eduzyte_final1.gif">
								
								<ul class="address-info">
									<li class="phone-number">
										<div class="info-icon dsp-tc">
											<i class="icofont icofont-phone"></i>
										</div>
										<div class="info-details dsp-tc">
											<p>+ 91 63 03 145 155</p>
										</div>
									</li>
									<li class="phone-number">
										<div class="info-icon dsp-tc">
											<i class="fa fa-whatsapp"></i>
										</div>
										<div class="info-details dsp-tc">
											<p>+ 91 63 03 145 155</p>
										</div>
									</li>
									<li class="phone-number">
										<div class="info-icon dsp-tc">
											<i class="fa fa-skype"></i>
										</div>
										<div class="info-details dsp-tc">
											<p>+ 91 63 03 145 155</p>
										</div>
									</li>
									<li class="email-address">
										<div class="info-icon dsp-tc">
											<i class="icofont icofont-paper-plane"></i>
										</div>
										<div class="info-details dsp-tc">
											<p><a href="mailto:info@eduzyte.com">info@eduzyte.com</a></p>
										</div>
									</li>
									<li class="address">
										<h2>Address</h2>
										<div class="info-icon dsp-tc">
											<i class="icofont icofont-social-google-map"></i>
										</div>
										<div class="info-details dsp-tc">
											<p>Murali Nagar,Vijayawada, <br>
											Andhra Pradesh, India- 521108</p>
										</div>
									</li>
								</ul></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="modal-city">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Select Country</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<select class="form-control selectpicker" data-live-search="true">
							<option>Select Country</option>
							<option>option</option>
							<option>option</option>
							<option>option</option>
							<option>option</option>
							<option>option</option>
						</select>
					</div>
					
					
				</div>
				
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-subcribe">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				
				<div class="modal-body">
					<div class="form-group">
						
					</div>
					
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- footer area start -->
	<footer id="footer-area">
		<div class="container">
			<ul class="social list-inline text-center">
				<li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
				<li><a href="#"><i class="icofont icofont-social-google-plus"></i></a></li>
				<li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
				<li><a href="#"><i class="icofont icofont-social-skype"></i></a></li>
				<li><a href="#"><i class="icofont icofont-social-instagram"></i></a></li>
			</ul>
			<div class="copyright text-center">
				<p>Copyright @ 2017 eduzyte all right reserved.</p>
			</div>
		</div>
	</footer>
	<!-- footer area end -->
	<div class="scroll-top-wrapper">
		<span class="scroll-top-inner">
			<i class="fa fa-2x fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- page wrapper end -->
<!-- All Js files-->
	<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script>
		
	<!--<script src="<?=base_url()?>front_assets/js/chosen.jquery.js"></script>
	<script src="<?=base_url()?>front_assets/js/prism.js"></script>-->
	<script src="<?=base_url()?>front_assets/js/slick.min.js"></script>
	<script src="<?=base_url()?>front_assets/js/plugins.js"></script>
	<script src="<?=base_url()?>front_assets/js/ajax-mail.js"></script>
	<script src="<?=base_url()?>front_assets/js/ajax-subscribe.js"></script>
	<script src="<?=base_url()?>front_assets/js/particles.js"></script>	
	<script src="<?=base_url()?>front_assets/js/typeit.min.js"></script>
	<script src="<?=base_url()?>front_assets/js/typed.min.js"></script>

<!-- map js -->
<!--     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8hjTJwTaYk3q7ccXZ9SNl5F9Ey6UPEhg"></script> -->
<!--   <script src="<?=base_url()?>front_assets/js/appai.map.js"></script> -->
<!--<script src="<?=base_url()?>front_assets/js/bootstrap-select.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="<?=base_url()?>front_assets/js/wow.min.js"></script>
<script src="<?=base_url()?>front_assets/js/main.js"></script>


<script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
<script>
	
function contact_message(form_id){
			
		 name= $("#"+form_id+" input[name=your_name]").val();
		 mobile= $("#"+form_id+" input[name=your_mobile]").val();
		 mobile2= $("#"+form_id+" input[name=your_mobile2]").val();
		 email= $("#"+form_id+" input[name=your_email]").val();
		 subject= $("#"+form_id+" input[name=your_subject]").val();
		 message= $("#"+form_id+" input[name=your_message]").val();
		 if(name =="" || mobile =="" || mobile2 =="" || email =="" || subject =="" || message ==""){
			 return false;
		 }

	$.ajax({
				url:"<?=base_url()?>/frontend/contact_message",
				type:'post',
				data:{name:name,mobile:mobile,mobile2:mobile2,email:email,subject:subject,message:message},
				success:function(result){
					 if(result=="success"){
					swal({
							title: "success",
							text: "Thankyou !",
							type: "success",
							showCancelButton: false,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "OK"

					});
					return false;
					}				
				}
			});
		};	
	
	
function footer_filter(course_id,course){
  
    sessionStorage.setItem("session_course_id", course_id);
	sessionStorage.setItem("session_course_name", course);
	
	window.location="<?=base_url()?>search_a_tutor";
	
	 
}
function footer_filter1(level_id){	
			$.ajax({			
				url:"<?=base_url()?>/frontend/search_a_tutor",
				type:'post',
				data:{level_id:level_id},
				});	
	 
}

$( document ).ready(function() { 
	$( ".txtOnly" ).keypress(function(e) {
	 var key = e.keyCode; if (key >= 48 && key <= 57) {
	  e.preventDefault(); 
	} 
});
 });


function goBack() {
    window.history.back()
}	
wow = new WOW(
{
boxClass:     'wow',      // default
animateClass: 'animated', // default
offset:       0,          // default
mobile:       true,       // default
live:         true        // default
}
);
wow.init();
/*
var typed = new Typed("#typeit span", {
strings: ["Maths", "Science", "IIT" , "JEE", "CAT", "CBSE", "ICSE", "IGCSE"],
typeSpeed: 90,
backSpeed: 50,
startDelay: 1000,
loop: true,
loopCount: Infinity,
});

$(".searchinput").on("click",function(e){
e.stopPropagation();
$("#typeit").css({"visibility":"hidden"});
});
$(document).on("click",function(){
$("#typeit").css({"visibility":"visible"});
});
*/
$('.selectpicker').selectpicker({
style: 'btn-default',
size: 4
});
</script>
<!-- Chart code -->
<script>
$.fn.hexgrid = function(){
$(this).each(function(){
var hexgrid = $(this);
var hexgridmargin = 0;
var hex = hexgrid.find('.hex');
hex.each(function(){
var spanw = ($(this).outerWidth() / 2);
var span = $(this).find("span");
var holder = $(this).find(".holder");
var holderm = ($(this).outerHeight() - holder.outerHeight()) / 2;
hexgridmargin = (spanw/4);
$(this).css({
"margin":(spanw/4)+"px 0px",
});
holder.css({
"position":"relative",
"top": holderm,
});
span.css({
"border-left": spanw+"px solid transparent",
"border-right": spanw+"px solid transparent"
});
span.eq(0).css({
"border-bottom-width": (spanw/2)+"px",
"bottom":"100%"
});
span.eq(1).css({
"border-top-width": (spanw/2)+"px",
"top":"100%"
});
});
hexgrid.css({
"margin":hexgridmargin+"px 0px"
});
});
}
$(".hexgrid").hexgrid();
</script>
<script>
	$(".dropup").click(function() {
									$('html, body').animate({
									scrollTop: ($("#dropup").offset().top -100)
									}, 2000);
								});
	$(".howit").click(function() {
									$('html, body').animate({
									scrollTop: ($("#how-it-works-area").offset().top -200)
									}, 2000);
								});
								$(document).ready(function(){
		$(function(){
																			var lastScrollTop = 0, delta = 5;
																			$(window).scroll(function(event){
																			var st = $(this).scrollTop();
																			
																			if(Math.abs(lastScrollTop - st) <= delta)
																			return;
																			
																			if (st > lastScrollTop){
																			// downscroll code
																			$(".header").css('opacity','0').animate(5000);
																			} else {
																			// upscroll code
																			$(".header").css('opacity','1').animate(5000);
																			}
																			lastScrollTop = st;
																			});
																							});
		});
								$(document).ready(function(){
$(function(){

$(document).on( 'scroll', function(){

if ($(window).scrollTop() > 100) {
$('.scroll-top-wrapper').addClass('show');
} else {
$('.scroll-top-wrapper').removeClass('show');
}
});

$('.scroll-top-wrapper').on('click', scrollToTop);
});

function scrollToTop() {
verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
element = $('body');
offset = element.offset();
offsetTop = offset.top;
$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}
});
$(window).load(function() {
$("#loading").delay(5000).fadeOut(2000);
});				
/* Set the width of the side navigation to 250px */
         function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            }
/* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            }			
</script>
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/intlTelInput.css">
<script src="<?=base_url()?>front_assets/js/intlTelInput.js"></script>
<script>
	$("#phone,#phone1").intlTelInput({
      utilsScript: "<?=base_url()?>front_assets/js/utils.js"
    });
</script>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script>


/*function myFunction()
{  
  var email = $("#sub").val();
  
         $.ajax({ 
                url: '<?= base_url()?>frontend/subscribe/'+email,
                method: "post",
               success: function (response) {
                  $("#message").html(response); 
                    
                }
            });

};*/


function subscribe()
{
    
    var email = $("#sub").val();
       $.ajax({ 
                url: '<?= base_url()?>frontend/sub_insert/'+email,
                method: "post",
               success: function (response) {
                  $("#message").html(response); 
                    $('#fade_1').fadeIn('slow').delay(2000).hide(0);
                }
            });
    
}

</script>




</body>
</html>