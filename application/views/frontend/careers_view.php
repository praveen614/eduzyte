

<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">    
    <div id="overlay"></div>
    <div class="img"></div>    
    <div class="subbgheader">
    	<h2><?=$data->job_title;?></h2>
    </div>
</section>
        <section class="ptb-60 careers">
            <div class="container">               
            	<div class="row">
                    <div class="col-md-8">                        
                        <?=$data->description;?>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">                             
                          <div class="panel-body jbover">
                            <span><i class="fa fa-calendar" ></i> <strong>Date Posted :</strong><br>Posted <?php $now = time(); $your_date=$data->created_at;$datediff = $now - $your_date;echo round($datediff / (60 * 60 * 24));?>  days ago</span> 
                             <span><i class="fa fa-map-marker"></i>  <strong>Location :</strong><br> <?=$data->location;?> </span> 
                             <span><i class="fa fa-user"></i>  <strong>Job Title :</strong><br> <?=$data->job_title;?> </span> 
                             <span><i class="fa fa-check-circle"></i>  <strong>Type :</strong><br> <?= str_replace(',','/',$data->type)?> </span><br>
                             <div align="center"><a href="<?=base_url()?>apply_post/<?=$data->seo_url;?>" class="btn btn-primary hvr-bounce-to-right">APPLY FOR JOB</a></div>
                          </div>
                        </div>
                    </div>
                </div>                                
            </div>
        </section>
