        <div class="sidebar-menu" >
            <header class="logo-env" >
                <!-- logo -->
                <div class="logo" style="">
                    <a href="#">
                         <!--<img src="<?php echo base_url(); ?>uploads/logo.png"  style="max-height:60px;"/>-->
                       <h2 class="title" style="font-weight:200; margin:0px;"><?php echo $system_name;?></h2>
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse" style="">
                    <a href="#" class="sidebar-collapse-icon with-animation">

                        <i class="entypo-menu"></i>
                    </a>
                </div>

                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation">
                        <i class="entypo-menu"></i>
                    </a>
                </div>
            </header>

            <div style=""></div>
            <ul id="main-menu" class="" >

                 <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>admin/admin/dashboard">
                        <i class="fa fa-photo"></i>
                        <span><?php echo 'Dashboard'; ?></span>
                    </a>
                </li>
				 <li class="<?php if ($page_name == 'student_list') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>admin/admin/student">
                        <i class="fa fa-photo"></i>
                        <span><?php echo 'Student List'; ?></span>
                    </a>
                </li>
				<li class="<?php if ($page_name == 'student_request_class') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>admin/admin/student_request_data">
                        <i class="fa fa-photo"></i>
                        <span><?php echo 'Student Request Class'; ?></span>
                    </a>
                </li>

				<li class="<?php if ($page_name == 'tutor_list') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>admin/admin/tutor">
						<i class="fa fa-photo"></i>
						<span><?php echo 'Tutor List'; ?></span>
					</a>
				</li>
				
				<!--<li class="<?php if ($page_name == 'class_list' || $page_name == 'class_create') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>admin/admin/class_list">
						<i class="fa fa-photo"></i>
						<span><?php echo 'Testing Class'; ?></span>
					</a>
				</li>-->
				

                 <li class="<?php
                if ($page_name == 'create_main_class_id'|| $page_name == 'main_class_id_list' || $page_name == 'main_class_add' || $page_name == 'main_class_edit' || $page_name == 'main_class_list' ||  $page_name == 'main_tobe_expire' || $page_name == 'main_expired' || $page_name == 'create_demo_class_id'|| $page_name == 'demo_class_id_list' || $page_name == 'demo_class_add' || $page_name == 'demo_class_edit' || $page_name == 'demo_class_list' || $page_name == 'demo_tobe_expire' || $page_name == 'demo_expired')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'Schedule Class'; ?></span>
                    </a>
                   <ul>                    
                        <li class="<?php if ($page_name == 'create_demo_class_id'|| $page_name == 'demo_class_id_list' || $page_name == 'demo_class_add' || $page_name == 'demo_class_edit' || $page_name == 'demo_class_list' || $page_name == 'demo_tobe_expire' || $page_name == 'demo_expired') echo 'opened active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/admin/demo_class/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Demo Classes'; ?></span>
                            </a>
                            <ul class="" >
							
							<li class="<?php if ($page_name == 'create_demo_class_id'|| $page_name == 'demo_class_id_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/demo_class_id_list">
                                <span><i class="entypo-dot"></i> <?php echo 'Created Demo ID'; ?></span>
                            </a>
                        </li>
                                <li class="<?php if ($page_name == 'demo_class_add' || $page_name == 'demo_class_edit' || $page_name == 'demo_class_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/demo_class/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Created Demo Link'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'demo_tobe_expire' ) echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/tobe_exipred_demo">
                                <span><i class="entypo-dot"></i> <?php echo 'To Be Expired Demo'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'demo_expired' ) echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/exipred_demo">
                                <span><i class="entypo-dot"></i> <?php echo 'Expired Demo'; ?></span>
                            </a>
                        </li>
                             </ul> 
                        </li>

                        <li class="<?php if ($page_name == 'create_main_class_id'|| $page_name == 'main_class_id_list' || $page_name == 'main_class_add' || $page_name == 'main_class_edit' || $page_name == 'main_class_list' ||  $page_name == 'main_tobe_expire' || $page_name == 'main_expired') echo 'opened active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/main_class/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Main Classes'; ?></span>
                            </a>
                           <ul id=sub-menu" class="" >
								<li class="<?php if ($page_name == 'create_main_class_id'|| $page_name == 'main_class_id_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/main_class_id_list">
                                <span><i class="entypo-dot"></i> <?php echo 'Created main ID'; ?></span>
                            </a>
                        </li>
                                <li class="<?php if ($page_name == 'main_class_add' || $page_name == 'main_class_edit' || $page_name == 'main_class_list' ) echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/main_class/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Created Main'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'main_tobe_expire' ) echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/tobe_exipred_main">
                                <span><i class="entypo-dot"></i> <?php echo 'To Be Expired Main'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'main_expired' ) echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/live_classes/exipred_main">
                                <span><i class="entypo-dot"></i> <?php echo 'Expired Main'; ?></span>
                            </a>
                        </li>
                             </ul> 
                        </li>
                    </ul>

                </li>

                <!-- Home  Page -->
                <li class="<?php
                if ($page_name == 'frequently_searched_list' || $page_name == 'frequently_searched_add' || $page_name == 'home_content_list' ||  $page_name == 'home_content_edit' || $page_name == 'how_does_works' || $page_name == 'five_easy_steps_edit' || $page_name == 'five_easy_steps_list' || $page_name == 'advantages_list' || $page_name == 'advantages_edit' || $page_name == 'testimonials_list' || $page_name == 'testimonials_add' || $page_name == 'testimonials_edit')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'Home Page'; ?></span>
                    </a>
                    <ul>
                       <!--  <li class="<?php if ($page_name == 'frequently_searched_list' || $page_name == 'frequently_searched_add' || $page_name == 'frequently_searched_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/home_page/frequently_searched/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Frequently Searched'; ?></span>
                            </a>
                        </li> -->
                        <li class="<?php if ($page_name == 'home_content_list' || $page_name == 'home_content_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/home_page/home_content/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Home Content'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'how_does_works' ) echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/home_page/how_does_works/view">
                                <span><i class="entypo-dot"></i> <?php echo 'How Does It works'; ?></span>
                            </a>
                        </li>

                        <li class="<?php if ($page_name == 'five_easy_steps_edit' || $page_name == 'five_easy_steps_list') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/home_page/five_easy_steps/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Five Easy Steps'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'advantages_list' || $page_name == 'advantages_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/home_page/advantages/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Advantages'; ?></span>
                            </a>
                        </li>

                        <li class="<?php if ($page_name == 'testimonials_list' || $page_name == 'testimonials_add' || $page_name == 'testimonials_edit') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>admin/home_page/testimonials/view">
                        <span><i class="entypo-dot"></i> <?php echo 'Testimonials'; ?></span>
                    </a>
                </li>



                    </ul>

                </li>

                <!-- CMS pages -->

                <li class="<?php
                if ($page_name == 'about_us' ||  $page_name == 'our_values_edit'  || $page_name == 'terms_conditions' || $page_name == 'terms_conditions' || $page_name == 'privacy_policy' || $page_name == 'cancellation_refund')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'CMS Pages'; ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'about_us') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/about_us/view">
                                <span><i class="entypo-dot"></i> <?php echo 'About Us'; ?></span>
                            </a>
                        </li>
                         <li class="<?php if ($page_name == 'our_values_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/our_values/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Our Values'; ?></span>
                            </a>
                        </li>
                        <!-- <li class="<?php if ($page_name == 'feedback') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/home_page/feedback/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Feedback'; ?></span>
                            </a>
                        </li> -->
                        <li class="<?php if ($page_name == 'terms_conditions' ) echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/terms_conditions/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Terms & Conditions'; ?></span>
                            </a>
                        </li>

                        <li class="<?php if ($page_name == 'privacy_policy') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/cms_page/privacy_policy/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Privacy Policy'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'cancellation_refund') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/cancellation_refund/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Cancellation & Refund'; ?></span>
                            </a>
                        </li>



                    </ul>

                </li>

                <!-- Feedback -->

                <li class="<?php
                if ($page_name == 'feedback' ||  $page_name == 'feedback_questions_list'  || $page_name == 'feedback_questions_add' || $page_name == 'feedback_questions_edit' || $page_name == 'users_feedback' || $page_name == 'feedback_report')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'Feedback'; ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'feedback') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/feedback/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Feedback'; ?></span>
                            </a>
                        </li>
                         <li class="<?php if ($page_name == 'feedback_questions_list' || $page_name == 'feedback_questions_add' || $page_name == 'feedback_questions_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/feedback_questions/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Feedback Questions'; ?></span>
                            </a>
                        </li>

                        <li class="<?php if ($page_name == 'users_feedback' || $page_name == 'feedback_report') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/feedback_report">
                                <span><i class="entypo-dot"></i> <?php echo 'Feedback Report'; ?></span>
                            </a>
                        </li>

                    </ul>

                </li>

                 <!-- FAQ -->

                <li class="<?php
                if ($page_name == 'faq_add' ||  $page_name == 'faq_list'  || $page_name == 'faq_edit' || $page_name == 'sub_faq_list' || $page_name == 'feedback_report_list' || $page_name == 'sub_faq_add'|| $page_name == 'sub_faq_edit')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'FAQ'; ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'faq_list' || $page_name == 'faq_add' || $page_name == 'faq_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/faq/view">
                                <span><i class="entypo-dot"></i> <?php echo 'FAQ'; ?></span>
                            </a>
                        </li>
                         <li class="<?php if ($page_name == 'sub_faq_list' || $page_name == 'sub_faq_add' || $page_name == 'sub_faq_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/cms_page/sub_faq/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Sub FAQ'; ?></span>
                            </a>
                        </li>


                    </ul>

                </li>

				<!-- Course Pages -->

            <li class="<?php
                if ($page_name == 'study_level_add' ||  $page_name == 'study_level_list'  || $page_name == 'study_level_edit' || $page_name == 'from_level_list' ||  $page_name == 'from_level_add' || $page_name == 'from_level_edit' || $page_name == 'to_level_list' ||  $page_name == 'to_level_add' || $page_name == 'to_level_edit' || $page_name == 'course_list' ||  $page_name == 'course_add' || $page_name == 'course_edit' || $page_name == 'subject_list' ||  $page_name == 'subject_add' || $page_name == 'subject_edit' || $page_name == 'medium_list' ||  $page_name == 'medium_add' || $page_name == 'medium_edit' || $page_name == 'degree_list' ||  $page_name == 'degree_add' || $page_name == 'degree_edit' || $page_name == 'days_list' ||  $page_name == 'days_add' || $page_name == 'days_edit')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'Course Pages'; ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'study_level_add' ||  $page_name == 'study_level_list' ||  $page_name == 'study_level_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/study_level/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Study Level'; ?></span>
                            </a>
                        </li>
                         <!-- <li class="<?php if ($page_name == 'level_heading_list' ||  $page_name == 'level_heading_add' || $page_name == 'level_heading_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/level_heading/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Level Heading'; ?></span>
                            </a>
                        </li>
                       <li class="<?php if ($page_name == 'levels_list' ||  $page_name == 'levels_add' || $page_name == 'levels_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/levels/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Levels'; ?></span>
                            </a>
                        </li>-->
						<li class="<?php if ($page_name == 'from_level_list' ||  $page_name == 'from_level_add' || $page_name == 'from_level_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/from_level/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Level'; ?></span>
                            </a>
                        </li>
						<!--<li class="<?php if ($page_name == 'to_level_list' ||  $page_name == 'to_level_add' || $page_name == 'to_level_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/to_level/view">
                                <span><i class="entypo-dot"></i> <?php echo 'To Level'; ?></span>
                            </a>
                        </li>-->

                      <!--  <li class="<?php if ($page_name == 'course_list' ||  $page_name == 'course_add' || $page_name == 'course_edit') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/course_page/course/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Course'; ?></span>
                            </a>
                        </li>-->
                         <li class="<?php if ($page_name == 'subject_list' ||  $page_name == 'subject_add' || $page_name == 'subject_edit') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/subject/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Subjects'; ?></span>
                            </a>
                        </li>
						<li class="<?php if ($page_name == 'degree_list' ||  $page_name == 'degree_add' || $page_name == 'degree_edit') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/course_page/degree/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Degree'; ?></span>
                            </a>
                        </li>
						<li class="<?php if ($page_name == 'medium_list' ||  $page_name == 'medium_add' || $page_name == 'medium_edit') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/course_page/medium/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Medium'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'days_list' ||  $page_name == 'days_add' || $page_name == 'days_edit') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/course_page/days/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Days'; ?></span>
                            </a>
                        </li>


                    </ul>

                </li>
                <!--Requested subjects-->
                <li class="<?php
                if ($page_name == 'tutor_request_subject' || $page_name == 'tutor_request_degree' || $page_name == 'tutor_request_medium' ||  $page_name == 'student_request_subject')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'Requested Pages'; ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'tutor_request_subject') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/tutor_request/">
                                <span><i class="entypo-dot"></i> <?php echo 'Tutor subject Request'; ?></span>
                            </a>
                        </li>
						<li class="<?php if ($page_name == 'tutor_request_degree') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/tutor_request_degree/">
                                <span><i class="entypo-dot"></i> <?php echo 'Tutor Degree Request'; ?></span>
                            </a>
                        </li>
						<li class="<?php if ($page_name == 'tutor_request_medium') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/tutor_request_medium/">
                                <span><i class="entypo-dot"></i> <?php echo 'Tutor Medium Request'; ?></span>
                            </a>
                        </li>

                         <li class="<?php if ($page_name == 'student_request_subject') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/student_request/">
                                <span><i class="entypo-dot"></i> <?php echo 'Student Subject Request'; ?></span>
                            </a>
                        </li>

                    </ul>

                </li>
				<!--Dashboard Pages-->
                <li class="<?php
                if ($page_name == 'scheme_add' || $page_name == 'scheme_edit' || $page_name == 'scheme_list' || 
				$page_name == 'tutor_message_list' || $page_name == 'student_message_list' ||
				$page_name == 'tutor_rating_list' || $page_name == 'student_rating_list')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'Dashboard Pages'; ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'scheme_add' || $page_name == 'scheme_edit' || $page_name == 'scheme_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/scheme/view">
                                <span><i class="entypo-dot"></i> <?php echo 'Scheme Page'; ?></span>
                            </a>
                        </li>
						<li class="<?php if ($page_name == 'tutor_message_list' || $page_name == 'student_message_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/tutor_message">
                                <span><i class="entypo-dot"></i> <?php echo 'Messages'; ?></span>
                            </a>
                        </li>
						<li class="<?php if ($page_name == 'tutor_rating_list' || $page_name == 'student_rating_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/course_page/tutor_rating">
                                <span><i class="entypo-dot"></i> <?php echo 'Ratings'; ?></span>
                            </a>
                        </li>

                    </ul>

                </li>

				<!--country-->
				<li class="<?php if ($page_name == 'country_add' ||  $page_name == 'country_list'  || $page_name == 'country_edit') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>admin/cms_page/country/view">
                        <i class="fa fa-photo"></i>
                        <span><?php echo 'countries'; ?></span>
                    </a>
                </li>
				<!--currency-->
				<li class="<?php if ($page_name == 'currency_add' ||  $page_name == 'currency_list'  || $page_name == 'currency_edit') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>admin/cms_page/currency/view">
                        <i class="fa fa-photo"></i>
                        <span><?php echo 'Currency'; ?></span>
                    </a>
                </li>
				<!--Career-->
				<li class="<?php if ($page_name == 'career_add' ||  $page_name == 'career_list'  || $page_name == 'career_edit') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>admin/cms_page/career/view">
                        <i class="fa fa-photo"></i>
                        <span><?php echo 'Careers'; ?></span>
                    </a>
                </li>


                <!-- subscribe -->
                <li class="<?php if ($page_name == 'subscribe_list') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>admin/cms_page/subscribe">
                        <i class="fa fa-photo"></i>
                        <span><?php echo 'Subscribers'; ?></span>
                    </a>
                </li>


                <!-- SETTINGS -->
                <li class="<?php
                if ($page_name == 'contactus_edit' || $page_name == 'system_settings' ||  $page_name == 'upload_add' || $page_name == 'upload_edit' || $page_name == 'social_media_edit' || $page_name == 'last_logins' || $page_name == 'govt_id_add' ||  $page_name == 'govt_id_list'  || $page_name == 'govt_id_edit' || $page_name == 'address_prof_add' ||  $page_name == 'address_prof_list'  || $page_name == 'address_prof_edit')
                    echo 'opened active';
                ?>">
                    <a href="#">
                        <i class="entypo-lifebuoy"></i>
                        <span><?php echo 'Settings'; ?></span>
                    </a>
                    <ul>
                        <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/admin/system_settings">
                                <span><i class="entypo-dot"></i> <?php echo 'General Settings'; ?></span>
                            </a>
                        </li>
                       <li class="<?php if ($page_name == 'govt_id_add' ||  $page_name == 'govt_id_list'  || $page_name == 'govt_id_edit') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>admin/cms_page/government_id_prof/view">
								<span><i class="entypo-dot"></i><?php echo 'Government id prof'; ?></span>
							</a>
						</li>
                       <li class="<?php if ($page_name == 'address_prof_add' ||  $page_name == 'address_prof_list'  || $page_name == 'address_prof_edit') echo 'active'; ?>">
						<a href="<?php echo base_url(); ?>admin/cms_page/address_prof/view">
                        <span><i class="entypo-dot"></i><?php echo 'Address prof'; ?></span>
						</a>
						</li>
                        <li class="<?php if ($page_name == 'social_media_edit') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/admin/social_media/edit/1">
                                <span><i class="entypo-dot"></i> <?php echo 'Social Links'; ?></span>
                            </a>
                        </li>
                        <li class="<?php if ($page_name == 'last_logins') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/admin/last_logins">
                                <span><i class="entypo-dot"></i> <?php echo 'Logs'; ?></span>
                            </a>
                        </li>


                    </ul>
                    <li class="">
                    <a href="<?php echo base_url(); ?>admin/admin/database_backup">
                        <i class="fa fa-database"></i>
                        <span><?php echo 'Database Backup'; ?></span>
                    </a>
                </li>
                </li>


            </ul>

        </div>
