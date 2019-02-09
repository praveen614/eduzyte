
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">    
    <div id="overlay"></div>
    <div class="img"></div>    
    <div class="subbgheader">
    	<h2>Feedback</h2>
    </div>
</section>
        <section class="ptb-60 careers">
            <div class="container">               
            	<div class="row">
                 <form method="post" action="<?=base_url()?>frontend/feedback_report">
                    <div class="col-md-12">
                        <?= $feedback->content;?>
                        <?php $i=1; foreach($feedback_questions as $fbq){?>
                        <h5 class="blucol"><?=$fbq->question?></h5>
                        <input type="hidden" name="question_id[]" value="<?=$fbq->id?>">
                        <textarea name="answer[]" rows="5" cols="10" class="form-control mb-20" placeholder="Write a Notes"></textarea>
                    <?php $i++; } ?>

                        <!-- <h5 class="blucol">Please comment on the design of the website? Are the colors pleasing to the eye? Is content placed in right places in right fashion? How can we make it better? </h5>
                        <textarea rows="5" cols="10" class="form-control mb-20" placeholder="Write a Notes"></textarea>
                        <h5 class="blucol">Please comment on the security considerations and any loopholes which we should be aware of. All the invaluable information which we hold can be exploited for not-so-good purposes and we intend to do everything in our power to avoid it.</h5>
                        <textarea rows="5" cols="10" class="form-control mb-20" placeholder="Write a Notes"></textarea>
                         <h5 class="blucol">Any other comments. Any issues which we should know about. </h5>
                        <textarea rows="5" cols="10" class="form-control mb-20" placeholder="Write a Notes"></textarea> -->

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" name="name" class="form-control input-lg" placeholder="Full Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" name="email" class="form-control input-lg" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div align="center">
                            <input type="SUBMIT" name="" class="btn btn-primary" value="SUBMIT">
                        </div>
                    </div>
                </form>
                </div>                                
            </div>
        </section>
