<script>
function login_status(){
swal({
title: "Login",
text: "Login before shortlist data",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "OK",
closeOnConfirm: false
},
function(){
	alert('ok');
window.location.href = "<?=base_url()?>existing_user";
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

</script>

<script>
$(document).ready(function(){
	$("#hide_shortlist").hide(); 
});
function shortlist_tutor(id,tutor_id,generated_id,name,image){
	
	$("#hide_shortlist").show(); 
	
	z='';
	zx=$('#'+generated_id).html();	
	if(zx == '' || zx == undefined){
	z +='<span id="'+generated_id+'"><a href="#" class="shimgremove" onclick=remove_shortlist("'+generated_id+'","'+tutor_id+'","'+name+'","'+image+'")><i class="fa fa-close"></i></a><img src="'+image+'" class="img-responsive img-circle res-mb-10" width="60" height="60"><small>'+name+'</small></span>';
	
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
	alert(x);
	if(x == ''){
		$("#hide_shortlist").hide();
	}
	
}
function loaddata(){	
	
        $(".cat1:hidden").slice(0, 1).slideDown();
        if ($(".cat1:hidden").length == 0) {
            $("#loadMore").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
}
$(function () {
    $(".cat1").slice(0, 1).show();	
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
					$(".cat1").slice(0, 1).show();
					
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
					$(".cat1").slice(0, 1).show();
					
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