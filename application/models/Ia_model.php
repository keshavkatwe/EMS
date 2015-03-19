<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ia_model
 *
 * @author Keshav K
 */
class Ia_model extends CI_Model {

    public function get_faculty_semesters_m() {
        $this->db->where('user_id', $this->session->user_id);
        $this->db->order_by('semester');
        $query = $this->db->get('tbl_faculty_sem_mapping');
        return $query->result_array();
    }

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
        $this->db->select("*, (select count(*) from tbl_attendance ta where ta.subject_id = {$subject_id} and s.semester = {$sem} and ta.student_id = s.student_id and ta.status = 1) as present, (select count(*) from tbl_attendance ta where ta.subject_id = {$subject_id} and s.semester = {$sem} and ta.student_id = s.student_id and ta.status = 0) as absent");
        $query = $this->db->get('tbl_student s');
        return $query->result_array();
    }

    public function update_ia_marks($marks_data) {

        $this->db->trans_start();

        $condition = array(
            'user_id' => $marks_data['user_id'],
            'faculty_id' => $marks_data['faculty_id'],
            'subject_id' => $marks_data['subject_id'],
            'sem' => $marks_data['sem'],
        );

        $this->db->where($condition);
        $query = $this->db->get('tbl_ia_marks');
        if ($query->num_rows()) {
            $this->db->where($condition);
            $this->db->update('tbl_ia_marks', $marks_data);
        } else {
            $this->db->insert('tbl_ia_marks', $marks_data);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
