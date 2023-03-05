<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
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
            'title'=>'DEPARTMENT | SCP',
            'user' => $this->session->userdata('user_id'),
            'name' => $this->session->userdata('user_name'),
            'user_type' => $this->session->userdata('user_type'),

        );
        
    }

    public function index(){
        $data = array(
            'title'=>'PROGRAMMES | SCP',
            'heading'=>'Program',
            'sub-heading' => 'View Program'
        );
        $this->load->model('program_model');
        $data['program'] = $this->program_model->get_all_program();
        $data = array_merge($this->data,$data);
        $this->parser->parse('includes_/header', $data);
        $this->parser->parse('includes_/sidemenu', $data);
        $this->parser->parse('admin_/program/program', $data);
        $this->parser->parse('includes_/footer', $data);
    }

   

    public function add()
    {
        $this->load->model('program_model');
        $this->load->model('department_model');
        $data = array(
            'title' => 'program',
            'heading' => 'program',
            'sub-heading' => 'Add program',
            'btn-name'=>'Edit',
            'btn-back'=>'Cancel'      
        );
        $data['department'] = $this->department_model->get_all_department();
        
        $data['nta']=array('4'=>'NTA LEVEL 4','5'=>'NTA LEVEL 5','6'=>'NTA LEVEL 6','7'=>'NTA LEVEL 7','8'=>'NTA LEVEL 8');
        // dd($data['nta']);
        if ($_POST) {
            if ($this->session->userdata('user_type') == 'admin') {
                $role_data = array(
                    'prog_id' => $this->input->post('id'),
                    'prog_name' => $this->input->post('name'),
                    'capacity' => $this->input->post('capacity'),
                    'ntaLevel' => $this->input->post('nta'),
                    'department' => $this->input->post('dept'),
                );

                $result = $this->program_model->insert_program($role_data);
                
                if ($result) {
                    $this->session->set_flashdata('success', 'program added successfully.');
                     redirect('programs');
                } else {
                    $error_message = $this->program_model-->get_error_message();
                    $this->session->set_flashdata('error', 'Registration failed. ' . $error_message);
                     redirect('add-program');
                }
            } else {
                $this->session->set_flashdata('error', 'You are not authorized to add role.');
                redirect('add-program');
            }

        }

        $data = array_merge($this->data, $data);

        $this->parser->parse('includes_/header', $data);
        $this->parser->parse('includes_/sidemenu', $data);
        $this->parser->parse('admin_/program/add-program', $data);
        $this->parser->parse('includes_/footer', $data);
    }

    // edit program
    public function edit()
    {
        $this->load->model('program_model');
        $this->load->model('department_model');
        $data = array(
            'title' => 'EDIT | PROGRAM',
            'heading' => 'program',
            'sub-heading' => 'Edit program',
            'btn-name'=>'Edit',
            'btn-back'=>'Cancel'
        );

        check_login();
        $this->load->model('program_model');
        $id = $this->security->xss_clean($this->uri->segment(2));
       
        $data['nta']=array('4'=>'NTA LEVEL 4','5'=>'NTA LEVEL 5','6'=>'NTA LEVEL 6','7'=>'NTA LEVEL 7','8'=>'NTA LEVEL 8');
        $data['department'] = $this->department_model->get_all_department();
         $data['program'] = $program = $this->program_model->get_program_by_id($id);
        if (!empty($program)) {
            foreach ($program as $prog) {
                $data['prog_id'] = $prog->prog_id;
                $data['prog_name'] = $prog->prog_name;
                $data['capacity'] = $prog->capacity;
                $data['nta_old']= $nta_old = $prog->ntaLevel;
                $data['dept_old'] = $prog->department ;
            }
            if($nta_old =='4'){
                $data['nta_old_label']='NTA LEVEL 4';
            }
            if($nta_old =='5'){
                $data['nta_old_label']='NTA LEVEL 5';
            }
            if($nta_old =='6'){
                $data['nta_old_label']='NTA LEVEL 6';
            }
            if($nta_old =='7'){
                $data['nta_old_label']='NTA LEVEL 7';
            }
            if($nta_old =='8'){
                $data['nta_old_label']='NTA LEVEL 8';
            }
        }
        

        if ($_POST) {
            if ($this->session->userdata('user_type') == 'admin') {
                $name = $this->input->post('name');
                $dept_code = $this->input->post('code');
                
                $dept_data = array(
                    'dept_code' => $dept_code,
                    'dept_name' => $name
                );

                $result = $this->program_model->update_dept($id,$dept_data);

                if ($result['status'] == 'success') {
                    $this->session->set_flashdata('success', $result['message']);
                    redirect('programs');
                } else if($result['status']=='warning') {
                    $this->session->set_flashdata('success', $result['message']);
                    redirect('programs');
                    
                } else {
                    log_message('error', $result['message']);
                    $this->session->set_flashdata('error', $result['message']);
                    redirect('edit-program');
                }
            } else {
                $this->session->set_flashdata('error', 'You are not authorized to add role.');
                redirect('add-program');
            }

        }

        $data = array_merge($this->data, $data);

        $this->parser->parse('includes_/header', $data);
        $this->parser->parse('includes_/sidemenu', $data);
        $this->parser->parse('admin_/program/edit-program', $data);
        $this->parser->parse('includes_/footer', $data);
    }



     public function delete($prog_id)
    {
        
        check_login();
        check_admin();
        $prog_id = $this->security->xss_clean($this->uri->segment(2));
        $this->load->model('program_model');
        $result = $this->program_model->delete_program($prog_id);
        if ($result) {
            $this->session->set_flashdata('success', $result['message']);
            redirect('programs');
        } else {
            log_error('error', $result['message']);
            $this->session->set_flashdata('error', $result['message']);
            redirect('programs');
        }
    }

}