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
        $query = $this->db->get('tbl_subject');
        return $query->result_array();
    }

}