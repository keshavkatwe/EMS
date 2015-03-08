<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Faculty_model
 *
 * @author Keshav K
 */
class Faculty_model extends CI_Model {

    public function add_faculty_m($user_information, $faculty_information, $semesters) {

        $this->db->trans_start();

        $this->db->insert('tbl_users', $user_information);

        $user_id = $this->db->insert_id();

        $faculty_information['user_id'] = $user_id;

        $this->db->insert('tbl_faculty', $faculty_information);

        if (count($semesters)) {
            $semester_array = array();
            foreach ($semesters as $sem) {
                $semester_array[] = array(
                    'user_id' => $user_id,
                    'semester' => $sem
                );
            }

            $this->db->insert_batch('tbl_faculty_sem_mapping', $semester_array);
        }


        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    
    public function fetch_faculties() {
        $this->db->join('tbl_faculty f', 'u.user_id = f.user_id');
        $this->db->join('tbl_departments d', 'f.department = d.department_id');
        $query = $this->db->get('tbl_users u');
        return $query->result_array();
    }
    
    
}
