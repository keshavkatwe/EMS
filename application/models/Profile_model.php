<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile_model
 *
 * @author Keshav K
 */
class Profile_model extends CI_Model{
    
    public function get_user_m($user_id) {
        
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_users');
        return $query->row_array();
    }
    
    public function update_user_m($user_id, $user_information) {
        $this->db->where('user_id', $user_id);
        return $this->db->update('tbl_users', $user_information);
    }
    
}
