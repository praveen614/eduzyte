
<div class="left-sidebar">
    <aside class="single-widget dashboard-side-menu">
        <h6 class="widget-title">My Classes Menu</h6>
        <div class="widget-content categories-widget">
            <ul>
                <li <?php if ($page_name == 'tutor_dashboard') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_dashboard">Demo Class</a></li>
				<li <?php if ($page_name == 'tutor_demo_completed') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_demo_completed">Expired Demo Classes</a></li>
                <li <?php if ($page_name == 'tutor_classes_schduled') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_classes_schduled">Regular Classes</a></li>
                <li <?php if ($page_name == 'tutor_classes_completed') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_classes_completed">Expired Regular Classes</a></li>
            </ul>
        </div>
    </aside>
</div>