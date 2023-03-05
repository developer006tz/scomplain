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
            $result = array('status' => 'success', 'message' => 'Department deleted successfully');
        } else {
            log_message('error', 'Error deleting Role data: ' . $this->db->error()['message']);
            $result = array('status' => 'error', 'message' => 'An error occurred while deleting Department data');
        }
        return $result;
    }

    public function get_department_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('department');
        $this->db->where('dept_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_dept($id, $data)
    {
        $this->db->where('dept_id', $id);
        $this->db->update('department', $data);
        if ($this->db->error()['code'] == 0) {
            if ($this->db->affected_rows() == 1) {
                $result = array('status' => 'success', 'message' => 'Department data updated successfully');
            } else if ($this->db->affected_rows() == 0) {
                $result = array('status' => 'warning', 'message' => 'No changes were made to the Department data');
            }
        } else {
            log_message('error', 'Error updating Department data: ' . $this->db->error()['message']);
            $result = array('status' => 'error', 'message' => 'An error occurred while updating Department data');
        }

        return $result;
    }


}