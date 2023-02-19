<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('check_login')) {
    function check_login()
    {
        $CI = & get_instance();
        if (!$CI->session->userdata('logged_in')) {
            $CI->session->set_flashdata('error', 'Please log to continue !');
            redirect('login');
        }
    }
}

if (!function_exists('check_admin')) {
    function check_admin()
    {
        $CI = & get_instance();
        if ($CI->session->userdata('user_type') !== 'admin') {
            $CI->session->set_flashdata('error', 'An authorized url !');
            redirect('');
        }
    }
}