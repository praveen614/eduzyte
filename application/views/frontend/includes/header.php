<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>eduzyte</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico in the root directory -->
             <link rel="icon" href="<?=base_url()?>front_assets/img/logo/eduzyte2.png">
        <!-- all additional css -->
        <link rel="stylesheet" href="<?=base_url()?>front_assets/css/preloader.css">
		 <!--<link rel="stylesheet" href="<?=base_url()?>front_assets/css/chosen.css">
		 <link rel="stylesheet" href="<?=base_url()?>front_assets/css/prism.css"> -->
        <link rel="stylesheet" href="<?=base_url()?>front_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>front_assets/css/elements.css">
        <link rel="stylesheet" href="<?=base_url()?>front_assets/style.css?i=3">
        <link rel="stylesheet" href="<?=base_url()?>front_assets/responsive_custom.css?i=3">
		
        
        <link rel="stylesheet" href="<?=base_url()?>front_assets/dashboard.css">
        <link rel="stylesheet" href="<?=base_url()?>front_assets/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url()?>front_assets/css/bootstrap-select.css">
        <!-- modernizr js -->
		 <script src="<?=base_url()?>front_assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        
        <script src="<?=base_url()?>front_assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>       
			
     
	</head>
    <body>
	<?php $user_type = $this->session->userdata('user_type');?>
        
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- prelaoder start -->
        <!--     <div id="preloader-wrapper">
            <div class="preloader-wave-effect"></div>
        </div> -->
        <!-- prelaoder end -->
        <!-- page wrapper start -->
        <div id="page-top" class="wrapper">
            <!-- header area start -->
            <header class="header">
                <!-- <nav class="navbar navbar-fixed-top" data-spy="affix" data-offset-top="1" style="min-height: 130px;"> -->
                <nav class="navbar" style="min-height: 130px;">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" onClick="openNav()" aria-expanded="false">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?=base_url();?>"><img src="<?=base_url()?>front_assets/img/logo/eduzyte2.png" style="margin-left: 15px; height: 108px;" alt="logo" class="img-responsive"></a>
                        </div>
						
                        <div class="collapse navbar-collapse" id="navigation">
                            <span class="welcometxt" style="margin-top: 15px;">Welcome <?=$this->Front_end_model->get_session_name();?> |  Support: <span>+91 63 03 145 155</span>
                            <span class="appicons">
                                <strong>Download</strong> :
                                <a href="#"><img src="<?=base_url()?>front_assets/img/playstore.svg" width="22" height="22"></a>
                                <a href="#"><img src="<?=base_url()?>front_assets/img/apple.svg" width="22" height="22"></a>
                            </span>
                        </span>
                        <ul class="nav navbar-nav navbar-right hidden-xs">
                            <li class="<?=base_url();?>"><a href="<?=base_url();?>"><i class="fa fa-home fa-2x" style="position: relative;top:-5px;"></i></a></li>
                            
                            <li class="special"><a href="<?=base_url();?>search_a_tutor">Search A Tutor</a></li>
							
							<?php if($this->session->userdata('user_status') != 1){?>
								<li class="special special2"><a href="<?=base_url();?>become_a_tutor">Become A Tutor</a></li>
								<li class="special special2"><a href="<?=base_url();?>existing_user">Login / Register</a></li>
							<?php }else{ ?>
							<?php $user_otp=$this->db->where('id',$this->session->userdata('user_id'))->get($this->session->userdata('user_type'))->row()->otp_status; if($user_otp == 1){?>
								<li class="special special2"><a href="<?=base_url().$this->session->userdata('user_type').'_welcome'?>">Dashboard</a></li>
							<?php }else{ ?>
								<li class="special special2"><a href="<?=base_url();?>become_a_tutor">Become A Tutor</a></li>
							<?php }?>
								<li class="special special2"><a href="<?=base_url();?>user_logout">Logout</a></li>
							<?php }?>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="mySidenav" class="sidenav visible-xs">
                              <a href="javascript:void(0)" class="closebtn" onClick="closeNav()">&times;</a>
                              <ul type="none">
                                    <li><a href="<?=base_url();?>">Home</a></li> 
                                    <li><a href="<?=base_url();?>become_a_tutor">Become A Tutor</a></li> 
                                    <li><a href="<?=base_url();?>search_a_tutor">Search A Tutor</a></li> 
                                    <li><a href="<?=base_url();?>existing_user">Login</a></li> 
                                    <li><a href="<?=base_url();?>new_user">Register</a></li> 
                                </ul>
</div>
        </header>
        <nav class="social-sidebar hidden-xs" style="width:100px;">
            <ul>
                <li><a href="#dropup" class="dropup">Drop Us a Query <i class="fa fa-envelope"></i></a></li>
                <li><a href="<?=base_url();?>search_a_tutor">Need a Tutor <i class="fa fa-user"></i></a></li>
            </ul>
        </nav>
      <!--   <a href="#" class="drop_query_btn dropup" style="left: 0px;"><span class="drop_btn_txt">Drop Us a Query</span><span class="drop_icon_mail"></span></a>
             <a href="#" class="need_tutor_btn" style="left: 0px;"><span class="drop_btn_txt">Need a Tutor ?</span><span class="drop_icon_mail"></span></a> -->
        <!-- header area end -->