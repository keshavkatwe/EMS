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
class Promote extends Custom_controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('promote_model');
    }
    
    public function index() {
        
        if($this->input->post())
        {
            var_dump($this->input->post());
        }
        else
        {
            $this->load->view('promote');
        }
    }
    
    
    public function get_students() {
        
        $class_information = json_decode(file_get_contents('php://input'));
        
        $students = $this->promote_model->get_students_m($class_information->semester, $class_information->department_id);
        
        echo json_encode($students);
        
    }
    
    
    
    
}
