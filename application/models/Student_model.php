<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_model
 *
 * @author Keshav K
 */
class Student_model extends CI_Model {

    public function add_student_m($user_information, $student_information) {

        $this->db->trans_start();

        $this->db->insert('tbl_users', $user_information);

        $user_id = $this->db->insert_id();

        $student_information['user_id'] = $user_id;

        $this->db->insert('tbl_student', $student_information);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function update_student_m($user_id, $user_information, $student_information) {

        $this->db->trans_start();

        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_users', $user_information);


        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_student', $student_information);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    
    public function delete_student($user_id) {
        
        $this->db->trans_start();
        
        $this->db->delete('tbl_student', array('user_id' => $user_id));
        $this->db->delete('tbl_users', array('user_id' => $user_id));
        
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function fetch_students($user_id = NULL) {

        if ($user_id != NULL) {
            $this->db->where('u.user_id', $user_id);
        }
        
        
        $this->db->join('tbl_student s', 'u.user_id = s.user_id');
        $this->db->join('tbl_departments d', 's.department = d.department_id');
        
        $query = $this->db->get('tbl_users u');

        if ($user_id == NULL) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }
}
