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

        if ($this->session->role_id == 1 and $filter_data['subject_id'] == "") {
            
        } else {
            $this->db->where('subject_id', $filter_data['subject_id']);
        }

        $this->db->order_by("subject_type", "asc");
        $subject_query = $this->db->get_where('tbl_subject', array(
            'semester' => $filter_data['semester'],
            'department' => $filter_data['dept_id']
        ));

        $student_list = $student_query->result_array();
        $subject_list = $subject_query->result_array();

        $tooltip_details = array();
        $ia_report = array();
        $total_classes_taken = array();

        foreach ($student_list as $student) {


            $tooltip = array();
            $subjects = array();

            foreach ($subject_list as $subject) {
                $ia_query = $this->db->get_where('tbl_ia_marks', array(
                    'user_id' => $student['user_id'],
                    'subject_id' => $subject['subject_id']
                ));
                $ia_row = $ia_query->row_array();
                
                $this->db->from("tbl_attendance a, tbl_student s, tbl_users u");
                $this->db->where("s.user_id = u.user_id");
                $this->db->where("a.student_id = s.student_id");
                $this->db->where("u.user_id",$student['user_id']);
                $this->db->where("a.subject_id",$subject['subject_id']);
                $this->db->where("a.status",1);
                $p_attendance_query = $this->db->get();
                $present = $p_attendance_query->num_rows();
                
                $this->db->from("tbl_attendance a, tbl_student s, tbl_users u");
                $this->db->where("s.user_id = u.user_id");
                $this->db->where("a.student_id = s.student_id");
                $this->db->where("u.user_id",$student['user_id']);
                $this->db->where("a.subject_id",$subject['subject_id']);
                $this->db->where("a.status",0);
                $attendance_query = $this->db->get();
                $absent = $attendance_query->num_rows();

                
                $total_class = $present+$absent;
                if($total_class!=0){
                    $avg_attendance = ($present/$total_class) * 100;
                }
                else{
                    $avg_attendance = 0;
                }
                
                
                
                $attendance_marks = 0;
                if ($avg_attendance > 95)
                    $attendance_marks = 5;
                else if ($avg_attendance > 85 && $avg_attendance <= 95)
                    $attendance_marks = 4;
                else if ($avg_attendance > 75 && $avg_attendance <= 85)
                    $attendance_marks = 3;
                else if ($avg_attendance > 60 && $avg_attendance <= 75)
                    $attendance_marks = 2;
                else if ($avg_attendance <= 60)
                    $attendance_marks = 0;

                $type = $subject['subject_type'];

                $ia1 = round($ia_row['ia_1'], 1);
                $ia2 = round($ia_row['ia_2'], 1);
                $ia3 = round($ia_row['ia_3'], 1);

                if ($filter_data['ia_type'] != 0) {
                    $subjects[] = $ia_row['ia_' . $filter_data['ia_type']];
                } else {
                    if ($type == 1) {
                        $avg = array($ia1, $ia2, $ia3);
                        rsort($avg);
                        $average = round(($avg[0] + $avg[1]) / 2);
                        $tooltip[] = 'IA-I: ' . $ia1 . ' IA-II: ' . $ia2 . ' IA-III: ' . $ia3 . ' Avg: ' . $average.' AT: '.$attendance_marks;

                        $subjects[] = $average+$attendance_marks;
                    } else {
                        $avg = array($ia1, $ia2);
                        rsort($avg);
                        $average = $avg[0] + $ia3;
                        $tooltip[] = 'IA-I: ' . $ia1 . ' IA-II: ' . $ia2 . ' Records: ' . $ia3 . ' Avg: ' . $average.' AT: '.$attendance_marks;
                        $subjects[] = $average+$attendance_marks;
                    }
                }
            }
            $ia_report[] = $subjects;
            $tooltip_details[] = $tooltip;
        }

        $return_data = array(
            'student_list' => $student_list,
            'subject_list' => $subject_list,
            'ia_report' => $ia_report,
            'tooltip_details' => $tooltip_details
        );

        return $return_data;
    }

}
