<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonUserGroup extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->model('m_chatgroup');
		date_default_timezone_set("Asia/Makassar");
	}

	public function insertUserChatGroup()
	{
		$uid_topic 	= $this->input->post('uid_topic');
		$id_topic  	= $this->input->post('id_topic');
		$email_user = $this->input->post('email_user');
		$token  	= $this->input->post('token');
		$date	   	= date('Y-m-d H:i:s');
		$data = array(
			'uid_topic' 	=> $uid_topic,
			'id_topic' 		=> $id_topic,
			'email_user' 	=> $email_user,
			'token' 		=> $token,
			'created_date' 	=> $date,
		);
		$res = null;

		$res = $this->m_chatgroup->add_userchatgroup($data);

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
