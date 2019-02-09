<style>
.cat1 {
display:none;
}

</style>

<!--<script src="<?=base_url()?>front_assets/js/yofinity.min.js"></script>-->
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>SEARCH A TUTOR</h2>
  </div>
</section>
<!-- blog area start -->

    <div id="blog-area" class="ptb-60 search-area">
        <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 <?php include 'search-all.php'?>
               </div>
            </div>
			<?php //echo"<pre>";print_r($tutors_list);?>

            <div class="row filter">
                 <div class="col-md-2 col-sm-6 col-xs-12"><div class="filterbox"><i class="fa fa-filter"></i> Filters Applied</div></div>
                 <div class="col-md-10 col-sm-6 col-xs-12 res-mt-10 filter_alert">

                 </div>
               </div>
            <div class="row">
                <div class="col-md-9 col-md-push-3 col-xs-12" id="filter_data">
				
				<?php if(!empty($tutors_list)){?>
                    <?php foreach($tutors_list as $row){
						if(!empty($row->profile_image)){
  							   $image_url=base_url()."uploads/tutor_profile/".$row->profile_image;
						   }else{
								   $image_url=base_url()."front_assets/img/tutor1.jpg";
							   }
							   if($this->session->userdata('user_status') ==1){
								   $message='<div class="col-md-4 col-sm-3"><a href="'.base_url().'tutor_view/'.$row->generated_id.'" class="grebtn res-mt-10">Message <i class="fa fa-angle-right"></i></a></div>';
									$load_more='<div align="center"><a role="button" onclick="loaddata()" id="loadmore" class="btn btn-default"><i class="fa fa-spinner fa-spin fa-fw"></i> LOAD MORE</a></div>';
								if($this->session->userdata('user_type') =='student'){
									$admin_status = $this->db->where('id',$this->session->userdata('user_id'))->get('student')->row()->admin_status;
									if($admin_status == 0){
										$request='<a  role="button" onclick="inactive_student()"  class="blubtn">Request Class<i class="fa fa-angle-right"></i></a>';
										$sld='<a  role="button" onclick="inactive_student()"  class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>';
									}else{
										$request='<div class="col-md-4 col-sm-3"><a role="button" onclick=fade_form("'.$row->id.'") class="grebtn res-mt-10">Request Class <i class="fa fa-angle-right"></i></a></div>';
									$sld='<a id="tutor_'.$row->id.'" role="button" onclick=shortlist_tutor(this.id,"'.$row->id.'","'.$row->generated_id.'","'.$row->first_name.'","'.$image_url.'") class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>';
									}
									}else{

										$request="";
										$sld='<a  role="button" onclick="login_type()"  class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>';
									}
									}else{
										$message='<div class="col-md-4 col-sm-3"><a role="button" onclick="login_status()" class="grebtn res-mt-10">Message <i class="fa fa-angle-right"></i></a></div>';
										$load_more='<div align="center"><a role="button" onclick="login_status()" id="loadmore" class="btn btn-default"><i class="fa fa-spinner fa-spin fa-fw"></i> LOAD MORE</a></div>';
										$request='';
										$sld='<a  role="button" onclick="login_status()"  class="blubtn">Shortlist this tutor <i class="fa fa-angle-right"></i></a>';

									}
							   ?>
                        <div class="tutorshoftprofilebox cat1">
                        <div class="row">
                          <div class="col-md-3 col-sm-3 col-xs-12" align="center"><img src="<?=$image_url?>" class="img-responsive img-thumbnail res-mb-10" width="170" height="170"></div>
                          <div class="col-md-9 col-sm-9 col-xs-12">
						  <div class="change_star">
                           <?=$sld?>
                            </div>

							<strong><?=$row->generated_id?></strong><small>(On Eduzyte since <?=date('M d, Y',strtotime($row->created_at))?>)</small>  <br>
                            <small>
                              <i class="fa fa-book"></i> <strong>Education :</strong> <?=$row->degree?>. from <?=$row->institution?> <br>
                              <i class="fa fa-clock-o"></i> <strong>Tutoring Experience :</strong> 9 Years 9 Months
                              <span class="pull-right"><i class="fa fa-clock-o"></i> <strong>Total Hours Taught on eduzyte :</strong> 1044 Hours</span><br>
                              <i class="fa  fa-hourglass-2"></i> <strong>Tutor Expertise :</strong> QuantitativeGMATCAT & 12 others
                            </small>
                             <div class="row">
                              <div class="col-md-8 col-sm-9">
                                <span>
                          <form method="get">
                            <fieldset class="rating">
                              <input type="radio" id="star5" name="rating" value="5" />
                              <label class = "full" for="star5" title="Awesome - 5 stars">
                              </label>
                              <input type="radio" id="star4half" name="rating" value="4.5" />
                              <label class="half" for="star4half" title="Pretty good - 4.5 stars">
                              </label>
                              <input type="radio" id="star4" name="rating" value="4" />
                              <label class = "full" for="star4" title="Pretty good - 4 stars">
                              </label>
                              <input type="radio" id="star3half" name="rating" value="3.5" />
                              <label class="half" for="star3half" title="Meh - 3.5 stars">
                              </label>
                              <input type="radio" id="star3" name="rating" value="3" />
                              <label class = "full" for="star3" title="Meh - 3 stars">
                              </label>
                              <input type="radio" id="star2half" name="rating" value="2.5" />
                              <label class="half" for="star2half" title="Kinda bad - 2.5 stars">
                              </label>
                              <input type="radio" id="star2" name="rating" value="2" />
                              <label class = "full" for="star2" title="Kinda bad - 2 stars">
                              </label>
                              <input type="radio" id="star1half" name="rating" value="1.5" />
                              <label class="half" for="star1half" title="Meh - 1.5 stars">
                              </label>
                              <input type="radio" id="star1" name="rating" value="1" />
                              <label class = "full" for="star1" title="Sucks big time - 1 star">
                              </label>
                              <input type="radio" id="starhalf" name="rating" value="0.5" />
                              <label class="half" for="starhalf" title="Sucks big time - 0.5 stars">
                              </label>
                            </fieldset>
                          </form>
                          <span class="tutrating">
                            4.5 Rating from 681 Classes
                          </span>
                        </span>
                              </div>
							  <?=$request?>
							  <?=$message?>
                            </div>
                          </div>
                        </div>
						<div class="col-md-9 col-sm-9 col-xs-12 request_form"  id="request_<?=$row->id?>">
					<form  id="request_form_<?=$row->id?>" class="form-horizontal">
					  <div class="form-group">
					  <input type="hidden" name="request_tutor_id" value="<?=$row->id?>" />
						<label for="inputEmail3" class="col-sm-2 control-label">Date</label>
						<div class="col-sm-10">
						  <input type="date" class="form-control date1" name="date" min="<?=date('Y-m-d',time() + 86400)?>" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Class Timing</label>
						<div class="col-sm-4">
						  <select class="form-control" name="from_time" onchange="get_to_time(this.value,<?=$row->id?>)" required>
								<option value="">--From--</option>
							 <?php for($i=0;$i<24;$i++){?>
								<option value="<?=$i;?>:00"><?=$i;?>:00</option>
								<option value="<?=$i;?>:30"><?=$i;?>:30</option>
							<?php } ?>
							</select>
						</div>
						<div class="col-sm-4">
						 <select name="to_time" id="to_time<?=$row->id?>" class="form-control" required>
								<option value="">--To--</option>

							</select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Course</label>
						<div class="col-sm-10">
						  <select class="form-control" name="course" required>
								<option value="">--select course--</option>
								<?php $c_list=$this->db->where('tutor_id',$row->id)->get('tutor_subjects')->result(); ?>
								<?php foreach($c_list as $course_list1){?>
								<!--<option value="<?=$course_list1->course_generate_id?>"><?=$course_list1->course?></option>-->
								<option value="<?=$course_list1->subject_id?>"><?= $this->Front_end_model->get_subject_name($course_list1->subject_id)?></option>
							<?php }?>
							</select>
						</div>
					  </div>
					   <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hour price</label>
						<div class="col-sm-10">
						<div class='col-md-3'>
						<select name="currency_type" class="form-control date1">
						<option value="dollar">$</option>
						<option value="inr">₹</option>
						</select>
						</div>
						<div class='col-md-9'>
						  <input type="tel" name="hour_price" class="form-control date1" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control input-lg" placeholder="expertise price per hour" max="5" required>
						</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="button" onclick="request_tutor('request_form_<?=$row->id?>')" class="btn btn-default">Save</button>
						</div>
					  </div>
					</form>
				</div>
                    </div>

                    <?php }?>
                  <?= $load_more?>
				<?php }else{?>
				<div class="tutorshoftprofilebox cat1 text-center">NO Tutor Found</div>
				<?php }?>

				</div>

                <!-- left sidebar -->
                <div class="col-md-3 col-md-pull-9 col-xs-12">
                  <?php include 'search-leftsidebar.php'?>
                </div>
                <!-- left sidebar end -->
            </div>
        </div>
    </div>
    <!-- blog area end -->
<!-- app about area start -->
<script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
<script>

function get_to_time(i,id){

				var t = i.split(':');

				var option ='';
				for(k=++t[0];k<24;k++){
					option += '<option>'+k+':'+t[1]+'</option>';
				}
				$('#to_time'+id).html(option);
			}


function login_status(){
swal({
title: "Login",
text: "Please Login To Continue",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "OK",
closeOnConfirm: false
},
function(){

window.location.href = "<?=base_url()?>existing_user";
});
}

function inactive_student(){
	swal({
		title: "Inactive",
		text: "Your profile is not Activated",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "OK",
		closeOnConfirm: false
	});
}

function login_type(){
	swal({
		title: "Teacher",
		text: "Student only can shortlist data",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "OK",
		closeOnConfirm: false
	});
}
/*
var dtToday = new Date();
 var month = dtToday.getMonth() + 1;
 var day = dtToday.getDate() + 1;
 var year = dtToday.getFullYear();
 if(month < 10) month = '0' + month.toString(); if(day < 10) day = '0' + day.toString();
 var maxDate = year + '-' + month + '-' + day;
 alert(maxDate);
 $('.date1').attr('min', maxDate);
*/
</script>

<script>
$(document).ready(function(){
	if(sessionStorage.getItem("session_course_id") != null){
	option="<option selected value='"+sessionStorage.getItem("session_course_id")+"'>"+sessionStorage.getItem("session_course_name")+"</option>";
	//alert(option);
	$('#course').append(option);
	$('#submit .item_filter').click();
	sessionStorage.removeItem('session_course_id');
	sessionStorage.removeItem('session_course_name');
	}
	$('.request_form').fadeOut();
	x=$('.add_shortlist').html();
	if(x == ''){
		$("#hide_shortlist").hide();
	}
});
function shortlist_tutor(id,tutor_id,generated_id,name,image){

	$("#hide_shortlist").show();

	z='';
	zx=$('#'+generated_id).html();
	if(zx == '' || zx == undefined){
	z +='<span id="'+generated_id+'"><a role="button" class="shimgremove" onclick=remove_shortlist("'+generated_id+'","'+tutor_id+'","'+name+'","'+image+'")><i class="fa fa-close"></i></a><img src="'+image+'" class="img-responsive img-circle res-mb-10" width="60" height="60"><small>'+name+'</small><input type="hidden" name="shortlist_tutor_id[]" value="'+tutor_id+'" /></span>';

	$('.add_shortlist').append(z);
	}
	star='<img src="<?=base_url()?>front_assets/img/typo_star.png" />';

	$('#'+id).html(star);
	$('#'+id).removeAttr('onclick');
	$('#'+id).attr('onclick','remove_shortlist("'+generated_id+'","'+tutor_id+'","'+name+'","'+image+'")');

}

function remove_shortlist(generated_id,tutor_id,name,image){


	$('#'+generated_id).remove();
	id="tutor_"+tutor_id;
	$('#'+id).removeAttr('onclick');
	star='Shortlist this tutor <i class="fa fa-angle-right"></i>';
	$('#'+id).html(star);
	$('#'+id).attr('onclick','shortlist_tutor(this.id,"'+tutor_id+'","'+generated_id+'","'+name+'","'+image+'")');
	x=$('.add_shortlist').html();

	if(x == ''){
		$("#hide_shortlist").hide();
	}

}
function loaddata(){

        $(".cat1:hidden").slice(0, 10).slideDown();
        if ($(".cat1:hidden").length == 0) {
            $("#loadMore").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
}
$(function () {
    $(".cat1").slice(0, 10).show();
});


</script>

<script>

	var country,gender,experience,age;
	$(function(){
		$('.item_filter').click(function(){

			var previous_data = $('.filter_alert').html('');

			 country = multiple_values('country');
			 gender  = multiple_values('gender');
			 experience=	multiple_values('experience');
			 age=multiple_values('age');
			 course=$('#course').val();

			 x='';
			 for(i=0;i<gender.length;i++){
				 x += '<div class="alert filtbtn" role="alert" aria-label="Close">'+gender[i]+'<a class="close" onclick=remove_filter("'+gender[i]+'") data-dismiss="alert">x</a></div>';
			 }
			 for(i=0;i<age.length;i++){
				 if(age[i] == '18'){
					  age1="18-30 years";
				 }
				 if(age[i] == '45'){
					  age1="31-45 years";
				 }
				 if(age[i] == '46'){
					  age1="46+ years";
				 }
				 x += '<div class="alert filtbtn" role="alert" aria-label="Close">'+age1+'<a class="close" onclick=remove_filter("'+age[i]+'") data-dismiss="alert">x</a></div>';
			 }
			 for(i=0;i<experience.length;i++){
				 x += '<div class="alert filtbtn" role="alert" aria-label="Close">'+experience[i]+' years <a class="close" onclick=remove_filter("'+experience[i]+'") data-dismiss="alert">x</a></div>';
			 }

			 $('.filter_alert').html(x);
            $.ajax({

				url:"<?=base_url()?>/frontend/filter_search",
				type:'post',
				data:{country:country,gender:gender,experience:experience,age:age,course:course},
				success:function(result){

					document.getElementById("filter_data").innerHTML = result;
					$(".cat1").slice(0, 10).show();

				}

			});
		});

	});

	function remove_filter(id){

		$("#"+id).prop("checked", false);
				var previous_data = $('.filter_alert').html('');

			 country = multiple_values('country');
			 gender  = multiple_values('gender');
			 experience=	multiple_values('experience');
			 age=multiple_values('age');
			 course=$('#course').val();

			 x='';
			 for(i=0;i<gender.length;i++){
				 x += '<div class="alert filtbtn" role="alert" aria-label="Close">'+gender[i]+'<a class="close" onclick=remove_filter("'+gender[i]+'") data-dismiss="alert">x</a></div>';
			 }
			 for(i=0;i<experience.length;i++){
				 x += '<div class="alert filtbtn" role="alert" aria-label="Close">'+experience[i]+' years <a class="close" onclick=remove_filter("'+experience[i]+'") data-dismiss="alert">x</a></div>';
			 }
			 for(i=0;i<age.length;i++){
				 if(age[i] == '18'){
					  age1="18-30 years";
				 }
				 if(age[i] == '45'){
					  age1="31-45 years";
				 }
				 if(age[i] == '46'){
					  age1="46+ years";
				 }
				 x += '<div class="alert filtbtn" role="alert" aria-label="Close">'+age1+'<a class="close" onclick=remove_filter("'+age[i]+'") data-dismiss="alert">x</a></div>';
			 }

			 $('.filter_alert').html(x);
            $.ajax({

				url:"<?=base_url()?>/frontend/filter_search",
				type:'post',
				data:{country:country,gender:gender,experience:experience,age:age,course:course},
				success:function(result){

					document.getElementById("filter_data").innerHTML = result;
					$(".cat1").slice(0, 10).show();

				}
			});
	}

	function multiple_values(inputclass){
		var val = new Array();
		$("."+inputclass+":checked").each(function() {
		    val.push($(this).val());
		});

		return val;
	}
</script>
<!--save short list to database-->
<script>
function save_shortlist(){
	 var name = $("input[name='shortlist_tutor_id[]']")
              .map(function(){return $(this).val();}).get();
			$.ajax({
				url:"<?=base_url()?>/frontend/save_shortlist",
				type:'post',
				data:{name:name},
				success:function(result){

					if(result=="success"){
					swal({
							title: "success",
							text: "successfully shortlisted data",
							type: "success",
							showCancelButton: false,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "OK"
					});}
					if(result=="failure"){
					swal({
							title: "Oops!",
							text: "somthing went wrong",
							type: "error",
							showCancelButton: false,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "OK"
					});}
				}
			});

}

</script>

<script>
function request_tutor(form_id){


		 request_tutor_id= $("#"+form_id+" input[name=request_tutor_id]").val();
		 from_time= $("#"+form_id+" select[name=from_time]").val();
		 to_time= $("#"+form_id+" select[name=to_time]").val();
		 course= $("#"+form_id+" select[name=course]").val();
		 currency_type= $("#"+form_id+" select[name=currency_type]").val();
		 hour_price= $("#"+form_id+" input[name=hour_price]").val();
		 if(from_time =="" || to_time =="" ||course ==""){
			 return false;
		 }


	$.ajax({
				url:"<?=base_url()?>/frontend/request_tutor",
				type:'post',
				data:{request_tutor_id:request_tutor_id,from_time:from_time,to_time:to_time,course:course,currency_type:currency_type,hour_price:hour_price},
				success:function(result){
					 if(result=="success"){
					swal({
							title: "success",
							text: "successfully Requested class",
							type: "success",
							showCancelButton: false,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "OK"

					});
					return false;
					}
					if(result=="failure"){
					swal({
							title: "Oops!",
							text: "You already send request to this Tutor",
							type: "error",
							showCancelButton: false,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "OK"

					});
					return false;
					}
				}
			});
		};



function fade_form(tutor_id){

	 $("#request_"+tutor_id).fadeToggle();
}

</script>
