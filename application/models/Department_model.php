<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Department_model
 *
 * @author Keshav K
 */
class Department_model extends CI_Model{
    
    public function fetch_departments() {
        $query = $this->db->get('tbl_departments');
        return $query->result_array();
    }
}
