<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile
 *
 * @author Keshav K
 */
class Profile extends Custom_controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('profile_model');
    }
    
    public function edit($user_id = NULL) {
        $profile_array = $this->profile_model->get_user_m($user_id);

        //$sems = $this->profile_model->sems_m($user_id);


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
                'rules' => 'required|valid_email|trim',
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
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {

            $profile_image = $profile_array['profile_image'];

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

            
            $result = $this->profile_model->update_user_m($user_id, $user_information);

            if ($result) {
                $this->session->set_flashdata("show_success", "Profile updated successfully");
                redirect(base_url());
            }
        } else {
            $page_data = array(
                'current_tab' => 'profile_tab',
                'current_page' => 'edit_profile',
                'faculties_array' => $profile_array,
                'operation' => 'edit'
            );

            $this->load->view('edit_admin_profile', $page_data);
        }
    }
}
