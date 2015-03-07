<?php

/**
 * Description of subject
 *
 * @author Happy
 */
class Subject extends Custom_controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->add_subject();
    }

    public function add_subject() {
        if (!isset($_POST)) {
            $data = array(
                'current_tab' => 'subject',
                'current_page' => 'add_subject'
            );
            $this->load->view("add_subject", $data);
        }
        else if(isset($_POST)) {
            echo "POST";
        
        }
    }

}
