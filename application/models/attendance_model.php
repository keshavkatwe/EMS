<?php

/**
 * Description of attendance_model
 *
 * @author Happy
 */
class attendance_model extends CI_Model {

    function add_attendance($data) {
        if ($this->db->insert_batch('tbl_attendance', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function get_faculty_semesters_m() {
        $this->db->where('user_id', $this->session->user_id);
        $this->db->order_by('semester');
        $query = $this->db->get('tbl_faculty_sem_mapping');
        return $query->result_array();
    }
    
     public function faculty_info($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_faculty');
        return $query->row_array();
    }
    
     public function get_students($sem, $subject_id) {

        $faculty_info = $this->faculty_info($this->session->user_id);

        $condition = array(
            's.semester' => $sem,
            's.department' => $faculty_info['department'],
        );

        $this->db->where($condition);
        
        $this->db->join("tbl_ia_marks ism", "s.user_id = ism.user_id and ism.subject_id = {$subject_id}", "LEFT");
        $this->db->join("tbl_users u", "s.user_id = u.user_id", "LEFT");
        $this->db->order_by("s.roll_number","asc");
        $query = $this->db->get('tbl_student s');
        return $query->result_array();
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
