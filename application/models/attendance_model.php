<?php

/**
 * Description of attendance_model
 *
 * @author Happy
 */
class attendance_model extends CI_Model {

    function update_attendance($data) {
        if ($this->db->insert_batch('tbl_attendance', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function if_already_taken_m($faculty_id, $subject_id, $date) {
        $query = $this->db->get_where('tbl_attendance', array('faculty_id' => $faculty_id,
            'subject_id' => $subject_id,
            'date' => $date
        ));
        if($query->num_rows()>0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

}
