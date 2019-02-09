<?php if($user_type == "tutor"){$ratting="student";}else{$ratting="tutor";}?>
<div class="left-sidebar">
    <aside class="single-widget dashboard-side-menu">
        <h6 class="widget-title">Performance Menu</h6>
        <div class="widget-content categories-widget">
            <ul>
                <li <?php if ($page_name == 'rate_your_student') { ?>class="active"<?php } ?>><a href="rate_your_<?=$ratting?>">Rate Your <?=$ratting?></a></li>
                <li <?php if ($page_name == 'ratings_by_student') { ?>class="active"<?php } ?>><a href="ratings_by_<?=$ratting?>">Ratings By <?=$ratting?></a></li>
            </ul>
        </div>
    </aside>
</div>