<?php

/**
 * Description of Report_model
 *
 * @author Happy
 */
class Report_model extends CI_Model {

    function getDepartments() {
        $this->db->from('tbl_departments');
        $this->db->order_by("department_name");
        if ($this->session->role_id == 2) {
            $this->db->where("department_id", $this->session->department);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function getIAReportData($filter_data) {
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

        $this->db->order_by("subject_type", "asc");
        $subject_query = $this->db->get_where('tbl_subject', array(
            'semester' => $filter_data['semester'],
            'department' => $filter_data['dept_id']
        ));

        $student_list = $student_query->result_array();
        $subject_list = $subject_query->result_array();

        $ia_report = array();
        $total_classes_taken = array();

        foreach ($student_list as $student) {


            $subjects = array();

            foreach ($subject_list as $subject) {
                $ia_query = $this->db->get_where('tbl_ia_marks', array(
                    'user_id' => $student['user_id'],
                    'subject_id' => $subject['subject_id']
                ));
                $ia_row = $ia_query->row_array();
                $subjects[] = $ia_row['ia_'.$filter_data['ia_type']];
            }
            $ia_report[] = $subjects;
        }

        $return_data = array(
            'student_list' => $student_list,
            'subject_list' => $subject_list,
            'ia_report' => $ia_report
        );

        return $return_data;
    }

}
