<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start(); //we need to start session in order to access it through CI

class Complaint extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('auth_helper');
        $this->load->helper(array('url','form','file','download'));
        $this->load->library(array('session','parser','form_validation'));
        $this->load->helper('debug_helper');
        check_login();
        check_admin();
        $this->data = array(
            '$url' => site_url(),
            'name'=> $this->session->userdata('user_name'),
            'stitle'=> 'SCP',
            'title'=>'scp'

        );
        
    }

    public function index(){
        $data = array(
            'pagetitle'=>'Add Complain Type',
        );

        $data = array_merge($this->data,$data);
        $this->parser->parse('includes/header', $data);
        $this->parser->parse('includes/sidemenu', $data);
        $this->parser->parse('includes/topmenu', $data);
        $this->parser->parse('admin/complaint-add', $data);//content
        $this->parser->parse('includes/footer', $data);
    }


}