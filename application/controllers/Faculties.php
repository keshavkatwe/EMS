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

        $faculties_array = $this->faculty_model->fetch_faculties();

        $page_data = array(
            'current_tab' => 'faculties_tab',
            'current_page' => 'faculties',
            'faculties_array' => $faculties_array
        );

        $this->load->view('faculties', $page_data);
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
                'field' => 'gender',
                'label' => 'Gender',
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
                'field' => 'phone',
                'label' => 'Phone number',
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
                'gender' => $this->input->post('gender'),
                'role_id' => 2,
            );

            $faculty_information = array(
                'employee_id' => $this->input->post('employee_id'),
                'designation' => $this->input->post('designation'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'department' => $this->input->post('department'),
            );

            $semesters = $this->input->post('sems');
            $result = $this->faculty_model->add_faculty_m($user_information, $faculty_information, $semesters);

            if ($result) {
                $this->session->set_flashdata("show_success", "Faculty added successfully");
                redirect('faculties');
            }
        } else {
            
            $faculties_array = array(
                'first_name' => '',
                'email_id' => '',
                'password' => '',
                'last_name' => '',
                'gender' => '',
                'phone' => '',
                'employee_id' => '',
                'designation' => '',
                'address' => '',
            );
            
            $page_data = array(
                'current_tab' => 'faculties_tab',
                'current_page' => 'add_faculty',
                'faculties_array' => $faculties_array
            );

            $this->load->view('add_faculty', $page_data);
        }
    }

    public function edit($user_id = NULL) {
        
        $faculties_array = $this->faculty_model->fetch_faculties($user_id);
        
        $page_data = array(
            'current_tab' => 'faculties_tab',
            'current_page' => 'edit_faculty',
            'faculties_array' => $faculties_array
        );

        $this->load->view('add_faculty', $page_data);
    }
}
