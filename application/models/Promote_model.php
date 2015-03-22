<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Promote_model
 *
 * @author Keshav K
 */
class Promote_model extends CI_Model{
    
    public function get_students_m($sem, $department) {

        $condition = array(
            's.semester' => $sem,
            's.department' => $department
        );

        $this->db->where($condition);
        
        $this->db->join("tbl_users u", "s.user_id = u.user_id", "LEFT");
        
        $this->db->order_by("roll_number","asc");
        
        $query = $this->db->get('tbl_student s');
        return $query->result_array();
    }
    
    
    public function promote_students($active_students, $inactive_students, $sem) {
        
        if(count($active_students))
        {
            $this->db->where_in('student_id', $active_students);
            $this->db->update('tbl_student', array('is_active' => TRUE, 'semester' => ($sem + 1)));
        }
        
        if(count($inactive_students))
        {
            $this->db->where_in('student_id', $inactive_students);
            $this->db->update('tbl_student', array('is_active' => FALSE));
        }
        return TRUE;
    }
    
}
