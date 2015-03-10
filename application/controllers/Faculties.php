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

        $faculty_list = array();

        function get_name($i) {
            return $i['semester'];
        }

        foreach ($faculties_array as $faculty) {

            $sems = $this->faculty_model->sems_m($faculty['user_id']);

            $values = array_map('get_name', $sems);

            $faculty['sem'] = implode(',', $values);

            $faculty_list[] = $faculty;
        }


        $page_data = array(
            'current_tab' => 'faculties_tab',
            'current_page' => 'faculties',
            'faculties_array' => $faculty_list
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
                'rules' => 'required|valid_email|is_unique[tbl_users.email_id]|trim',
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
                'rules' => 'required|matches[password]|trim',
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

            $profile_image = "";

            $profile_image = $this->core_library->single_upload('profile_image', 'file_uploads/profile_images/');

            $user_information = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email_id' => $this->input->post('email_id'),
                'password' => $this->input->post('password'),
                'gender' => $this->input->post('gender'),
                'profile_image' => $profile_image,
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
                'profile_image' => ''
            );

            $sems = array();

            $page_data = array(
                'current_tab' => 'faculties_tab',
                'current_page' => 'add_faculty',
                'faculties_array' => $faculties_array,
                'operation' => 'add',
                'sems' => $sems
            );

            $this->load->view('add_faculty', $page_data);
        }
    }

    public function edit($user_id = NULL) {
        
        
        if($user_id == NULL)
        {
            $this->show_404();
            return FALSE;
        }

        $faculties_array = $this->faculty_model->fetch_faculties($user_id);

        
        if(!count($faculties_array))
        {
            $this->show_404();
            return FALSE;
        }
        
        
        $sems = $this->faculty_model->sems_m($user_id);

        
        if ($this->input->post('email_id') != $faculties_array['email_id']) {
            $is_unique = '|is_unique[tbl_users.email_id]';
        } else {
            $is_unique = '';
        }

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
                'rules' => 'required|valid_email'.$is_unique.'|trim',
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

            $profile_image = $faculties_array['profile_image'];

            if (!empty($_FILES['profile_image']['name'])) {
                $profile_image = $this->core_library->single_upload('profile_image', 'file_uploads/profile_images/');
            }

            $user_information = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email_id' => $this->input->post('email_id'),
                'password' => $this->input->post('password'),
                'gender' => $this->input->post('gender'),
                'profile_image' => $profile_image,
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
            $result = $this->faculty_model->update_faculty_m($user_id, $user_information, $faculty_information, $semesters);

            if ($result) {
                $this->session->set_flashdata("show_success", "Faculty updated successfully");
                redirect('faculties');
            }
        } else {
            $page_data = array(
                'current_tab' => 'faculties_tab',
                'current_page' => 'edit_faculty',
                'faculties_array' => $faculties_array,
                'sems' => $sems,
                'operation' => 'edit'
            );

            $this->load->view('add_faculty', $page_data);
        }
    }

    public function delete($user_id) {
        $result = $this->faculty_model->delete_faculty($user_id);

        if ($result) {
            $this->session->set_flashdata('show_success', "Faculty deleted successfully");
            redirect(base_url('faculties'));
        } else {
            $this->session->set_flashdata('show_error', "Something went wrong...");
            redirect(base_url('faculties'));
        }
    }

}
