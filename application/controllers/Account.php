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
class Account extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model('account_model');
    }
    
    public function index() {
        
        if($this->session->user_id)
        {
            redirect(base_url());
        }
        
        
        $msg = "";
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
            
            $login_data = array(
                'u.email_id' => $this->input->post('email_id'),
                'u.password' => $this->input->post('password')
            );
            
            $result = $this->account_model->login_m($login_data);
            
            if(count($result))
            {
                $this->session->set_userdata($result);
                redirect(base_url());
            }
            else
            {
                $msg = '<div class="alert alert-danger" role="alert">Email/Password doesn\'t exist.</div>';
            }
            
        }
        
        $page_data = array(
            'msg' => $msg
        );
        
        $this->load->view('login', $page_data);
    }

    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('account'));
    }
}
