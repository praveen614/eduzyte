<!doctype html>
<html lang="en">
  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="<?=base_url() ?>assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
		<script src="<?=base_url() ?>assets/js/jquery-1.11.0.min.js"></script>
		<script src="<?=base_url() ?>assets/js/bootstrap.min.js"></script>

	</head>
	<body>
		<nav class="navbar navbar-default">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="<?=base_url() ?>main_admin/dashboard"><img src="<?php echo base_url('uploads/logo.png'); ?>" style="max-height:30px;"></a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="<?=base_url() ?>main_admin/review">Update Password</a></li>
	            <li><a href="<?=base_url() ?>main_admin/Categories">Logout</a></li>
	            
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
	    <div class="container">
	    	<div class="col-md-8">
	            <form class="form-horizontal" role="form" accept-charset="utf-8" action="" method="post">
	                <center><h2>College Registration</h2></center>
	                <div class="form-group">
	                    <label for="firstName" class="col-sm-3 control-label">College Name</label>
	                    <div class="col-sm-9">
	                        <input type="text" id="name" name="name" placeholder="College Name" class="form-control" autofocus required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="email" class="col-sm-3 control-label">Admin Email</label>
	                    <div class="col-sm-9">
	                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="email" class="col-sm-3 control-label">Admin Password</label>
	                    <div class="col-sm-9">
	                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="email" class="col-sm-3 control-label">URL Name</label>
	                    <div class="col-sm-9">
	                        <input type="text" id="url" name="url" placeholder="URL" class="form-control" required>
	                        <span class="text-primary"><?=base_url() ?>given college name</span>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="email" class="col-sm-3 control-label">Unique College Code</label>
	                    <div class="col-sm-9">
	                        <input type="text" id="code" name="code" placeholder="Code" class="form-control" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="col-sm-9 col-sm-offset-3">
	                        <button type="submit" class="btn btn-primary">Submit</button>
	                    </div>
	                </div>
	            </form>
	        </div>
    	</div>


	</body>
</html>