<?php

/**
 * Description of attendance
 *
 * @author Happy
 */
class Attendance extends Custom_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('attendance_model');
        $this->load->model('ia_model');
    }

    public function index() {

        $sems = $this->ia_model->get_faculty_semesters_m();

        $page_data = array(
            'current_tab' => 'attendance_tab',
            'current_page' => 'attendance',
            'sems' => $sems
        );

        $this->load->view('attendance', $page_data);
    }

    public function students_ajax() {
        $sem = $this->input->post('sem');
        $subject_id = $this->input->post('subject_id');
        $date = $this->input->post('date');
        $faculty_id = $this->session->faculty_id;

        $if_already_taken = $this->attendance_model->if_already_taken_m($faculty_id, $subject_id, $date);
        if ($if_already_taken > 0) {
            $action = "update";
        } else {
            $action = "add";
        }

        $is_success = TRUE;
        $response_data = "";


        $students = $this->ia_model->get_students($sem, $subject_id);


        $students_data = "";
        if (count($students)) {
            $i = 0;
            foreach ($students as $student) {
                $student["index_id"] = $i;
                $student["attendance"] = $this->attendance_model->get_attendance_id($faculty_id, $subject_id, $date, $student['student_id']);
                $students_data .= $this->load->view('subview/student_attendance', $student, TRUE);
                $i++;
            }
        } else {
            $students_data = '<tr><td class="text-center" colspan="8">No students</td><tr>';
        }


        $response_data = $students_data;

        $json_data = array(
            'success' => $is_success,
            'data' => $response_data,
            'count' => count($students),
            'action' => $action
        );

        echo json_encode($json_data);
    }

    function save_attendance() {
        $faculty_id = $this->session->faculty_id;
        $subject_id = $this->input->post('subject_id_hidden');
        $date = date("Y-m-d", strtotime($this->input->post('date_hidden')));
        $attendance = $this->input->post('attendance');
        $student_id = $this->input->post('student_id');


        $attendance_data = array();
        for ($i = 0; $i < sizeof($student_id); $i++) {
            $attendance_data[] = array(
                'student_id' => $student_id[$i],
                'faculty_id' => $faculty_id,
                'subject_id' => $subject_id,
                'status' => $attendance[$i],
                'date' => $date
            );
        }


        $if_already_taken = $this->attendance_model->if_already_taken_m($faculty_id, $subject_id, $date);

        if ($if_already_taken) {
            $this->session->set_flashdata("show_warning", "Attendance to choosen date and subject is already takens");
            redirect(base_url("attendance"));
        } else {
            $result = $this->attendance_model->add_attendance($attendance_data);
            $this->session->set_flashdata("show_success", "Attendance updated successfully");
            redirect(base_url("attendance"));
        }
    }

    function update_attendance_ajax() {
        $attendance_id = $this->input->post("attendance_id");
        $update_data = array(
            "status" => $this->input->post("status")
        );
        echo $this->attendance_model->update_attendance($update_data, $attendance_id);
    }

}
