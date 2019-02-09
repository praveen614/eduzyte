<div class="left-sidebar">
    <aside class="single-widget dashboard-side-menu">
        <h6 class="widget-title">Referrals Menu</h6>
        <div class="widget-content categories-widget">
            <ul>
                <li <?php if ($page_name == 'tutor_referrals') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_referrals">Refer a Student</a></li>
                <li <?php if ($page_name == 'tutor_view_reffered') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_view_reffered">View Referred Students </a></li>
                <li <?php if ($page_name == 'tutor_view_schemes') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_view_schemes">View Schemes </a></li>
            </ul>
        </div>
    </aside>
</div>