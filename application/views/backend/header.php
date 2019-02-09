<div class="row">
	<div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
	<h2 style="font-weight:200; margin:0px;"><?php echo $system_name;?></h2>
    </div>
	<!-- Raw Links -->
	<div class="col-md-12 col-sm-12 clearfix ">

        <ul class="list-inline links-list pull-left">
        <!-- Language Selector -->
        	<div id="session_static">
	           <li>
	           		<h4>
	           		
	           		</h4>
	           </li>
           </div>
        </ul>


		<ul class="list-inline links-list pull-right">

		<li class="dropdown language-selector">
			<!--<a href="<?php echo base_url();?>index.php/home" target="_blank">
				<i class="entypo-globe"></i> Website
			</a>-->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        	
													<?php
														$name = $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type').'_id' => $this->session->userdata('login_user_id')))->row()->name;
														echo $name;
													?>
													<i class="entypo-user"></i>
                    </a>

				<?php if ($account_type != 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					
					<li>
						<a href="<?php echo base_url();?>index.php/<?php echo $account_type;?>/manage_profile">
                        	<i class="entypo-key"></i>
							<span><?php echo 'Change_password';?></span>
						</a>
					</li>
				</ul>
				<?php endif;?>
				
			</li>

			<li>
				<a href="<?php echo base_url();?>index.php/login/logout">
					<?php echo 'Log out'; ?><i class="entypo-logout right"></i>
				</a>
			</li>
		</ul>
	</div>

</div>

<hr style="margin-top:0px;" />

<script type="text/javascript">
	function get_session_changer()
	{
		$.ajax({
            url: '<?php echo base_url();?>index.php/admin/get_session_changer/',
            success: function(response)
            {
                jQuery('#session_static').html(response);
            }
        });
	}
</script>
