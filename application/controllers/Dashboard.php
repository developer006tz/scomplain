<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start(); //we need to start session in order to access it through CI

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('auth_helper');
        $this->load->helper(array('url','form','file','download'));
        $this->load->library(array('session','parser','form_validation'));
        $this->data = array(
            '$url' => site_url(),
        );
        
    }
    public function index()
    {
        check_login();
        $this->data = array(
            '$url' => site_url(),
            'page_title' => 'test',
            'content' => 'Hello, world!',
            'user'=> $this->session->userdata('user_id'),
            'name'=> $this->session->userdata('user_name'),
            'user_type' => $this->session->userdata('user_type'),
            'stitle' => 'NIT_SCP',
        );
        // $this->load->view('includes/header');
        // $this->load->view('includes/sidemenu');
        // $this->load->view('dashboard');
        $this->parser->parse('includes/header', $this->data);
        $this->parser->parse('includes/sidemenu', $this->data);
        $this->parser->parse('includes/topmenu', $this->data);
        $this->parser->parse('includes/dashboard_menu', $this->data);
        $this->parser->parse('includes/_contents', $this->data);
        $this->parser->parse('includes/footer', $this->data);
    }
}