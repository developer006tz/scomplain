<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start(); //we need to start session in order to access it through CI

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form','file','download','cookie'));
        $this->load->helper('debug_helper');
        $this->load->library(array('session','parser','form_validation'));
        
    }
    public function index()
    {
        $this->data = array(
            '$url' => site_url(),
            'title' => 'login | Student Complaints Portal',
        );

        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('user_type') == 'student') {
                redirect('dashboard');
            } elseif ($this->session->userdata('user_type') == 'lecture') {
                redirect('dashboard');
            } elseif ($this->session->userdata('user_type') == 'admin') {
                redirect('dashboard');
            }
        }
        $this->parser->parse('auth/login', $this->data);
    }

    public function process_login()
    {
        // Get the username and password from the POST data
        if($_POST){
        $username = $this->input->post('name');
        $password = $this->input->post('password');

        // Attempt to authenticate the user
        $this->load->model('Auth_model');

            
            $user = $this->Auth_model->get_user_by_reg($username);

            if (!$user) {
                // The user does not exist
                $this->session->set_flashdata('error', 'Invalid email or password.');
                redirect('login');
            }else {
                $hashed_password = $user->password;
                if (password_verify($password, $hashed_password)) {
                    // The password is correct
                    // Set the session data and redirect to the appropriate dashboard based on the user's type
                    // Set the session variables
                    if ($this->input->post('remember')) {
                        set_cookie('name', $this->input->post('name'), 3600 * 24 * 30); // Expires in 30 days
                        set_cookie('password', $this->input->post('password'), 3600 * 24 * 30); // Expires in 30 days
                        //$this->cookie->delete_cookie('name');  reserved if needed
                    }else{
                        delete_cookie('name');
                        delete_cookie('password');
                    }
                    
                    $this->session->set_flashdata('success', 'Login successful.');
                    $session_data = array(
                        'user_id' => $user->id,
                        'user_reg' => $user->registration_number,
                        'user_type' => $user->user_type,
                        'user_name' => $user->name,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($session_data);

                    // Redirect to the appropriate dashboard
                    if ($user->user_type == 'student') {
                        redirect('dashboard');
                    } elseif ($user->user_type == 'admin') {
                        redirect('dashboard');
                    } elseif ($user->user_type == 'lecture') {
                        redirect('dashboard');
                    }
                } else {
                    // The password is incorrect
                    $this->session->set_flashdata('error', 'Invalid email or password.');
                    redirect('login');
                }
            }
            
        
        }
    }

    public function logout()
    {
        // Destroy the session and redirect to the login form
        $this->session->sess_destroy();
        redirect('login');
    }


    public function register(){
        $this->load->library('session');
        $this->data = array(
            '$url' => site_url(),
            'title' => 'Register',
        );
        
        if($_POST){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('reg', 'Registration Number', 'required|is_unique[users.registration_number]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('re_pass', 'Repeat Password', 'required|matches[password]');

        // If the form inputs are not valid, show an error message
        if ($this->form_validation->run() == FALSE) {
                // dd('i am am stuck here');
                // exit;
            $this->session->set_flashdata('error', validation_errors());
                $this->session->set_flashdata('toastr_message', validation_errors());
                $this->session->set_flashdata('toastr_type', 'success');
            redirect('register'); // Replace with your register form URL
        } else {
               
            // If the form validation passes, insert the user into the database using the Auth_model
            $this->load->model('Auth_model');
            
            $data = array(
                'registration_number' => $this->input->post('reg'),
                'name' => $this->input->post('name'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            $result = $this->Auth_model->register_user($data);

            if ($result) {
                
                $this->session->set_flashdata('success', 'Registration successful');
                redirect('login'); // Replace with your login form URL
            } else {
                    $error_message = $this->Auth_model->get_error_message();
                    $this->session->set_flashdata('error', 'Registration failed. ' . $error_message);
                     redirect('register'); // Replace with your register form URL
            }
        }
        }

        $this->parser->parse('auth/register', $this->data);

    }
}