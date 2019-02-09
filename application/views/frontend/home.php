
    <!-- <div id="loading">
          <div id="loading-center">
            <div id="loading-center-absolute">
              <img src="<?=base_url()?>front_assets/img/loader.gif" alt="eduzyte">  
            </div>
          </div>
        </div> -->
    <!-- slider area start -->
    <style>
    #chartdiv {
    width: 100%;
    height: 500px;
    }
    </style>
	
	<style type="text/css">
.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
	border: 2px solid #CCCCCC;
	border-radius: 8px;
	font-size: 24px;
	height: 30px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 396px;
}
.typeahead {
	background-color: #FFFFFF;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
</style>
	
    <section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
        <div id="overlay"></div>
        <div class="img"></div>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
          <script>
    /* $( function() {
        var availableTags = [
          "IIT Jee",
          "Jee",
          "TOFEL",
          "BTech",
          "B.Sc.",
          "M.Sc.",
          "MTech",
          "JAVA",
          "C",
          "C++",
          "CAT",
          "CBSE",
          "ICSE",
          "Java",
          "JavaScript",
          "Maths",
          "Science",
          "Social",
          "English",
          "Environmental Studies"
        ];
        $( "#tags" ).autocomplete({
          source: availableTags
        });
      } );*/
      </script>
	  <script src="<?=base_url()?>front_assets/js/typeahead.min.js"></script>
	  <script>
    $(document).ready(function(){     
    $('input.typeahead').typeahead({	
        name: 'typeahead',
        remote:'<?=base_url()?>frontend/auto_search?key=%QUERY',
        limit : 10
    });
});
    </script>
	   
        <div class="mysearch">
            
            <h1>Welcome to Eduzyte</h1>
            <h3>Live Online Tutoring by Professional Tutors</h3>
			<!--<div class="subscribe-box">
                <div id="typeit">Click here and search by subject or exam...<span></span></div>
                <form class="subscription-form " method="POST" action="">
                    <div class="ui-widget"><input id="tags" class="form-control searchinput"  name="subscribe-input"></div>
                    <button class="email-submit-btn" type="submit"><i class="icofont icofont-paper-plane"></i></button>
                </form>
            </div>-->
			<!--<div class="ui-widget"><input type="text" name="typeahead" autocomplete="off" class="typeahead" placeholder="Search by subject or exam..."  spellcheck="false"></div>-->
            <div class="subscribe-box">
                
                <form class="subscription-form1" method="POST" action="<?=base_url()?>search_a_tutor">				
                    <div class="ui-widget"><div class="ui-widget"><input type="text" name="typeahead" autocomplete="off" class="typeahead" required placeholder="Search by subject or exam..."  spellcheck="false"></div>
                    <button class="email-submit-btn" type="submit"><i class="icofont icofont-paper-plane"></i></button>
                </form>
            </div>
            
        </div>
        
        
    </section>
    <section>
        <div class="container-fluid frqsearch">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Frequently Searched:
						<?php foreach($f_search as $row){?>
                            <a href="<?=base_url()?>search_a_tutor/<?=$row->search_url?>"><?=$row->show_text?></a> | 
							<?php }?>
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider area end -->
    <!-- app features area start -->
    <section id="app-features-area" class=" pt-20">
        <div class="container">
            <h3 class="text-muted" style="color: #47a545;">
            <div class="row">
                <?php foreach ($home_content as $row) { ?>               
              
                <div class="col-sm-4 p-0 wow fadeIn" data-wow-duration="2s">
                    <div class="single-feature media">
                        <div class="feature-icon media-left">
                            <img src="<?=base_url()?>uploads/eduzyte/<?= $row->image ?>" alt="" width="70">
                        </div>
                        <div class="feature-details media-body">
                            <h6><?= $row->title?></h6>
                           <?= $row->content?>
                        </div>
                    </div>
                </div>
        <?php  };?>
                
            </div>
        </div>
    </section>
    <!-- app features area end -->
    <!-- how it work area start -->
    <section id="how-it-works-area" class="ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-heading text-center">
                        <h2>HOW DOES IT WORK?</h2>
                        <?= $how_works->content?>
                    </div>
                </div>
            </div>
            <section id="cd-timeline" class="cd-container">
                <?php $i=1; foreach ($five_steps as $row) { ?>

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-picture">
                        <i class=" fa fa-send"></i>
                        </div> <!-- cd-timeline-img -->
                        <div class="cd-timeline-content wow fadeIn<?=$row->side?>">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <div class="bigl"> 0<?=$i?></div>
                                </a>
                                <div class="media-body">
                                    <h2><?=$row->title?></h2>
                                    <?=$row->content?>
                                </div>
                            </div>
                            
                            <!--        <span class="cd-date">Step 01</span> -->
                            </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->
                        <?php $i++; } ?>


                            
                                                                        </section>
                                                                        <div class="text-center">
                                                                            <a href="<?=base_url()?>search_a_tutor" class="btn btn-default">Find a Tutor</a>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                                <!-- how it work area end -->
                                                                <!-- awesome feature area start -->
                                                                <section id="awesome-features-area" class="overlay-white ptb-80 hidden-xs">
                                                                    <div class="container">
                                                                        <div class="awhcircle"></div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="section-heading text-center">
                                                                                    <h2>eduzyte ADVANTAGE</h2>
                                                                                    <h4 style="line-height: 30px;" class="text-muted">We’re here to standardising<br/> students and start personalising education</h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <ul class="hexgrid">
                                                                          <?php $i=1; foreach ($advantages as $row) {
                                                                            if($i==4)
                                                                            {
                                                                                echo '<li>
                                                                <div class="hex"><span></span><span></span><div class="holder"></div></div>
                                                            </li>';
                                                                            }
                                                                           ?>

                                                                            <li>
                                                                                <div class="hex"><span></span><span></span><div class="holder">
                                                                                <div class="img" style="background: url(<?=base_url()?>uploads/eduzyte/<?= $row->image ?>);"></div>
                                                                            <strong> <?= $i?> <?= $row->content ?> </strong></div></div>
                                                                        </li>
                                                                    <?php $i++; } ?>

                                                                       
                                                    <div class="clearfix"></div>
                                                </ul>
                                                
                                                
                                            </div>
                                        </section>
                                        <!-- awesome feature area end -->
                                        <!-- fun fact area start -->
                                        <section id="fun-fact-area" class="overlay-grad-one">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-4 col-xs-6">
                                                        <div class="single-fact text-center">
                                                            <i class="fa fa-users"></i>
                                                            <h5>Tutorpreneurs</h5>
                                                            <h2 class="counter">1200</h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-xs-6">
                                                        <div class="single-fact text-center">
                                                            <i class="fa fa-clock-o"></i>
                                                            <h5>Hours of Tutoring
                                                            </h5>
                                                            <h2 class="counter">1080</h2>
                                                        </div>
                                                    </div>
                                                    <!--                  <div class="col-sm-3">
                                                        <div class="single-fact text-center">
                                                            <i class="icofont icofont-boy"></i>
                                                            <h5>Practice Questions
                                                            </h5>
                                                            <h2 class="counter">1170</h2>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-sm-4">
                                                        <div class="single-fact text-center">
                                                            <i class="fa fa-th-large"></i>
                                                            <h5>Digital Content Users
                                                            </h5>
                                                            <h2 class="counter">720</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- fun fact area end -->
                                        <!--faqstart-->
                                        <section id="faq-area" class="pt-80 pb-30 faq-area">
                <div class="container">                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="section-heading text-center">
                                <h2>FREQUENTLY ASKED QUESTIONS</h2>                          
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    <?php $count= count($sub_faq); $first= ceil($count/2); ?>                   
                        <div class="col-sm-12 col-md-6 p-0">
                            <div class="faq-content-wrapper homefaq" style="margin-left: 25px;">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">

                                    <?php for($i=0;$i<$first;$i++){ if($i==0){$clearfix = "clearfix"; }else{ $clearfix = "";} ?>

                                    <div class="panel <?=$clearfix?>">
                                        <div class="panel-heading" role="tab" id="heading<?=$i?>">
                                            <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapseOne" class="collapsed"> <?=$sub_faq[$i]->question?></a>
                                        </h4>
                                        </div>                                        
                                        <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
                                            <div class="panel-body">
                                                <?=$sub_faq[$i]->answer?>
                                            </div>
                                        </div>
                                    </div>

                                   <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 p-0 smpdfaq">
                             <div class="faq-content-wrapper homefaq">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
                                     <?php $second= $count-$first;              
                                   for($j=($count-1);$j>$second;$j--){ 
                                    ?>

                                    <div class="panel">
                                        <div class="panel-heading" role="tab" id="heading<?=$j?>">
                                            <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$j?>" aria-expanded="true" aria-controls="collapseFive" class="collapsed"><?=$sub_faq[$j]->question?></a>
                                        </h4>
                                        </div>
                                        <div id="collapse<?=$j?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$j?>">
                                            <div class="panel-body">
                                                <?=$sub_faq[$j]->answer?>
                                            </div>
                                        </div>
                                    </div>

                                     <?php } ?>

                                </div>
                             </div>
                        </div>
                    </div>
                    <div class="text-center mt-40">
                       <a href="<?=base_url()?>tutor_faq_page" class="btn btn-default">More Questions?</a>
                    </div>
                </div>
            </section>
                                        <!--faqsend-->
                                        <!-- testimonial area start -->
                                        <section id="testimonial-area" class="home-style-3 pt-50">
                                            <div class="container">
                                                <div class="slider-wrapper-2">
                                                    <?php foreach ($testimonial as $row) { ?>
                                                    <div class="slide">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="slider-content text-center">
                                                                    <div class="client-image">
                                                                        <img src="<?=base_url()?>uploads/eduzyte/<?= $row->image ?>" alt="" class="img-responsive img-circle center-block">
                                                                    </div>
                                                                    <div class="client-testimonial" style="height:250px;!important;max-height:250px;">
                                                                        <h3><?= $row->name ?></h3>
                                                                        <p class="client-designation"><?= $row->designation ?></p>
                                                                        <p class="client-review">“<?= $row->description ?>”</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                  
                                                </div>
                                            </div>
                                        </section>
                                        <!-- testimonial area end -->                                    
                                        <!-- app download area start -->
                                        <!-- <section id="app-download-area" class="blue-grad-bg ptb-100" >
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-7">
                                                        <div class="download-app">
                                                            <h1>Download eduzyte </h1>
                                                            <p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incididunt ut labore Lorem ipsum madolor sit amet, consectetur adipisicing incididunt.</p>
                                                            <div class="button-group store-buttons">
                                                                <a href="#" class="btn btn-bordered-white">
                                                                    <i class="icofont icofont-brand-android-robot dsp-tc"></i>
                                                                    <p class="dsp-tc">available on
                                                                        <br> <span>Google Store</span></p>
                                                                    </a>
                                                                    <a href="#" class="btn btn-bordered-white">
                                                                        <i class="icofont icofont-brand-apple dsp-tc"></i>
                                                                        <p class="dsp-tc">available on
                                                                            <br> <span>Apple Store</span></p>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section> -->
                                                <!-- app download area end -->
												
												
					
					
                                                <script>
                                                    <?php
                                                        if(isset($_GET['loc'])){
                                                    ?>
                                                    $('html, body').animate({
                                                        scrollTop: ($("#how-it-works-area").offset().top-100)
                                                    }, 2000);
                                                    <?php        
                                                        }
                                                    ?>
                                                </script>           
                                                <section id="app-about-area" class=" gray-bg pt-40">
        <div class="container">
          <?= $about_us->about_us?>
        </div>
        </section>
		<!--<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>-->
		
                                                                                                                               
    <!-- map area end -->
	
	<script>/*
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '408866479582588',
      xfbml      : true,
      version    : 'v3.2'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));*/
</script>
	