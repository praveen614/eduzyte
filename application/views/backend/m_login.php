<link href="<?=base_url() ?>assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">

    <div class="container">
        <center>
        <div class="card card-container col-md-4">
            
            <img id="profile-img" class="profile-img-card" src="<?=base_url() ?>assets/images/admin.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo form_open('','class="form-signin"'); ?>
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <?php echo form_error('email'); ?>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <?php echo form_error('password'); ?>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </center>
    </div><!-- /container -->