<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected
            $data = Array();

    function __construct() {
        parent::__construct();
        /*$this->load->model('user/user_model');
        $this->load->model('admin/admin_model');
        $this->load->model('admin/table_model');
        $this->load->model('admin/employee_model');*/
        $this->data['not_required']     = array();
        //Script to generate days of the week starts here
        $timestamp                      = strtotime('next Sunday');
        $this->data['days_of_the_week'] = array();
        for ($i = 0; $i < 7; $i++)
            {
            $this->data['days_of_the_week'][] = date('D', $timestamp);
            $timestamp                        = strtotime('+1 day', $timestamp);
            }
        //Script to generate days of the week ends here
        /*$this->get_site_settings();
        $this->get_cms_pages();
        $this->icons();*/
    }

    /*function get_site_settings() {
        $this->data['site_settings'] = $this->user_model->get_site_settings();
    }

    function get_cms_pages() {
        $this->data['cms_pages'] = $this->user_model->get_cms_pages();
    }

    function icons() {
        $this->data['icons'] = $this->admin_model->getItems('icons');
    }

    function userProfile() {
        $this->data['profile'] = $this->user_model->get_my_profile();
    }

    function adminProfile() {
        $this->data['profile'] = $this->admin_model->get_my_profile();
    }

    function employeeProfile() {
        $this->data['profile'] = $this->employee_model->get_my_profile();
    }

    function get_default_titles_tag_lines($table_name) {
        $this->data['default_titles_tag_lines'] = $this->user_model->get_titles_tag_lines($table_name);
    }

    function get_titles_tag_lines($table_name) {
        $this->data['titles_tag_lines'] = $this->user_model->get_titles_tag_lines($table_name);
    }

    function get_news_scroller() {
        $this->data['news_scroller'] = $this->user_model->get_news_scroller();
    }

    function get_highlights() {
        $this->data['highlights'] = $this->user_model->get_highlights();
    }

    function get_thought_of_the_week() {
        $this->data['thought_of_the_week'] = $this->user_model->get_thought_of_the_week();
    }

    function get_latest_news() {
        $this->data['latest_news'] = $this->user_model->get_latest_news();
    }

    function get_videos() {
        $this->data['videos'] = $this->user_model->get_videos();
    }

    function get_facilities() {
        $this->data['facilities'] = $this->user_model->get_facilities();
    }

    function get_important_facts() {
        $this->data['important_facts'] = $this->user_model->get_important_facts();
    }

    function get_school_latest_news() {
        $this->data['school_latest_news'] = $this->user_model->get_school_latest_news();
    }

    function get_testimonials() {
        $this->data['testimonials'] = $this->user_model->get_testimonials();
    }

    function get_panorama_list() {
        $this->data['panorama'] = $this->user_model->get_panorama_list();
    }

    function get_events($limit = '') {
        $this->data['events'] = $this->user_model->get_events($limit);
    }

    function get_admissions_list() {
        $this->data['admissions_list'] = $this->user_model->get_admissions_list();
    }

    function get_academics_list() {
        $this->data['academics_list'] = $this->user_model->get_academics_list();
    }

    function get_infrastructure_list() {
        $this->data['infrastructure_list'] = $this->user_model->get_infrastructure_list();
    }

    function get_extracurricular_list() {
        $this->data['extracurricular_list'] = $this->user_model->get_extracurricular_list();
    }

    function get_current_city() {
        if ($this->session->userdata('city_master_id'))
            {
            $this->data['city_master_details'] = $this->user_model->get_city_master_details($this->session->userdata('city_master_id'));
            }
        else
            {
            $this->session->set_userdata('city_master_id', 1);
            $this->get_current_city();
            }
    }

    function user_view($view_file) {
        $this->get_site_settings();
        $this->get_current_city();
        $this->data['city_masters']     = $this->user_model->get_city_masters();
        $this->data['location_masters'] = $this->user_model->get_location_masters($this->data['city_master_details']->id);
        //$this->data['search_hints'] = $this->user_model->get_search_hints();
        $this->data['middle_ad_1']      = $this->admin_model->getItem('ads', 'position_type', 'MIDDLE_AD_1');
        $this->data['middle_ad_2']      = $this->admin_model->getItem('ads', 'position_type', 'MIDDLE_AD_2');
        $this->data['footer_ad']        = $this->admin_model->getItem('ads', 'position_type', 'FOOTER_AD');
        $this->data['left_ad_1']        = $this->admin_model->getItem('ads', 'position_type', 'LEFT_AD_1');
        $this->data['right_ad_1']       = $this->admin_model->getItem('ads', 'position_type', 'RIGHT_AD_1');
        $this->data['right_ad_2']       = $this->admin_model->getItem('ads', 'position_type', 'RIGHT_AD_2');
        $this->data['right_ad_3']       = $this->admin_model->getItem('ads', 'position_type', 'RIGHT_AD_3');

        $this->load->view('user/includes/header', $this->data);
        $this->load->view('user/' . $view_file, $this->data);
        $this->load->view('user/includes/footer', $this->data);
    }

    function admin_view($view_file) {
        $this->get_site_settings();
        $this->adminProfile();
        $this->load->view('admin/includes/head', $this->data);
        $this->load->view('admin/includes/sidebar_left', $this->data);
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/' . $view_file, $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    function employee_view($view_file) {
        $this->get_site_settings();
        $this->employeeProfile();
        $this->load->view('admin/includes/head', $this->data);
        $this->load->view('admin/includes/employee_sidebar_left', $this->data);
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/employee/' . $view_file, $this->data);
        $this->load->view('admin/includes/footer', $this->data);
    }

    function user_dashboard_view($view_file) {
        $this->get_site_settings();
        $this->userProfile();
        $this->load->view('user/includes/dashboard/header', $this->data);
        $this->load->view('user/' . $view_file, $this->data);
        $this->load->view('user/includes/dashboard/footer', $this->data);
    }

    function print_view($view_file) {
        $this->get_site_settings();
        $this->load->view('admin/includes/print_layouts/' . $view_file, $this->data);
    }*/
}
