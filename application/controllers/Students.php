<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Students
 *
 * @author Keshav K
 */
class Students extends Custom_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('student_model');
    }

    public function index() {

        $students_list = $this->student_model->fetch_students();


        $page_data = array(
            'current_tab' => 'students_tab',
            'current_page' => 'students',
            'students_list' => $students_list
        );

        $this->load->view('students', $page_data);
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
                'field' => 'department',
                'label' => 'Department',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'mobile',
                'label' => 'Mobile number',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'semester',
                'label' => 'Semester',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'reg_number',
                'label' => 'Register number',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim',
            ),
            array(
                'field' => 'roll_number',
                'label' => 'Roll number',
                'rules' => 'required|integer|trim',
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {

            $profile_image = "";

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
                'role_id' => 3,
            );

            $student_information = array(
                'reg_number' => $this->input->post('reg_number'),
                'roll_number' => $this->input->post('roll_number'),
                'semester' => $this->input->post('semester'),
                'department' => $this->input->post('department'),
                'address' => $this->input->post('address'),
                'mobile' => $this->input->post('mobile'),
            );

            $result = $this->student_model->add_student_m($user_information, $student_information);

            if ($result) {
                $this->session->set_flashdata("show_success", "Student added successfully");
                redirect('students');
            }
        } else {

            $students_array = array(
                'first_name' => '',
                'last_name' => '',
                'email_id' => '',
                'password' => '',
                'gender' => '',
                'profile_image' => '',
                'reg_number' => '',
                'roll_number' => '',
                'semester' => '',
                'department' => '',
                'address' => '',
                'mobile' => '',
            );

            $page_data = array(
                'current_tab' => 'students_tab',
                'current_page' => 'add_student',
                'operation' => 'add',
                'students_array' => $students_array
            );

            $this->load->view('add_student', $page_data);
        }
    }

    public function edit($user_id = NULL) {

        if($user_id == NULL)
        {
            $this->show_404();
            return FALSE;
        }
        
        
        $students_array = $this->student_model->fetch_students($user_id);

        
        if(!count($students_array))
        {
            $this->show_404();
            return FALSE;
        }
        
        
        if ($this->input->post('email_id') != $students_array['email_id']) {
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
                'field' => 'department',
                'label' => 'Department',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'mobile',
                'label' => 'Mobile number',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'semester',
                'label' => 'Semester',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'reg_number',
                'label' => 'Register number',
                'rules' => 'required|trim',
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim',
            ),
            array(
                'field' => 'roll_number',
                'label' => 'Roll number',
                'rules' => 'required|integer|trim',
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {

            $profile_image = $students_array['profile_image'];

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
            );

            $student_information = array(
                'reg_number' => $this->input->post('reg_number'),
                'roll_number' => $this->input->post('roll_number'),
                'semester' => $this->input->post('semester'),
                'department' => $this->input->post('department'),
                'address' => $this->input->post('address'),
                'mobile' => $this->input->post('mobile'),
            );

            $result = $this->student_model->update_student_m($user_id, $user_information, $student_information);

            if ($result) {
                $this->session->set_flashdata("show_success", "Student added successfully");
                redirect('students');
            }
        } else {

            $page_data = array(
                'current_tab' => 'students_tab',
                'current_page' => 'edit_student',
                'operation' => 'edit',
                'students_array' => $students_array
            );

            $this->load->view('add_student', $page_data);
        }
    }

    
    public function delete($user_id) {
        $result = $this->student_model->delete_student($user_id);

        if ($result) {
            $this->session->set_flashdata('show_success', "Student deleted successfully");
            redirect(base_url('students'));
        } else {
            $this->session->set_flashdata('show_error', "Something went wrong...");
            redirect(base_url('students'));
        }
    }
    
}
