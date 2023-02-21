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
        $this->load->helper('debug_helper');
        $this->data = array(
            '$url' => site_url(),
            'name'=> $this->session->userdata('user_name'),
            'stitle'=> 'SCP',
            'title'=>'scp'

        );
        
    }
    public function index()
    {
        check_login();
        $this->data = array(
            '$url' => site_url(),
            'title' => 'Welcome | dashboard',
            'content' => 'Hello, world!',
            'user'=> $this->session->userdata('user_id'),
            'name'=> $this->session->userdata('user_name'),
            'user_type' => $this->session->userdata('user_type'),
            'stitle' => 'NIT_SCP',
        );
        $this->parser->parse('includes/header', $this->data);
        $this->parser->parse('includes/sidemenu', $this->data);
        $this->parser->parse('includes/topmenu', $this->data);
        $this->parser->parse('includes/dashboard_menu', $this->data);
        $this->parser->parse('includes/_contents', $this->data);
        $this->parser->parse('includes/footer', $this->data);
    }

    public function permissions_add()
    {
        check_login();
        check_admin();
        $datas = array(
            'title' => 'User Permissions',
            'heading' => 'User Permissions',
            'sub-heading' => 'Add role',
            'user'=> $this->session->userdata('user_id'),
            'name'=> $this->session->userdata('user_name'),
            'user_type' => $this->session->userdata('user_type'),
        );

        $data = array_merge($this->data, $datas);

        $this->parser->parse('includes/header', $data);
        $this->parser->parse('includes/sidemenu', $data);
        $this->parser->parse('includes/topmenu', $data);
        $this->parser->parse('admin/permission-add', $data);//content
        $this->parser->parse('includes/footer', $data);
    }

    public function add_role()
{
    check_login();
    check_admin();
    $this->load->model('roles_model');

    // Insert new role into the roles table
    if($_POST){
        #check session user_type
        $name = $this->input->post('name');
        $desc = $this->input->post('description');
        if($this->session->userdata('user_type') == 'admin'){
            $role_data = array(
                'name' => $name,
                'description' => $desc
            );
            
            $insert_role = $this->roles_model->insert_role($role_data);
            $auto_role_id = $this->db->insert_id();
            $get_role_id = $this->roles_model->get_role_by_name_and_desc($name,$desc);
            if(!empty($get_role_id)){
                foreach($get_role_id as $role){
                    $role_id = $role->id;
                }
                if($role_id==$auto_role_id){
                    $role_id = $role_id;
                }else{
                    $role_id = $auto_role_id;
                }
            }else{
                $this->session->set_flashdata('error', 'Role id not found.');
            }
             // Associate role with a user in the user_roles table
            $user_id = $this->session->userdata('user_id'); // Replace with the ID of the user you want to associate the role with
            $result = $this->roles_model->assign_role_to_user($role_id, $user_id);

            // Display a success message
            if($result){
            $this->session->set_flashdata('success', 'Role added successfully.');
            }else{
                    $error_message = $this->roles_model->get_error_message();
                    $this->session->set_flashdata('error', 'Registration failed. ' . $error_message);
            }
            redirect('user/view-role');
            
            }else{
                $this->session->set_flashdata('error', 'You are not authorized to add role.');
                redirect('add-role');
            }
    
    

    // Associate role with a user in the user_roles table
    
}


}


public function view_roles(){
        check_login();
        check_admin();
   $this->load->model('roles_model');
    $data['title'] = 'User Roles';
    $data['page-heading'] = 'User Roles';
    $data['sub-heading'] = 'View roles';
    $data['roles'] = $this->roles_model->get_all_roles();
    //dd($data['roles']);
    $data = array_merge($this->data, $data);
    

    $this->parser->parse('includes/header', $data);
        $this->parser->parse('includes/sidemenu', $data);
        $this->parser->parse('includes/topmenu', $data);
        $this->parser->parse('admin/roles', $data);
        $this->parser->parse('includes/footer', $data);
    
}

public function edit_role($id){
    check_login();
    $this->load->model('roles_model');
    $id = $this->security->xss_clean($this->uri->segment(2));
    $data['title'] = 'Permission | Edit';
    $data['heading'] = 'Permission';
    $data['sub-heading'] = 'Edit permission';
    $data['role'] = $role =  $this->roles_model->get_role_by_id($id);
    if(!empty($role)){
       foreach($role as $r){
        $data['role_id'] = $r->id;
        $data['role_name'] = $r->name;
        $data['role_description'] = $r->description;
    } 
    }
    
    $data = array_merge($this->data, $data);
    

    $this->parser->parse('includes/header', $data);
        $this->parser->parse('includes/sidemenu', $data);
        $this->parser->parse('includes/topmenu', $data);
        $this->parser->parse('admin/permission-edit', $data);
        $this->parser->parse('includes/footer', $data);
}

public function update_role($id){
    check_login();
    check_admin();
    $id = $this->security->xss_clean($this->uri->segment(2));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
    if($_POST){
    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Role update failed. ' . validation_errors());
        redirect('edit-role/'.$id);
    }else{
    
    $data = array(
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description')
    );
    $this->load->model('roles_model');
    $result = $this->roles_model->update_role($id, $data);
    if($result['status'] == 'success'){
        $this->session->set_flashdata('success', 'Role updated successfully.');
        redirect('user/view-role'); 
    } else if ($result['status'] == 'warning') {
    // Update was successful but no rows were affected
    // Show warning message to user
    $this->session->set_flashdata('success', $result['message']);
     redirect('user/view-role');
    }
    else{
        log_message('error', $result['message']);
        $this->session->set_flashdata('error', $result['message']);
        redirect('edit-role/'.$id);
    }
     
    }
}
}

public function delete_role($role_id){
    check_login();
    check_admin();
    $role_id = $this->security->xss_clean($this->uri->segment(2));
    $this->load->model('roles_model');
    $result = $this->roles_model->delete_role($role_id);
    if($result){
        $this->session->set_flashdata('success', $result['message']);
        redirect('user/view-role');
    }else{
        log_error('error', $result['message']);
        $this->session->set_flashdata('error', $result['message']);
        redirect('user/view-role');
    }
}

}