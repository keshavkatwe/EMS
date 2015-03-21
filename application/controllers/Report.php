<?php
/**
 * Description of Report
 *
 * @author Happy
 */
class Report extends Custom_controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
    }
    
    function index() {
        $this->ia_report();
    }
    
    function ia_report() {
        
         $data = array(
            'current_tab' => 'report_tab',
            'current_page' => 'ia_report',
            'departments' => $this->Report_model->getDepartments()
        );
        $this->load->view("ia_report", $data);
    }
}
