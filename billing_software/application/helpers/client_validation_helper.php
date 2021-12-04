<?php
	function add_client_validation(){
        $CI =& get_instance();
        $CI->load->helper('client_validation_helper');
		$config = array(
            array(
                'field' => 'company_name',
                'rules' => 'trim|required'
            ),array(
                'field' => 'phone',
                'rules' => 'trim|required'
            ),array(
                'field' => 'email',
                'rules' => 'trim|required'
            ),array(
                'field' => 'gst_treatment',
                'rules' => 'trim|required'
            ),array(
                'field' => 'gstin',
                'rules' => 'trim|required'
            ),array(
                'field' => 'pan',
                'rules' => 'trim|required'
            ),array(
                'field' => 'tin',
                'rules' => 'trim|required'
            ),array(
                'field' => 'billing_add',
                'rules' => 'trim|required'
            ),array(
                'field' => 'billing_contry',
                'rules' => 'trim|required'
            ),array(
                'field' => 'billing_state',
                'rules' => 'trim|required'
            ),array(
                'field' => 'billing_city',
                'rules' => 'trim|required'
            ),array(
                'field' => 'billing_pin',
                'rules' => 'trim|required'
            ),array(
                'field' => 'shipping_add',
                'rules' => 'trim|required'
            ),array(
                'field' => 'shipping_contry',
                'rules' => 'trim|required'
            ),array(
                'field' => 'shipping_state',
                'rules' => 'trim|required'
            ),array(
                'field' => 'shipping_city',
                'rules' => 'trim|required'
            ),array(
                'field' => 'shipping_pin',
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


