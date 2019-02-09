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
<title>Student view | eduzyte</title>

<div class="container">
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <section class="panel panel-default">
        <div class="panel-body">
          <article class="panel-body">
            <figure class="text-center">
              <img src="<?php echo base_url('uploads/student_profile/').$information_data->profile_image;?>" class="img-thumbnail img-circle img-responsive" alt="me">
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
									              <strong>Edcucation</strong>
								            </h4>
            <hr>
            <dl class="dl-horizontal">
			<?php foreach($education_data as $row){?>
              <dt><?=$row->qualification?></dt>
              <dd><?=$row->institution?>, <?=$row->subject?>, <?=$row->passout_year?></dd>
			<?php }?>
            </dl>
          </article>
		  <article>
            <h4>
									              <strong>Selected Subjects</strong>
								            </h4>
            <hr>
            <dl class="dl-horizontal">			
            <table width="500" border="0" align="center" cellpadding="5">
			<thead>
			<th>Study Level</th><th>Course</th><th>Subject</th><th>From - To time</th>
			</thead>
			<tbody>
			<?php foreach($subject_data as $row){?>
			<tr>
			<td><?= $this->db->where('id',$row->study_level_id)->get('study_level')->row()->study_level;?></td>			
			<td><?php echo $this->Home_model->sub_course_name($row->subject_course_id);?></td>
			<td><?php echo $this->Home_model->sub_course_name($row->subject_id);?></td>
			<td><?php echo $row->from_time.' - '.$row->to_time?></td>
			<?php } ?>
			</tr>
			</tbody>
			</table>
			</dl>
          </article>
          <article>
            <h4>
									              <strong>Social links</strong>
								            </h4>
            <hr>
            <dl class="dl-horizontal">
				<dt>Skype Id:</dt>
              <dd><?= $information_data->skype_id;?></dd>
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
               <a href="<?php echo base_url();?>admin/admin/active_student/<?php echo $information_data->student_id;?>" title="Yutna's Facebook">
                <button type="button" class="btn btn-info">Active</button>
              </a> 
            </div>
          </article>
        </div>
      </section>
    </div>
  </div>
</div>