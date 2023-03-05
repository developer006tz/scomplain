<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Program_model extends CI_Model
{

    public function get_error_message()
    {
        return $this->db->error()['message'];
    }
public function insert_program($data)
{
    $this->db->insert('program', $data);
    $this->db->insert_id();
    if ($this->db->affected_rows() == 1) {
        return true;
    } else {
        log_message('error', 'Error inserting Role data: ' . $this->db->error()['message']);
        return false;
    }
}

public function get_all_program(){
    $this->db->select('*');
        $this->db->from('program');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_program($prog_id)
    {
        $this->db->where('prog_id', $prog_id);
        $this->db->delete('program');
        if ($this->db->affected_rows() == 1) {
            $result = array('status' => 'success', 'message' => 'program data deleted successfully');
        } else {
            log_message('error', 'Error deleting Role data: ' . $this->db->error()['message']);
            $result = array('status' => 'error', 'message' => 'An error occurred while deleting program data');
        }
        return $result;
    }

    public function get_program_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('program');
        $this->db->where('prog_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_dept($id, $data)
    {
        $this->db->where('prog_id', $id);
        $this->db->update('program', $data);
        if ($this->db->error()['code'] == 0) {
            if ($this->db->affected_rows() == 1) {
                $result = array('status' => 'success', 'message' => 'program data updated successfully');
            } else if ($this->db->affected_rows() == 0) {
                $result = array('status' => 'warning', 'message' => 'No changes were made to the program data');
            }
        } else {
            log_message('error', 'Error updating program data: ' . $this->db->error()['message']);
            $result = array('status' => 'error', 'message' => 'An error occurred while updating program data');
        }

        return $result;
    }


}