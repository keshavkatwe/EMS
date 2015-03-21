<?php
/**
 * Description of Report_model
 *
 * @author Happy
 */
class Report_model extends CI_Model{
    function getDepartments() {
        $this->db->from('tbl_departments');
        $this->db->order_by("department_name");
        if($this->session->role_id == 2){
            $this->db->where("department_id",  $this->session->department);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
}
