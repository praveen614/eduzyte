<style>
  label.error{
    color:red;
  }
</style>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>MY DASHBOARD</h2>
  </div>
</section>
<section id="app-about-area" class="ptb-30 dashboard profstep">
  <div class="container">  
        <div class="about-app mt-0">
          <?php include 'tutor_welcome.php';?>
          <div class="row">
            <div class="col-md-3">
                  <?php include 'payments_menu.php';?>
            </div>
            <div class="col-md-9">
               <?php include 'dashboard_tabmenu.php';?>
               <div class="mt-20">
                    <div class="row">
                      <div class="col-md-12">
                        <span class="btn btn-primary pull-right" style="line-height: 20px">
                      <small>Current balance: </small> <br>
                      <i class="fa fa-rupee fa-lg"></i> 1000/-
                    </span>
                      </div>
                    </div>
                    <div class="clear-fix"></div>
                    <hr>
					<form id="payment_form" method="post" action="">
                    <h4 class="blutxt">Make your payment now</h4>
                    <div class="row">
                      <div class="col-md-6"><input type="radio" name="make_payment" id="repeat_last">  Repeat last payment: <br>
                      <div class="form-group pt-10">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-rupee"></i></div>
                            <input type="text" readonly id="last_pay" value="123" name="last_payment" class="form-control input-lg" placeholder="0">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6"><input type="radio" name="make_payment" id="convenient">  Pay other amount as convenient: <br>
                      <div class="form-group pt-10">
                          <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-rupee"></i></div>
                            <input type="text" id="con_pay" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="convenient_payment" class="form-control input-lg" placeholder="0">
                          </div>
                        </div>
                      </div>
                    </div>
                    <h4 class="blutxt">Payment Mode</h4>
                    <input type="radio" name="payment_mode" value="card_banking">
                    <label for="">Credit/Debit Card/Internet Banking ( please use this option to pay in Indian Rupees [INR] only. ) </label> <br>
                    <input type="radio" name="payment_mode" value="paypal">
                    <label for="">PayPal ( please use this option to pay in all other currencies ) Currency conversion to USD is based on prevailing rates</label>
                    <hr>
                    <button type="submit" class="btn btn-primary pull-right">PAY NOW</button>
					</form>
               </div>
            </div>
          </div>
        </div>
  </div>
</section>                                       

<script type="text/javascript">
$('#repeat_last').change(function(){
    if ($('#repeat_last').is(':checked') == true){
        $('#con_pay').val('').prop('disabled', true);
		$('#last_pay').prop('disabled', false);
        console.log('checked');
    } else {
        $('#con_pay').val('').prop('disabled', false);
        console.log('unchecked');
    }
});
$('#convenient').change(function(){
    if ($('#convenient').is(':checked') == true){
        $('#last_pay').prop('disabled', true);
		$('#con_pay').val('').prop('disabled', false);
        console.log('checked');
    } else {
        $('#last_pay').val('').prop('disabled', false);
        console.log('unchecked');
    }
});

 // Setup form validation on the #register-form element
       $("#payment_form").validate ({
		   
             rules: {               
               make_payment:{ 
                  required:true
               },
			    convenient_payment:{ 
                  required:true
               },
			    payment_mode:{ 
                  required:true
               }
               }          
               
               
       });
	   
       
       </script>      