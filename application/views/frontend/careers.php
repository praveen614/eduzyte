

<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">    
    <div id="overlay"></div>
    <div class="img"></div>    
    <div class="subbgheader">
    	<h2>Careers</h2>
    </div>
</section>
        <section class="ptb-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-heading text-center">
                            <h2>Join our team</h2>  
                            <p>If you’re passionate and ready to dive in, we’d love to meet you.</p>                        
                        </div>
                    </div>
                </div>
            	<div class="row">
                    <div class="col-md-12 careers">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                            <tr>
                                <th>Job/Post</th>
                                <th>Department</th>
                                <th>Location</th>
                                <th>View</th>
                            </tr>
                            <?php foreach($career as $row){?>
                            <tr>
                                <td><?= $row->job_title;?></td>
                                <td><?= $row->department;?></td>
                                <td><?= $row->location;?></td>
                                <td align="center"><a href="<?=base_url()?>careers_view/<?=$row->seo_url?>" class="btn btn-success hvr-bounce-to-right">More Details</a></td>
                            </tr>
                            <?php } ?>
                           
                        </table>
                        </div>
                    </div>
                </div>                                
            </div>
        </section>
