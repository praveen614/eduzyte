<div class="panel panel-primary request">
  <h4 class="panel-heading">Contact <?=$tutor_data->generated_id?></h4>
  <div class="panel-body">

    <form method="post" action="">
      <div class="row">

        <div class="col-md-12">
          <div class="form-group">
            <input type="text" class="form-control input-lg" placeholder="Name">
          </div>
          <div class="form-group">
            <input id="phone" type="tel" class="form-control input-lg" placeholder="Mobile Number">
          </div>
          <div class="form-group">
            <select class="form-control input-lg">
                            <option>Subjects</option>
                           
                            <option>Grade 12</option>
						   
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
          <textarea name="topic" class="form-control" style="resize:none" rows="5" placeholder="enter topic details..."></textarea>
          </div>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary p-b30 pull-right">Request Now</button> <br> <br>
        </div>
      </div>
    </form>
</div>
<div class="panel-footer">
  <h5 class="text-center">Need help finding tutors? <a href="<?=base_url()?>search_a_tutor">Click here</a> </h5>
</div>
</div>
<link rel="stylesheet" href="css/intlTelInput.css">
<script src="js/intlTelInput.js"></script>
<script>
    $('.timeset select').timezones();
    $("#phone,#phone1,#phone2").intlTelInput({
      utilsScript: "js/utils.js"
    });
</script>
