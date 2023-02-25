<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start(); //we need to start session in order to access it through CI

class Department extends CI_Controller
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
            'stitle'=> 'SCP',
            'title'=>'scp',
            'user' => $this->session->userdata('user_id'),
            'name' => $this->session->userdata('user_name'),
            'user_type' => $this->session->userdata('user_type'),

        );
        
    }

    public function index(){
        $data = array(
            'heading'=>'Departments',
            'sub-heading' => 'View Departments'
        );
        $this->load->model('department_model');
        $data['department'] = $this->department_model->get_all_department();
        $data = array_merge($this->data,$data);
        $this->parser->parse('includes/header', $data);
        $this->parser->parse('includes/sidemenu', $data);
        $this->parser->parse('includes/topmenu', $data);
        $this->parser->parse('admin/department-view', $data);//content
        $this->parser->parse('includes/footer', $data);
    }

    public function delete_department($dept_id)
    {
        check_login();
        check_admin();
        $dept_id = $this->security->xss_clean($this->uri->segment(2));
        $this->load->model('department_model');
        $result = $this->department_model->delete_department($dept_id);
        if ($result) {
            $this->session->set_flashdata('success', $result['message']);
            redirect('departments');
        } else {
            log_error('error', $result['message']);
            $this->session->set_flashdata('error', $result['message']);
            redirect('departments');
        }
    }

    public function department_add()
    {
        $this->load->model('Department_model');
        $datas = array(
            'title' => 'DEPARTMENT',
            'heading' => 'DEPARTMENT',
            'sub-heading' => 'Add Department',      
        );
        if ($_POST) {
            
            if ($this->session->userdata('user_type') == 'admin') {
                $name = $this->input->post('name');
                $dept_code = $this->input->post('code');;
                $role_data = array(
                    'dept_code' => $dept_code,
                    'dept_name' => $name
                );

                $result = $this->Department_model->insert_department($role_data);
                
                if ($result) {
                    $this->session->set_flashdata('success', 'Department added successfully.');
                     redirect('departments');
                } else {
                    $error_message = $this->department_model-->get_error_message();
                    $this->session->set_flashdata('error', 'Registration failed. ' . $error_message);
                     redirect('add-department');
                }
            } else {
                $this->session->set_flashdata('error', 'You are not authorized to add role.');
                redirect('add-department');
            }

        }

        $data = array_merge($this->data, $datas);

        $this->parser->parse('includes/header', $data);
        $this->parser->parse('includes/sidemenu', $data);
        $this->parser->parse('includes/topmenu', $data);
        $this->parser->parse('admin/department-add', $data);
        $this->parser->parse('includes/footer', $data);
    }


}