<?php

/**
 * Description of subject
 *
 * @author Happy
 */
class Subject extends Custom_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Subject_model');
    }

    public function index() {
        $this->add_subject();
    }

    public function add_subject() {
        $config = array(
            array(
                'field' => 'subject_code',
                'label' => 'Subject Code',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'subject_name',
                'label' => 'Subject Name',
                'rules' => 'trim|required|callback_subject_check',
            ),
            array(
                'field' => 'semester',
                'label' => 'Semester',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'department',
                'label' => 'Department',
                'rules' => 'trim|required',
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $insert_subject = array(
                'subject_code' => $this->input->post('subject_code'),
                'subject_name' => $this->input->post('subject_name'),
                'semester' => $this->input->post('semester'),
                'department' => $this->input->post('department')
            );
            $result = $this->Subject_model->insert_subject($insert_subject);

            if ($result) {
                $this->session->set_flashdata("show_success", "Subject inserted successfully");
            } else {
                $this->session->set_flashdata("show_error", "Something went wrong, Plese try after sometime");
            }
            redirect(base_url('subject/manage_subject'));
        } else {
            $data = array(
                'title' => 'Add Subject',
                'submit_url' => base_url('subject/add_subject'),
                'current_tab' => 'subject',
                'current_page' => 'add_subject',
                'form_data' => array(
                    'subject_code' => NULL,
                    'subject_name' => NULL,
                    'department' => NULL,
                    'semester' => NULL
                )
            );
            $this->load->view("add_subject", $data);
        }
    }

    public function update_subject($subject_id) {
        $config = array(
            array(
                'field' => 'subject_code',
                'label' => 'Subject Code',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'subject_name',
                'label' => 'Subject Name',
                'rules' => 'trim|required|callback_update_subject_check[' . $subject_id . ']',
            ),
            array(
                'field' => 'semester',
                'label' => 'Semester',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'department',
                'label' => 'Department',
                'rules' => 'trim|required',
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $update_subject = array(
                'subject_code' => $this->input->post('subject_code'),
                'subject_name' => $this->input->post('subject_name'),
                'semester' => $this->input->post('semester'),
                'department' => $this->input->post('department')
            );
            $result = $this->Subject_model->update_subject($subject_id, $update_subject);

            if ($result) {
                $this->session->set_flashdata("show_success", "Subject updated successfully");
            } else {
                $this->session->set_flashdata("show_error", "Something went wrong, Plese try after sometime");
            }
            redirect(base_url('subject/manage_subject'));
        } else {
            $data = array(
                'title' => 'Edit Subject',
                'submit_url' => base_url('subject/update_subject/' . $subject_id),
                'current_tab' => 'subject',
                'current_page' => 'manage_subject',
                'form_data' => $this->Subject_model->edit_subject_info($subject_id)
            );
            $this->load->view("add_subject", $data);
        }
    }

    public function subject_check($subject) {
        $department = $this->input->post('department');
        $query = $this->db->get_where('tbl_subject', array('subject_name' => $subject, 'department' => $department));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('subject_check', '<i class="text-danger">This {field} already exist</i>');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function update_subject_check($subject, $subject_id) {
        $department = $this->input->post('department');
        $query = $this->db->get_where('tbl_subject', array('subject_name' => $subject, 'department' => $department, 'subject_id!= ' => $subject_id));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('update_subject_check', '<i class="text-danger">This {field} already exist</i>');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function manage_subject() {
        $data = array(
            'current_tab' => 'subject',
            'current_page' => 'manage_subject',
            'subject_list' => $this->Subject_model->subject_list()
        );
        $this->load->view("manage_subject", $data);
    }

    function delete_subject($subject_id) {
        $result = $this->Subject_model->delete_subject_m($subject_id);
        if ($result) {
            $this->session->set_flashdata("show_success", "Subject deleted successfully");
        } else {
            $this->session->set_flashdata("show_error", "Something went wrong, Plese try after sometime");
        }
        redirect(base_url('subject/manage_subject'));
    }
    
    
    function assign_subject() {
        $data = array(
            'current_tab' => 'subject',
            'current_page' => 'assign_subject'
        );
        $this->load->view("assign_subject", $data);
    }

}
