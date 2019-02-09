<div class="left-sidebar">
    <aside class="single-widget dashboard-side-menu">
        <h6 class="widget-title">Payments Menu</h6>
        <div class="widget-content categories-widget">
            <ul>
                <li <?php if ($page_name == 'tutor_payments') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_payments">Make Payment</a></li>
                <li <?php if ($page_name == 'tutor_payments_referrals') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_payments_referrals">View Referral Credit </a></li>
            </ul>
        </div>
    </aside>
</div>