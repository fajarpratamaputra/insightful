<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonLog extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->model('m_auth');
		date_default_timezone_set("Asia/Makassar");
	}

	public function insertLog()
	{
		$email = $this->input->post('email');
		$username  = $this->input->post('username');
		$data = array(
			'email' 	=> $email,
			'username' 	=> $username,
			'datetime' 	=> date('Y-m-d'),
		);
		$log_login = $this->m_auth->get_log_by_email($email, $username);
		$res = null;

		if(!empty($log_login)){
			$id['id'] = $log_login->id;
			$res = $this->m_auth->update_log($data, $id);
		} else{
			$res = $this->m_auth->add_log($data);
		}

		if(empty($res)) {
			$this->output
			->set_status_header(500)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))
			->_display();
			exit;
		}
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($data, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

}
