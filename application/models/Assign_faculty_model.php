<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Assign_faculty_model
 *
 * @author Happy
 */
class Assign_faculty_model extends CI_Model {

    function load_information_m($dept, $sem) {
        $this->db->select("s.*");
        $this->db->from("tbl_subject as s");
        $this->db->where("s.department = {$dept}");
        $this->db->where("s.semester = {$sem}");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getDeptName($deptId) {
        $query = $this->db->get_where('tbl_departments', array('department_id' => $deptId));
        $result = $query->row_array();
        
        return $result['department_name'];
    }
    
    function getFaculties($dept, $sem) {
        $this->db->select("f.*, u.first_name, u.last_name");
        $this->db->from("tbl_faculty f");
        $this->db->join("tbl_faculty_sem_mapping sm","f.user_id = sm.user_id");
        $this->db->join("tbl_users u","u.user_id = f.user_id");
        $this->db->where("f.department = {$dept}");
        $this->db->where("sm.semester = {$sem}");
        $query = $this->db->get();
        return $query->result_array();
    }

}
