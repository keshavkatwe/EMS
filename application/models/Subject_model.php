<?php

/**
 * Description of Subject_model
 *
 * @author Happy
 */
class Subject_model extends CI_Model {

    function insert_subject($data) {
        if ($this->db->insert('tbl_subject', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit_subject_info($subject_id) {
        $query = $this->db->get_where('tbl_subject', array('subject_id' => $subject_id));
        return $query->row_array();
    }

    function update_subject($subject_id, $update_data) {
        $this->db->where('subject_id', $subject_id);
        if ($this->db->update('tbl_subject', $update_data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function subject_list() {
        $this->db->select("s.*, d.department_name");
        $this->db->from('tbl_subject s, tbl_departments d');
        $this->db->where("s.department = d.department_id");
        $query = $this->db->get();
        return $query->result_array();
    }

    function delete_subject_m($subject_id) {
        $this->db->where('subject_id', $subject_id);
        if ($this->db->delete('tbl_subject')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getSummary() {
        $this->db->select("s.*, d.department_name");
        $this->db->from('tbl_subject s, tbl_departments d');
        $this->db->where("s.department = d.department_id");
        $this->db->order_by("d.department_name");
        $this->db->order_by("s.semester");
        $query = $this->db->get();
        return $query->result_array();
    }

    function getDepartments() {
        $this->db->from('tbl_departments');
        $this->db->order_by("department_name");
        if($this->session->role_id == 2){
            $this->db->where("department_id",  $this->session->department);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function getSemSummary($dept_id, $sem) {
        $this->db->select("s.*, d.department_name,sm.faculty_id,u.user_id,u.first_name,u.last_name");
        $this->db->from('tbl_subject s, tbl_departments d');
        $this->db->join("tbl_faculty_sub_mapping sm", " sm.subject_id = s.subject_id", "LEFT");
        $this->db->join("tbl_faculty f", " f.faculty_id = sm.faculty_id", "LEFT");
        $this->db->join("tbl_users u", " u.user_id = f.user_id", "LEFT");
        $this->db->where("s.department = d.department_id");
        $this->db->where("s.department = {$dept_id}");
        $this->db->where("s.semester = {$sem}");
        $this->db->order_by("s.subject_name");
        $query = $this->db->get();
        return $query->result_array();
    }

}
