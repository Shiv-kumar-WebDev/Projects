<?php
	function add_note_validation(){
        $CI =& get_instance();
        $CI->load->helper('note_validation_helper');
		$config = array(
            array(
                'field' => 'client_id',
                'rules' => 'trim|required'
            ),array(
                'field' => 'proforma_no',
                'rules' => 'trim|required'
            ),array(
                'field' => 'proforma_date',
                'rules' => 'trim|required'
            ),array(
                'field' => 'enquiry_no',
                'rules' => 'trim|required'
            ),array(
                'field' => 'valid_unit',
                'rules' => 'trim|required'
            ),array(
                'field' => 'term_con',
                'rules' => 'trim|required'
            ),array(
                'field' => 'p_notes',
                'rules' => 'trim|required'
            )   
        );

        $CI->form_validation->set_rules($config);
		if ($CI->form_validation->run() === FALSE) {
            $CI->session->set_flashdata("errors", validation_errors());
            $CI->session->set_flashdata('cform', $data);
            redirect('AddDelivery_notes');
        }else{
            return true;
        } 

	}


