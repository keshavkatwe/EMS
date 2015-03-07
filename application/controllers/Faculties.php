<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Faculties
 *
 * @author Keshav K
 */
class Faculties extends Custom_controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model('faculty_model');
    }
    
    public function index() {
        
    }

    public function add() {

        $config = array(
            array(
                'field' => 'first_name',
                'label' => 'First name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'last_name',
                'label' => 'Last name',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'email_id',
                'label' => 'Email id',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone number',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'confirm_password',
                'label' => 'Confirm password',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'department',
                'label' => 'Department',
                'rules' => 'trim',
            ),
            array(
                'field' => 'employee_id',
                'label' => 'Employee id',
                'rules' => 'trim',
            ),
            array(
                'field' => 'designation',
                'label' => 'Designation',
                'rules' => 'trim',
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim',
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            
            $user_information = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email_id' => $this->input->post('email_id'),
                'password' => $this->input->post('password'),
                'role_id' => 2,
            );
            
            $faculty_information = array(
                'employee_id' => $this->input->post('employee_id'),
                'designation' => $this->input->post('designation'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'department' => $this->input->post('department'),
            );
            
            $result = $this->faculty_model->add_faculty_m($user_information, $faculty_information);
            
            echo $result;
            
        } else {
            $page_data = array(
                'current_tab' => 'faculties_tab',
                'current_page' => 'add_faculty'
            );

            $this->load->view('add_faculty_view', $page_data);
        }
    }

}
