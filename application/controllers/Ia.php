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
        
        
        $is_success = TRUE;
        $response_data = "";


        $students = $this->ia_model->get_students($sem);

        $students_data = "";
        foreach ($students as $student) {
            $students_data .= $this->load->view('subview/student_ia_information', $student, TRUE);
        }


        $response_data = $students_data;

        $json_data = array(
            'success' => $is_success,
            'data' => $response_data
        );

        echo json_encode($json_data);
    }

}
