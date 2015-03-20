<?php

/**
 * Description of attendance_model
 *
 * @author Happy
 */
class Attendance_model extends CI_Model {

    public function get_faculty_subjects_m($sem) {

        $faculty_info = $this->faculty_info($this->session->user_id);


        $condition = array(
            's.semester' => $sem,
            'fm.faculty_id' => $faculty_info['faculty_id'],
            's.department' => $faculty_info['department']
        );

        $this->db->from('tbl_faculty_sub_mapping fm');
        $this->db->join("tbl_subject s", "fm.subject_id = s.subject_id", "LEFT");
        $this->db->where($condition);

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function faculty_info($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_faculty');
        return $query->row_array();
    }
    
    function add_attendance($data) {
        if ($this->db->insert_batch('tbl_attendance', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    function update_attendance($update_data,$attendance_id) {
        $this->db->where('attendance_id', $attendance_id);
        if($this->db->update('tbl_attendance', $update_data)){
            return TRUE;
        } 
        else{
            return FALSE;
        }
    }

    function if_already_taken_m($faculty_id, $subject_id, $date) {
        $query = $this->db->get_where('tbl_attendance', array('faculty_id' => $faculty_id,
            'subject_id' => $subject_id,
            'date' => $date
        ));
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_attendance_id($faculty_id, $subject_id, $date, $student_id) {
        $conditions = array(
            "faculty_id" => $faculty_id,
            "subject_id" => $subject_id,
            "student_id" => $student_id,
            "date" => $date
        );
        $this->db->select("a.attendance_id, a.status");
        $query = $this->db->get_where('tbl_attendance a', $conditions);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return NULL;
        }
    }

}
