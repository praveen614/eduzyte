<!doctype html>
<?php
//$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$system_name  = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
?>

<html class="no-js" lang="">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>
        <?php echo 'Login'; ?> | <?php echo $system_name;?>
      </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

	   <link rel="shortcut icon" href="<?php echo base_url();?>uploads/logo.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/normalize.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/main.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/style.css">
      <script src="<?php echo base_url();?>assets/login_page/js/vendor/modernizr-2.8.3.min.js"></script>
		  <link href="https://fonts.googleapis.com/css/family=Quicksand:300,400,500,700" rel="stylesheet">

    </head>
    <body>
		<div class="main-content-wrapper">
			<div class="login-area">
				<div class="login-header">
					<a href="<?php echo base_url();?>login" class="logo">
					    
						<img src="<?php echo base_url();?>uploads/logo.png" height="60" alt="">
					</a>
				<h1 style="font-weight:200; margin:0px;"><?php echo ucfirst($system_name);?></h1>
				</div>
				<div class="login-content">
					<form method="post" role="form" id="form_login"
            action="<?php echo base_url();?>login/validate_login">
						<div class="form-group">
							<input type="text" class="input-field" name="email" placeholder="<?php echo 'Email';?>"
                required autocomplete="off" autofocus>
						</div>
						<div class="form-group">
							<input type="password" class="input-field" name="password" placeholder="<?php echo 'Password';?>"
                required>
						</div>
						<button type="submit" class="btn btn-success"><?php echo 'Login'; ?><i class="fa fa-lock"></i></button>
					</form>

					<div class="login-bottom-links">
						<a href="<?php echo base_url();?>login/forgot_password" class="link">
							<?php echo 'Forgot your Password ?'; ?> 
						</a>
					</div>
					<div class="login-bottom-links">
						<a href="<?php echo base_url();?>" class="link">
							<?php echo 'Back To Website '; ?> 
						</a>
					</div>
				</div>
			</div>
			<!--<div class="image-area"></div>-->
		</div>

    <script src="<?php echo base_url();?>assets/login_page/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-notify.js"></script>


    <?php if ($this->session->flashdata('login_error') != '') { ?>
      <script type="text/javascript">
        $.notify({
          // options
          title: '<strong><?php echo 'Error';?>!!</strong>',
          message: '<?php echo $this->session->flashdata('login_error');?>'
          },{
          // settings
          type: 'danger'
        });
      </script>
    <?php } ?>

    </body>
</html>
