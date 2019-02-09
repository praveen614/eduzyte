<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include the above in your HEAD tag -->

<style>
@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);
@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css);
@import url(https://fonts.googleapis.com/css?family=Ubuntu);

body {
				  font-family: "Ubuntu", sans-serif;
				  background-color: #FFF;
			}
.container {
				  padding-top: 50px;
			}
article {
  margin-bottom: 30px;
}
			.img-responsive {
				  width: 150px;
				  height: 150px;
			}
			figcaption {
				  margin-top: 20px;
			}
			
			figcaption > h3 {
				  font-weight: bolder;
				  font-size: xx-large;
			}
			dt, dd {
				  margin-bottom: 5px;
			}
</style>
<title>Tutor view | eduzyte</title>

<div class="container">
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <section class="panel panel-default">
        <div class="panel-body">
          <article class="panel-body">		  
            <figure class="text-center">
              <img src="<?php echo base_url('uploads/tutor_profile/').$information_data->profile_image;?>" class="img-thumbnail img-circle img-responsive" alt="me">
              <figcaption>
                <h3><?= $information_data->title.'.'.ucfirst($information_data->first_name).' '.ucfirst($information_data->last_name);?></h3> <?= $information_data->address_1.', '.$information_data->city.', '.$information_data->state.', '.$information_data->zip_code?>
                <br> Tel. <?= $information_data->mobile?> , E-mail: <?= $information_data->email?>
              </figcaption>
            </figure>
          </article>
          <br>
          <article>
            <h4>
            									  <strong>Personal Details</strong>
								            </h4>
            <hr>
			<?php //echo "<pre>";print_r($information_data);?>
            <dl class="dl-horizontal">
			  <dt>Full Name:</dt>
              <dd><?= $information_data->title.'.'.ucfirst($information_data->first_name).' '.ucfirst($information_data->last_name);?></dd>
              <dt>Date of Birth:</dt>
              <dd><?=$information_data->dob?></dd>
              <dt>Gender:</dt>
              <dd><?= $information_data->gender?></dd>           
            </dl>
          </article>
          <article>
            <h4>
									              <strong>Document's</strong>
								            </h4>
            <hr>
            <dl class="dl-horizontal">
              <dt>Government Id proof:</dt>
              <dd><?php if($information_data->govt_id_prof_file !=''){?>
                  <img src="<?php echo base_url('uploads/tutor_documents/').$information_data->govt_id_prof_file;?>" height="80px" width="80px">
                    <a href="<?php echo base_url().'uploads/tutor_documents/'.$information_data->govt_id_prof_file; ?>" class="btn btn-blue btn-xs btn-icon icon-left" download>
                        <i class="entypo-download"></i>
                        <?php echo 'Download';?>
                    </a>
                    <?php }else{ echo '<span style="color:red">Not uploded</span>';}?></dd>
			  <dt>Address Id proof:</dt>
			  <dd><?php if($information_data->address_prof_file !=''){?>
                  <img src="<?php echo base_url('uploads/tutor_documents/').$information_data->address_prof_file;?>" height="80px" width="80px">
                    <a href="<?php echo base_url().'uploads/tutor_documents/'.$information_data->address_prof_file; ?>" class="btn btn-blue btn-xs btn-icon icon-left" download>
                        <i class="entypo-download"></i>
                        <?php echo 'Download';?>
                    </a>
                    <?php }else{ echo '<span style="color:red">Not uploded</span>';}?></dd>
              
            </dl>
          </article>
		  
		  <article>
            <h4>
									              <strong>Subjects</strong>
								            </h4>
            <hr>
			<dl class="dl-horizontal">			
            <table width="500" border="0" align="center" cellpadding="5">
			<thead>
			<th>Study Level</th><th>Level</th><th>Subject</th>
			</thead>
			<tbody>
			
			<?php foreach($subject_data as $row){?>
			<tr>
			<td><?= $this->db->where('id',$row->study_level_id)->get('study_level')->row()->study_level;?></td>
			<td><?php echo $this->db->where('id',$row->from_level_id)->get('from_level')->row()->from_level?></td>			
			<td><?php echo $this->Home_model->sub_course_name($row->subject_id);?></td>
			<?php } ?>
			</tr>
			</tbody>
			</table>
			</dl>
          </article>
		  
          <article>
            <h4>
									              <strong>Education</strong>
								            </h4>
            <hr>
            <dl class="dl-horizontal">
			<?php foreach($education_data as $row){?>
              <dt><?= $this->db->where('id',$row->degree_id)->get('degree')->row()->degree;?>:</dt>
              <dd><?php echo $row->institution;?>, <br><?php echo $row->specialization;?> </dd>
              <?php } ?>
            </dl>
          </article>
          <article>
            <h4>
									              <strong>Teaching Experiences</strong>
								            </h4>
            <hr>
			<?php if(isset($teaching_data)){?>
            <dl class="dl-horizontal">
              <dt>Teaching Expertise:</dt>
              <dd><?= $teaching_data->teaching_expertise?></dd>
              <dt>Medium:</dt>
              <dd><?=$this->db->get_where('medium' , array('id' => $teaching_data->medium_id) )->row()->medium;?></dd>
			  <dt>Total Experience:</dt>
              <dd><?= $teaching_data->total_experience?></dd>
              <dt>Online Experience:</dt>
              <dd><?= $teaching_data->online_experience?></dd>
			  <dt>Digital Pen:</dt>
			  <dd><?= $teaching_data->digital_pen_status?></dd>
			  <dt>Digital Slate:</dt>
			  <dd><?= $teaching_data->digital_slate_status?></dd>
			  <dt>Presant Working as Teacher:</dt>
			  <dd><?= $teaching_data->full_time_teacher?></dd>
			  <dt>Working Time:</dt>
			  <dd><?= $teaching_data->opportunities?></dd>
			  <dt>Expecting hourly Pricing:</dt>
			  <dd><?= '$ '.$teaching_data->hourly_price.' || ₹ '.$teaching_data->hourly_price_inr?></dd>
			  <dt>Teaching Approach:</dt>
			  <dd><?= $teaching_data->teaching_approach?></dd>
            </dl>
			<?php }else{ ?>
			<dl class="dl-horizontal">
			<span style="color:red">No Teaching Experiences data</span>
			 </dl>
			<?php }?>
            <hr>
          </article>
		  <article>
            <h4>
									              <strong>Time slot Details</strong>
								            </h4>
            <hr>
						
            <table width="500" border="0" align="center" cellpadding="5">
			<thead>
			<th>Time zone</th><th>Days</th><th>From Time</th><th>To Time</th>
			</thead>
			<tbody>
			<?php foreach($timeslot_data as $row){?>
			<tr><td><?=$row->time_zone;?></td>
			<td><?php if($row->week=="Full Weak"){echo $row->week.'- Sunday to Saturday ';}if($row->week=="Weekdays"){echo $row->week.'- Monday to Saturday';}if($row->week=="Weekends"){echo $row->week.'- Saturday and Sunday';}?></td>
			<td><?= $row->from_time;?></td>
			<td><?= $row->to_time;?></td></tr>
			<?php } ?>
			</tbody>
			</table>
		<hr>
          </article>
		  
          <article>
            <h4>
									         <strong>Social links</strong>
								          </h4>
										  <hr>
            <dl class="dl-horizontal">
			  <dt>Facebook:</dt>
              <dd><?= $information_data->facebook_link;?></dd>
              <dt>Twitter:</dt>
              <dd><?=$information_data->twitter_link?></dd>
              <dt>Linkedin:</dt>
              <dd><?= $information_data->linkedin_link?></dd>
			  <dt>Youtube:</dt>
              <dd><?= $information_data->youtube_link?></dd>
            </dl>				 
          </article>
			<br>
          <article>
            <div class="pull-right">
              <a href="<?php echo base_url();?>admin/admin/active_tutor/<?php echo $information_data->tutor_id;?>" >
                <button type="button" class="btn btn-info">Active</button>
              </a>              
            </div>
          </article>
        </div>
      </section>
    </div>
  </div>
</div>