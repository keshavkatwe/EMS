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

    public function index() {
        
    }

    public function add() {

        $config = array(
            array(
                'field' => 'email_id',
                'label' => 'Email id',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            
        } else {
            $page_data = array(
                'current_tab' => 'faculties_tab',
                'current_page' => 'add_faculty'
            );

            $this->load->view('add_faculty_view', $page_data);
        }
    }

}
