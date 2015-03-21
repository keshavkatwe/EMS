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


        $sem = json_decode(file_get_contents('php://input'));

        $subjects = $this->ia_model->get_faculty_subjects_m($sem);


        $response_data = $subjects;

        $json_data = array(
            'success' => $is_success,
            'data' => $response_data
        );

        echo json_encode($json_data);
    }

    public function students_ajax() {


        $marks_options = (json_decode(file_get_contents('php://input')));

        $sem = $marks_options->sem;
        $subject_id = $marks_options->subject_id;


        $is_success = TRUE;
        $response_data = "";


        $students = $this->ia_model->get_students($sem, $subject_id);
        $subject_info = $this->ia_model->get_subject_info($sem, $subject_id);
        
        $response_data = $students;

        $json_data = array(
            'success' => $is_success,
            'data' => $response_data,
            'subject_info' => $subject_info
        );

        echo json_encode($json_data);
    }

    public function marks_update() {

        $student = (json_decode(file_get_contents('php://input')));
        
        $is_success = TRUE;
        $response_data = "";


        $faculty_info = $this->ia_model->faculty_info($this->session->user_id);

        $student_user_id = $student->user_id;
        $sem = $student->semester;
        $subject_id = $student->subject_id;


        $ia_1 = $student->ia_1;
        $ia_2 = $student->ia_2;
        $ia_3 = $student->ia_3;
        
        $marks_data = array(
            'user_id' => $student_user_id,
            'faculty_id' => $faculty_info['faculty_id'],
            'subject_id' => $subject_id,
            'sem' => $sem,
            'ia_1' => $ia_1,
            'ia_2' => $ia_2,
            'ia_3' => $ia_3,
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
