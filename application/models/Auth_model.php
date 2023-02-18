<?php
class Auth_model extends CI_Model {


    public function get_error_message()
    {
        return $this->db->error()['message'];
    }
  public function register_user($data) {
    $this->db->insert('users', $data);
        if ($this->db->affected_rows() == 1) {
            // Insert successful
            return true;
        } else {
            // Insert failed, log error message
            log_message('error', 'Error inserting user data: ' . $this->db->error()['message']);
            return false;
        }
  }

    public function authenticate($username)
    {
        $query = $this->db->get_where('users', 'registration_number',$username, 1);

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    public function get_user_by_reg($reg)
    {
        $this->db->where('registration_number', $reg);
        $query = $this->db->get('users');
        return $query->row();
    }

}