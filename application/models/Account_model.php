<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account_model
 *
 * @author Keshav K
 */
class Account_model extends CI_Model{
    
    public function login_m($credentials) {
        
//        $this->db->where($credentials);
//        
//        $query = $this->db->get('tbl_users');
//        
//        return $query->row_array();
        
        $this->db->select("u.*,f.faculty_id");
        $this->db->from("tbl_users as u");
        $this->db->join("tbl_faculty f", "u.user_id = f.user_id", "LEFT");
        $this->db->where($credentials);
        
        $query = $this->db->get();
        
        return $query->row_array();
        
    }
    
}
