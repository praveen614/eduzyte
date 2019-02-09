<?php if($user_type == "tutor"){$ratting="student";$display="none";}else{$ratting="tutor";$display="";} ?>
<div class="dashboard-tabs-menu">
<ul class="nav nav-tabs nav-justified" role="tablist">
     <li><a href="<?=$user_type?>_personal_information" aria-controls="Profile" role="tab" target="_blank">View My Profile</a></li>
     <li <?php if ($page_name == 'tutor_dashboard' || $page_name == 'tutor_classes_schduled' || $page_name == 'tutor_classes_request_received' || $page_name == 'tutor_classes_request_sent' || $page_name == 'tutor_classes_completed') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_dashboard" aria-controls="Classes" role="tab" >My Classes</a></li>
     <li <?php if ($page_name == 'tutor_messages' || $page_name == 'tutor_messages_inbox' || $page_name == 'tutor_messages_sent' || $page_name == 'tutor_messages_documents' || $page_name == 'tutor_messages_documents_received' || $page_name == 'tutor_messages_chat_history') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_messages" aria-controls="Messages" role="tab" >Messages(1)</a></li>
     <li style="display:<?=$display?>" <?php if ($page_name == 'tutor_payments' || $page_name == 'tutor_payments_referrals') { ?>class="active"<?php } ?>><a href="<?=$user_type?>_payments" aria-controls="Payments" role="tab" >Payments</a></li>
     <li <?php if ($page_name == 'tutor_referrals' || $page_name == 'tutor_view_reffered' || $page_name == 'tutor_view_schemes') { ?>class="active"<?php } ?>><a href="<?=base_url()?><?=$user_type?>_referrals" aria-controls="Referrals" role="tab" >My Referrals</a></li>
     <li <?php if ($page_name == 'rate_your_student' || $page_name == 'ratings_by_student') { ?>class="active"<?php } ?>><a href="rate_your_<?=$ratting?>">Performance Ratings</a></li>
</ul>
</div>
