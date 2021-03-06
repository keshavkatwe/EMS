<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Keshav K
 */
class Home extends Custom_controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }
    
    
    public function index() {
        
        $page_data = array(
            'current_tab' => 'home_tab',
            'current_page' => 'home',
            'counts' => $this->Home_model->display_count()
        );
        
        $this->load->view('home', $page_data);
    }
    
}
