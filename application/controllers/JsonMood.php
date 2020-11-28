<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonMood extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_mood');
	}

	public function getMood()
	{
		$news = $this->m_news->get_news_category();
		foreach($news as $ne) {
			$res[] = [
				'title' => $ne->title,
				'banner'=> base_url('assets/profile/').$ne->banner,
				'description' => $ne->description,
				'category' => $ne->cat,
				'author' => $ne->author
			];
		}

		$data['data'] = $res; 
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($data, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function insertMood()
	{
		$email = $this->input->post('email');
		$mood  = $this->input->post('mood');
		$reason  = $this->input->post('reason');
		$datetime = date('Y-m-d', strtotime($this->input->post('datetime')));

		$data = array(
			'employee_email' 	=> $email,
			'mood' 				=> $mood,
			'reason' 			=> $reason,
			'date_created' 		=> $datetime,
		);

		$res = $this->m_mood->add_mood($data);

		if(empty($res)) {
			$this->output
			->set_status_header(500)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($res, JSON_PRETTY_PRINT))
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
