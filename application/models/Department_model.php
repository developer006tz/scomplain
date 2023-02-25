<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Department_model extends CI_Model
{

    public function get_error_message()
    {
        return $this->db->error()['message'];
    }
public function insert_department($data)
{
    $this->db->insert('department', $data);
    $this->db->insert_id();
    if ($this->db->affected_rows() == 1) {
        return true;
    } else {
        log_message('error', 'Error inserting Role data: ' . $this->db->error()['message']);
        return false;
    }
}

public function get_all_department(){
    $this->db->select('*');
        $this->db->from('department');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_department($dept_id)
    {
        $this->db->where('dept_id', $dept_id);
        $this->db->delete('department');
        if ($this->db->affected_rows() == 1) {
            $result = array('status' => 'success', 'message' => 'DEpartment data deleted successfully');
        } else {
            log_message('error', 'Error deleting Role data: ' . $this->db->error()['message']);
            $result = array('status' => 'error', 'message' => 'An error occurred while deleting Department data');
        }
        return $result;
    }


}