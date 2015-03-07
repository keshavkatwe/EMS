<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Custom_controller
 *
 * @author Keshav K
 */
class Custom_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if(!$this->session->user_id)
        {
            redirect(base_url('account'));
        }
    }
}
