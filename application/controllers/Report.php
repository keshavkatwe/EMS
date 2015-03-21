<?php
/**
 * Description of Report
 *
 * @author Happy
 */
class Report extends Custom_controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('report_model');
    }
    
    function index() {
        $this->ia_report();
    }
    
    function ia_report() {
        
         $data = array(
            'current_tab' => 'report_tab',
            'current_page' => 'ia_report',
            'departments' => $this->report_model->getDepartments()
        );
        $this->load->view("ia_report", $data);
    }
    
    function getIAReport() {
        $filter_data = array(
            'dept_id' => $this->input->post('dept_id'),
            'semester' => $this->input->post('semester'),
            'ia_type' => $this->input->post('ia_type'),
            'search_type' => $this->input->post('search_type'),
            'keyword' => $this->input->post('keyword')
        );
        
        $return_data = $this->report_model->getIAReportData($filter_data);
        $data_report = array(
            'report_info' => $return_data['student_list'],
            'subject_list' => $return_data['subject_list'],
            'ia_report' => $return_data['ia_report']
        );
        
        echo $this->load->view("subview/ia_report",$data_report, TRUE);
        
    }
}
