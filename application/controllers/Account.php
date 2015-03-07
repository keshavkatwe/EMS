<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author Keshav K
 */
class Account extends Custom_controller {

    public function index() {

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
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            
        }
        $this->load->view('login');
    }

}
