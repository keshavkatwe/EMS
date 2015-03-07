<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Faculty_model
 *
 * @author Keshav K
 */
class Faculty_model extends CI_Model{
    public function add_faculty_m($user_information, $faculty_information) {
        
        $this->db->insert('tbl_users', $user_information);
        
        $user_id = $this->db->insert_id();
        
        $faculty_information['user_id'] = $user_id;
        
        $this->db->insert('tbl_faculty', $faculty_information);
        
        return TRUE;
    }
}
