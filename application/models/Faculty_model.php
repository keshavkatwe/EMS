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
    
    
    public function update_faculty_m($user_id, $user_information, $faculty_information, $semesters) {

        $this->db->trans_start();

        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_users', $user_information);


        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_faculty', $faculty_information);

        $this->db->delete('tbl_faculty_sem_mapping', array('user_id' => $user_id));
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
    
    public function delete_faculty($user_id) {
        
        $this->db->trans_start();
        
        $this->db->delete('tbl_faculty_sem_mapping', array('user_id' => $user_id));
        $this->db->delete('tbl_faculty', array('user_id' => $user_id));
        $this->db->delete('tbl_users', array('user_id' => $user_id));
        
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    

    public function fetch_faculties($user_id = NULL) {

        if ($user_id != NULL) {
            $this->db->where('u.user_id', $user_id);
        }

        $this->db->join('tbl_faculty f', 'u.user_id = f.user_id');
        $this->db->join('tbl_departments d', 'f.department = d.department_id');
        $query = $this->db->get('tbl_users u');

        if ($user_id == NULL) {
            return $query->result_array();
        } else {
            return $query->row_array();
        }
    }

    
    
    public function sems_m($user_id) {
        
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_faculty_sem_mapping');
        return $query->result_array();
    }
}
