<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Assign_faculty
 *
 * @author Happy
 */
class Assign_faculty extends Custom_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Assign_faculty_model');
    }

    function load_information() {
        $dept = $this->input->post('dept');
        $semester = $this->input->post('sem');

        $result = $this->Assign_faculty_model->load_information_m($dept, $semester);

        $data = array(
            'dept' => $this->Assign_faculty_model->getDeptName($dept),
            'sem' => $semester,
            'subject_info' => $result,
            'faculty_info' => $this->Assign_faculty_model->getFaculties($dept,$semester)
        );


        echo $this->load->view("subview/subject_information", $data, TRUE);
    }

}
