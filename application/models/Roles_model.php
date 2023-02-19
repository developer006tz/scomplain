<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Roles_model extends CI_Model {
      public function get_error_message()
    {
        return $this->db->error()['message'];
    }
    public function insert_role($data)
    {
        $this->db->insert('roles', $data);
        $this->db->insert_id();
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            log_message('error', 'Error inserting Role data: ' . $this->db->error()['message']);
            return false;
        }
    }

    public function assign_role_to_user($role_id, $user_id)
    {
        $data = array(
            'role_id' => $role_id,
            'user_id' => $user_id
        );
        $this->db->insert('user_roles', $data);
        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            log_message('error', 'Error Assign role data: ' . $this->db->error()['message']);
            return false;
        }
    }

    public function get_all_roles()
    {
        $this->db->select('*');
        $this->db->from('roles');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_role_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('roles');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_role_by_name_and_desc($x,$y){
        $this->db->select('*');
        $this->db->from('roles');
        $this->db->where(['name'=> $x,'description'=>$y]);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function update_role($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('roles', $data);
        if ($this->db->error()['code'] == 0) {
                if ($this->db->affected_rows() == 1) {
                    // Update was successful and 1 row was affected
                    $result = array('status' => 'success', 'message' => 'Role data updated successfully');
                } else if ($this->db->affected_rows() == 0) {
                    // Update was successful but no rows were affected
                    $result = array('status' => 'warning', 'message' => 'No changes were made to the Role data');
                }
        } else {
            // Update failed
            log_message('error', 'Error updating Role data: ' . $this->db->error()['message']);
            $result = array('status' => 'error', 'message' => 'An error occurred while updating Role data');
        }

        return $result;
    }



    public function delete_role($role_id){
        $this->db->where('id', $role_id);
        $this->db->delete('roles');
        if ($this->db->affected_rows() == 1) {
                    // Update was successful and 1 row was affected
                    $result = array('status' => 'success', 'message' => 'Role data deleted successfully');
                } else{
                    // Update was successful but no rows were affected
                    // Update failed
                    log_message('error', 'Error deleting Role data: ' . $this->db->error()['message']);
                    $result = array('status' => 'error', 'message' => 'An error occurred while deleting Role data');
                } 
                 return $result;
        }


    }



