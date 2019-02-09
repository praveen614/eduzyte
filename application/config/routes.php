<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend';
$route['tutor_faq_page'] = 'frontend/tutor_faq_page';
$route['student_faq_page'] = 'frontend/student_faq_page';
$route['about_us'] = 'frontend/about_us';
$route['feedback'] = 'frontend/feedback';
$route['terms_and_conditions'] = 'frontend/terms_and_conditions';
$route['privacy_policy'] = 'frontend/privacy_policy';
$route['cancellation_refund'] = 'frontend/cancellation_refund';
$route['subscribe'] = 'frontend/subscribe';
$route['careers'] = 'frontend/career_page';
$route['careers_view/(:any)'] = 'frontend/career_page_view/$1';
$route['apply_post/(:any)'] = 'frontend/apply_post/$1';
$route['search_a_tutor'] = 'frontend/search_a_tutor';
$route['search_a_tutor/(:any)'] = 'frontend/search_a_tutor1/$1';
$route['search_a_tutor/course/(:any)'] = 'frontend/search_by_course/course/$1';
$route['tutor_view/(:any)'] = 'frontend/tutor_view/$1';
$route['become_a_tutor'] = 'frontend/become_a_tutor';
$route['new_user'] = 'frontend/register';
$route['existing_user'] = 'frontend/login';
$route['otp_verification/(:any)'] = 'frontend/otp/$1';
$route['user_logout'] = 'frontend/logout';
/*tutor controller pages*/
$route['tutor_welcome'] = 'tutor/tutor_page_check';
$route['tutor_page'] = 'tutor/content_page';
$route['tutor_personal_information'] = 'tutor/personal_information';
$route['tutor_subject'] = 'tutor/tutor_subject';
$route['tutor_subject_update/(:any)'] = 'tutor/tutor_subject_update/$1';
$route['tutor_subject_delete/(:any)'] = 'tutor/tutor_subject_delete/$1';
$route['tutor_qualifications'] = 'tutor/tutor_qualifications';
$route['tutor_degree_update/(:any)'] = 'tutor/tutor_degree_update/$1';
$route['tutor_degree_delete/(:any)'] = 'tutor/tutor_degree_delete/$1';
$route['tutor_teaching'] = 'tutor/tutor_teaching';
$route['tutor_time_slot'] = 'tutor/tutor_time_slot';
$route['tutor_timeslot_update/(:any)'] = 'tutor/tutor_timeslot_update/$1';
$route['tutor_timeslot_delete/(:any)'] = 'tutor/tutor_timeslot_delete/$1';
$route['tutor_final_step'] = 'tutor/tutor_final_step';
/*Tutor-Dashboard pages*/
$route['tutor_dashboard'] = 'tutor/tutor_dashboard';
$route['tutor_demo_completed'] = 'tutor/tutor_demo_completed';
$route['tutor_classes_schduled'] = 'tutor/tutor_classes_schduled';
$route['tutor_classes_completed'] = 'tutor/tutor_classes_completed';
$route['tutor_messages'] = 'tutor/tutor_messages';
$route['tutor_messages_inbox'] = 'tutor/tutor_messages_inbox';
$route['tutor_messages_sent'] = 'tutor/tutor_messages_sent';
$route['tutor_payments'] = 'tutor/tutor_payments';
$route['tutor_payments'] = 'tutor/tutor_payments';
$route['tutor_payments_referrals'] = 'tutor/tutor_payments_referrals';
$route['tutor_referrals'] = 'tutor/tutor_referrals';
$route['tutor_view_reffered'] = 'tutor/tutor_view_reffered';
$route['tutor_view_schemes'] = 'tutor/tutor_view_schemes';
$route['rate_your_student'] = 'tutor/rate_your_student';
$route['ratings_by_student'] = 'tutor/ratings_by_student';
$route['tutor_profile'] = 'tutor/tutor_profile';

/*student controller pages*/
$route['student_welcome'] = 'student/student_page_check';
$route['student_personal_information'] = 'student/student_personal_information';
$route['student_subject'] = 'student/student_subject';
$route['student_subject_update/(:any)'] = 'student/student_subject_update/$1';
$route['student_subject_delete/(:any)'] = 'student/student_subject_delete/$1';
$route['student_final_step'] = 'student/student_final_step';
/*Student-Dashboard pages*/
$route['student_dashboard'] = 'student/student_dashboard';
$route['student_demo_completed'] = 'student/student_demo_completed';
$route['student_classes_schduled'] = 'student/student_classes_schduled';
$route['student_classes_completed'] = 'student/student_classes_completed';
$route['student_messages'] = 'student/student_messages';
$route['student_messages_inbox'] = 'student/student_messages_inbox';
$route['student_messages_sent'] = 'student/student_messages_sent';
$route['student_payments'] = 'student/student_payments';
$route['student_payments'] = 'student/student_payments';
$route['student_payments_referrals'] = 'student/student_payments_referrals';
$route['student_referrals'] = 'student/student_referrals';
$route['student_view_reffered'] = 'student/student_view_reffered';
$route['student_view_schemes'] = 'student/student_view_schemes';
$route['rate_your_tutor'] = 'student/rate_your_tutor';
$route['ratings_by_tutor'] = 'student/ratings_by_tutor';
$route['student_profile'] = 'student/student_profile';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
