<?php

/**
 * Description of Home_model
 *
 * @author Happy
 */
class Home_model extends CI_Model {

    function display_count() {
        
        $query_student = $this->db->get("tbl_student");
        $students = $query_student->num_rows();
    
        $query_faculty = $this->db->get("tbl_faculty");
        $faculty = $query_faculty->num_rows();
        
        $query_subject= $this->db->get("tbl_subject");
        $subject = $query_subject->num_rows();
        
        $data = array(
            'students' => $students,
            'faculty' => $faculty,
            'subjects' => $subject
        );
        return $data;
    }

}
