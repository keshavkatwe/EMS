<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Core_library
 *
 * @author Keshav K
 */
class Core_library {

    public $CI;

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function single_upload($tag, $path, $types = 'gif|jpg|png') {
        $config['upload_path'] = $path;
        $config['allowed_types'] = $types;
        $config['encrypt_name'] = TRUE;

        $this->CI->load->library('upload', $config);

        if (!$this->CI->upload->do_upload($tag)) {
            return FALSE;
        } else {
            $data = $this->CI->upload->data();
            return $data['file_name'];
        }
    }
}
