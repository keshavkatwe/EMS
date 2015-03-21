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
    }

    public function index() {

        $sems = $this->attendance_model->get_faculty_semesters_m();

        $page_data = array(
            'current_tab' => 'attendance_tab',
            'current_page' => 'attendance',
            'sems' => $sems
        );

        $this->load->view('attendance', $page_data);
    }
    
    public function subjects_ajax() {
        $is_success = TRUE;
        $response_data = "";


        $sem = $this->input->post('sem');

        $subjects = $this->attendance_model->get_faculty_subjects_m($sem);


        $response_data = $subjects;

        $json_data = array(
            'success' => $is_success,
            'data' => $response_data
        );

        echo json_encode($json_data);
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


        $students = $this->attendance_model->get_students($sem, $subject_id);


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
    
    function attendance_report() {
        $this->load->model('Subject_model');
         $data = array(
            'current_tab' => 'attendance_tab',
            'current_page' => 'attendance_report',
            'departments' => $this->Subject_model->getDepartments()
        );
        $this->load->view("attendance_report", $data);
    }
    
    function getDeptReport(){
        $filter_data = array(
            'dept_id' => $this->input->post('dept_id'),
            'semester' => $this->input->post('semester'),
            'search_type' => $this->input->post('search_type'),
            'keyword' => $this->input->post('keywork')
        );
        
        $return_data = $this->attendance_model->getDeptReportData($filter_data);
        $data_report = array(
            'report_info' => $return_data['student_list'],
            'subject_list' => $return_data['subject_list'],
            'attendance_report' => $return_data['attendance_report'],
            'total_classes_taken' => $return_data['total_classes_taken']
        );
        
        echo $this->load->view("subview/attendance_report",$data_report, TRUE);
        
    }

    
}
