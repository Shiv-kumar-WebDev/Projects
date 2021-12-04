<?php
	function add_item_validation(){
        $CI =& get_instance();
        $CI->load->helper('item_validation_helper');
		$config = array(
            array(
                'field' => 'name',
                'rules' => 'trim|required'
            ),array(
                'field' => 'description',
                'rules' => 'trim|required'
            ),array(
                'field' => 'unit',
                'rules' => 'trim|required'
            ),array(
                'field' => 'tax',
                'rules' => 'trim|required'
            ),array(
                'field' => 'hsn',
                'rules' => 'trim|required'
            ),array(
                'field' => 'sku',
                'rules' => 'trim|required'
            ),array(
                'field' => 'tin',
                'rules' => 'trim|required'
            ),array(
                'field' => 'unit_price',
                'rules' => 'trim|required'
            ),array(
                'field' => 'currency',
                'rules' => 'trim|required'
            ),array(
                'field' => 'chess_per',
                'rules' => 'trim|required'
            ),array(
                'field' => 'punit_price',
                'rules' => 'trim|required'
            ),array(
                'field' => 'pcurrency',
                'rules' => 'trim|required'
            ),array(
                'field' => 'chess',
                'rules' => 'trim|required'
            ),array(
                'field' => 'pchess_per',
                'rules' => 'trim|required'
            ),array(
                'field' => 'pchess',
                'rules' => 'trim|required'
            )
        );

        $CI->form_validation->set_rules($config);
		if ($CI->form_validation->run() === FALSE) {
            $CI->session->set_flashdata("errors", validation_errors());
            $CI->session->set_flashdata('cform', $data);
            redirect('AddClient');
        }else{
            return true;
        } 

	}


