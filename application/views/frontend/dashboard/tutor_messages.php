<style>
  label.error{
    color:red;
  }
</style>
<?php if($user_type == "tutor"){$ratting="student";}else{$ratting="tutor";}?>
<section id="slider-area" class="home-style-3 blue-grad-bg particle-bg">
  <div id="overlay"></div>
  <div class="img"></div>
  <div class="subbgheader">
    <h2>MY DASHBOARD</h2>
  </div>
</section>
		  
<section id="app-about-area" class="ptb-30 dashboard">
  <div class="container">  
        <div class="about-app mt-0">
          <?php include 'tutor_welcome.php';?>
		  <?php if($this->session->flashdata('page_success')){?>
          <div class="alert alert-success alert-dismissible fade in mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle fa-lg"></i> <?=$this->session->flashdata('page_success');?>
          </div>
          <?php }?>
          <div class="row">
            <div class="col-md-3">
                  <?php include 'messages_menu.php';?>
            </div>			
            <div class="col-md-9">
               <?php include 'dashboard_tabmenu.php';?>	
			   
               <form method="post" action="" id="message_form" class="form-horizontal mt-20 profstep">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">To: </label>
                    <div class="col-sm-10">
                      <select name="send_id" id="" class="form-control input-lg seexam">
                        <option value="">Choose <?=ucfirst($ratting)?></option>
						 <?php foreach($users_list as $user){?>
						<option value="<?=$user->user->id;?>"><?=$user->user->name;?></option>						
						 <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Subject:</label>
                    <div class="col-sm-10">
                      <input type="text" name="subject" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Message:</label>
                    <div class="col-sm-10">
                      <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <button  class="btn btn-primary pull-right" type="submit">Send Message</button>
                  </div>
               </form>
               <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger text-center">
                    <strong>Note:</strong> All the messages will be delivered to the tutors after approved by Eduzyte admin and if messages contains any inappropriate words, contact details will not be delivered and same will be displayed on ‘Rejected Mails’
                  </div>
            </div>
          </div>
            </div>
          </div>
        </div>
  </div>
</section>      

<script type="text/javascript">

 // Setup form validation on the #register-form element
       $("#message_form").validate ({
		   
             rules: {               
               send_id:{ 
                  required:true
               },
			    subject:{ 
                  required:true
               },
			    message:{ 
                  required:true
               }
               }          
               
               
       });
       
       </script>                                 
