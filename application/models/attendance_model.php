<?php

/**
 * Description of attendance_model
 *
 * @author Happy
 */
class attendance_model extends CI_Model {

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
        $this->db->order_by("s.roll_number", "asc");
        $query = $this->db->get('tbl_student s');
        return $query->result_array();
    }

    function update_attendance($update_data, $attendance_id) {
        $this->db->where('attendance_id', $attendance_id);
        if ($this->db->update('tbl_attendance', $update_data)) {
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

    function getDeptReportData($filter_data) {
        $this->db->select("*");
        $this->db->from("tbl_student s");
        $this->db->join("tbl_users u", "u.user_id = s.user_id");
        $this->db->where("s.semester", $filter_data['semester']);
        $this->db->where("s.department", $filter_data['dept_id']);

        if ($filter_data['search_type'] == 1 and $filter_data['keyword'] != "") {
            $this->db->where("s.roll_number", $filter_data['keyword']);
        } else if ($filter_data['search_type'] == 2 and $filter_data['keyword'] != "") {
            $this->db->like('u.first_name', $filter_data['keyword']);
            $this->db->or_like('u.last_name', $filter_data['keyword']); 
        } else if ($filter_data['search_type'] == 3 and $filter_data['keyword'] != "") {
            $this->db->where("s.reg_number", $filter_data['keyword']);
        }
        $this->db->order_by("s.roll_number", "asc");
        $student_query = $this->db->get();

        $this->db->order_by("subject_code", "asc");
        $subject_query = $this->db->get_where('tbl_subject', array(
            'semester' => $filter_data['semester'],
            'department' => $filter_data['dept_id']
        ));

        $student_list = $student_query->result_array();
        $subject_list = $subject_query->result_array();

        $attendance_report = array();
        $total_classes_taken = array();
        $i = 0;
        foreach ($student_list as $student) {


            $subjects = array();
            $total_classes = array();

            foreach ($subject_list as $subject) {
                $present_attendance_query = $this->db->get_where('tbl_attendance', array(
                    'student_id' => $student['student_id'],
                    'subject_id' => $subject['subject_id'],
                    'status' => 1
                ));
                $present = $present_attendance_query->num_rows();
                $subjects[] = $present;

                if ($i == 0) {
                    $absent_attendance_query = $this->db->get_where('tbl_attendance', array(
                        'student_id' => $student['student_id'],
                        'subject_id' => $subject['subject_id'],
                        'status' => 0
                    ));
                    $absent = $absent_attendance_query->num_rows();
                    $total_classes[] = ( $present + $absent );
                }
            }
            $attendance_report[] = $subjects;
            if ($i == 0) {
                $total_classes_taken = $total_classes;
            }
            $i++;
        }

        $return_data = array(
            'student_list' => $student_list,
            'subject_list' => $subject_list,
            'attendance_report' => $attendance_report,
            'total_classes_taken' => $total_classes_taken
        );

        return $return_data;
    }

}