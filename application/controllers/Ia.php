<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ia
 *
 * @author Keshav K
 */
class Ia extends Custom_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ia_model');
    }

    public function index() {

        $sems = $this->ia_model->get_faculty_semesters_m();

        $page_data = array(
            'current_tab' => 'ia_tab',
            'current_page' => 'ia',
            'sems' => $sems
        );

        $this->load->view('ia_marks', $page_data);
    }

    public function subjects_ajax() {
        $is_success = TRUE;
        $response_data = "";


        $sem = $this->input->post('sem');

        $subjects = $this->ia_model->get_faculty_subjects_m($sem);


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


        $is_success = TRUE;
        $response_data = "";


        $students = $this->ia_model->get_students($sem, $subject_id);


        $students_data = "";
        if (count($students)) {
            foreach ($students as $student) {
                $students_data .= $this->load->view('subview/student_ia_information', $student, TRUE);
            }
        }
        else
        {
            $students_data = '<tr><td class="text-center" colspan="8">No students</td><tr>';
        }


        $response_data = $students_data;

        $json_data = array(
            'success' => $is_success,
            'data' => $response_data
        );

        echo json_encode($json_data);
    }

    public function marks_update() {

        $is_success = TRUE;
        $response_data = "";


        $faculty_info = $this->ia_model->faculty_info($this->session->user_id);

        $student_user_id = $this->input->post('student_user_id');
        $sem = $this->input->post('sem');
        $subject_id = $this->input->post('subject_id');
        $marks = $this->input->post('marks');
        $ia_number = $this->input->post('ia_number');


        $marks_data = array(
            'user_id' => $student_user_id,
            'faculty_id' => $faculty_info['faculty_id'],
            'subject_id' => $subject_id,
            'sem' => $sem,
            'ia_' . $ia_number => $marks
        );

        $result = $this->ia_model->update_ia_marks($marks_data);

        if (!$result) {
            $is_success = FALSE;
        }

        $json_data = array(
            'success' => $is_success,
            'data' => $response_data
        );

        echo json_encode($json_data);
    }

}
