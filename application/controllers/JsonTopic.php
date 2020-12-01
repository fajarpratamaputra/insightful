<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonTopic extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_chatgroup');
		date_default_timezone_set("Asia/Makassar");
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

	public function getTopicPsikolog()
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

	public function getTopicbyEmail()
	{
		$id_topic = $this->input->post('id_topic');
		$email_psikolog = $this->input->post('email_psikolog');
		$status = $this->input->post('status');

		$data = $this->m_chatgroup->get_by_email($id_topic, $email_psikolog, $status);

		$response = array(
			'data' => $data,
		);
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function getTopicforPsikolog()
	{
		$email_psikolog = $this->input->post('email_psikolog');
		
		$data = $this->m_chatgroup->get_for_psikolog($email_psikolog);

		$response = array(
			'data' => $data,
		);
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function insertChat()
	{
		$id_topic 	= $this->input->post('id_topic');
		$username   = $this->input->post('username');
		$email  	= $this->input->post('email');
		$karyawan   = $this->input->post('karyawan');
		$chat  		= $this->input->post('chat');
		$datetime 	= date('Y-m-d');

		$data = array(
			'id_topic' 		=> $id_topic,
			'username' 		=> $username,
			'email' 		=> $email,
			'karyawan' 		=> $karyawan,
			'chat' 			=> $chat,
			'datetime' 		=> $datetime,
		);
		
		$res = $this->m_chatgroup->add_chat($data);

		if(empty($data)) {
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

	public function updateTopic()
	{
		$id['id']	= $this->input->post('id_topic');
		$status   	= $this->input->post('status');
		
		$data = array(
			'status' 		=> $status,
		);

		$res = $this->m_chatgroup->update_chatgroup($data, $id);
		
		$data_topic = $this->m_chatgroup->edit_chatgroup($id['id']);

		if(empty($data_topic)) {
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
		->set_output(json_encode($data_topic, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

}
