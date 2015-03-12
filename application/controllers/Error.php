<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author Keshav K
 */
class Error extends Custom_controller{
    
    public function show_404() {
        $this->load->view('errors/404_error_page');
    }
    
}
