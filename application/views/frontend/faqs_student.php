
<?php header("Cache-Control: private, must-revalidate, max-age=0");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");?>

<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">    
    <div id="overlay"></div>
    <div class="img"></div>    
    <div class="subbgheader">
        <h2>FAQ's</h2>
    </div>
</section>
 <!-- frequently asked questions area start -->
        <section id="faq-area" class="ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 faqsearch pb-30">
                        <form method="post" action="">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control input-lg" placeholder="Type A Question and Press enter!" required="">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-heading text-center">
                            <h2>FAQs For Students</h2>                          
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3 faqleftlist faqleftlist-md-20">
                        <a href="<?=base_url()?>tutor_faq_page" class="btn btn-primary">Tutor</a> <br>
                        <a href="<?=base_url()?>student_faq_page" class="btn btn-primary">Student</a>
                    </div>

                    <div class="col-sm-9 col-md-9 p-0">                        
                        <div class="faq-content-wrapper">
                            <?php if(isset($searched_subfaq)) {  ?>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">                   

                   
                    <?php $k=100; foreach($searched_subfaq as $row) { ?>
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="heading<?=$k?>">
                                        <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$k?>" aria-expanded="true" aria-controls="collapse<?=$k?>" class="collapsed"><?= $row->question;?></a>
                                    </h4>
                                    </div>
                                    <div id="collapse<?=$k?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$k?>">
                                        <div class="panel-body">
                                            <?= $row->answer;?>
                                        </div>
                                    </div>
                                </div>
                                <?php $k++; } ?>
                    

                          <?php  }else { ?>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
                                <!-- main panel -->
                                <?php  $i=1; $j=50; foreach($student_faq as $row) { ?>
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="heading<?=$i?>">
                                        <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>" class="collapsed"><?= $row->faq;?></a>
                                    </h4>
                                    </div>

                                    <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
                                        <div class="panel-body">
                                            <!-- sub panel -->

                                             <div class="panel-group" id="accordion<?=$i?>">
                                                <?php $sub_faq=$this->db->where(array('student_status'=>1,'faq_id'=>$row->id))->order_by('priority','asc')->get('sub_faq')->result();  foreach($sub_faq as $sub_faq1) { ?>
                                                <div class="panel">
                                                    <div class="panel-heading" role="tab" id="heading<?=$j?>">
                                                        <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion<?=$i?>" href="#subcollapse<?=$j?>" aria-expanded="true" aria-controls="collapse<?=$j?>" class="collapsed"><?= $sub_faq1->question;?></a>
                                                    </h4>
                                                    </div>
                                                    <div id="subcollapse<?=$j?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$j?>">
                                                        <div class="panel-body">
                                                            <?= $sub_faq1->answer;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $j++; } ?>                                           

                                            </div>
                                            <!-- sub panel -->

                                        </div>
                                    </div>
                                </div>
                            <?php $i++; } ?>
                                <!-- main panel ends-->                              
                                
                                <?php $k=100; foreach($student_subfaq as $row) { ?>
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="heading<?=$k?>">
                                        <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$k?>" aria-expanded="true" aria-controls="collapse<?=$k?>" class="collapsed"><?= $row->question;?></a>
                                    </h4>
                                    </div>
                                    <div id="collapse<?=$k?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$k?>">
                                        <div class="panel-body">
                                            <?= $row->answer;?>
                                        </div>
                                    </div>
                                </div>
                                <?php $k++; } ?>
                            </div>


                        <?php  } ?>

                            

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- frequently asked questions area end -->
