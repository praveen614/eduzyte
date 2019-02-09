
<div class="left-sidebar">
    <aside class="single-widget dashboard-side-menu">
        <h6 class="widget-title">Messages Menu</h6>
        <div class="widget-content categories-widget">
            <ul>
                <li <?php if ($page_name == 'tutor_messages') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_messages">Compose</a></li>
                <li <?php if ($page_name == 'tutor_messages_inbox') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_messages_inbox">Inbox(1)</a></li>
                <li <?php if ($page_name == 'tutor_messages_sent') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_messages_sent">Sent Messsages</a></li>
            </ul>
        </div>
    </aside>
</div>