<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Promote
 *
 * @author Keshav K
 */
class Promote extends Custom_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('promote_model');
    }

    public function index() {

        if ($this->input->post()) {
            $student_ids = $this->input->post('student_id');
            $student_promotes = $this->input->post('student_promote');
            

            $active_students = array();
            $inactive_students = array();

            for ($i = 0;$i < count($student_ids); $i++) {
                if($student_promotes[$i] == "yes")
                {
                    $active_students[] = $student_ids[$i];
                }
                else
                {
                    $inactive_students[] = $student_ids[$i];
                }
            }
            
            $sem = $this->input->post('semester_selected');
            
            $result = $this->promote_model->promote_students($active_students, $inactive_students, $sem);
            
            if($result)
            {
                $this->session->set_flashdata('show_success', 'Students promoted successfully');
                redirect(base_url('promote'));
            }
            
        } else {
            
            $data = array(
                'current_page' => 'promote'
            );
            
            $this->load->view('promote', $data);
        }
    }

    public function get_students() {

        $class_information = json_decode(file_get_contents('php://input'));

        $students = $this->promote_model->get_students_m($class_information->semester, $class_information->department_id);

        echo json_encode($students);
    }

}
