<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonTopic extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_chatgroup');
	}

	public function getTopic()
	{

		$response = array(
			'data' => $this->m_chatgroup->get_all(),
		);
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

}
