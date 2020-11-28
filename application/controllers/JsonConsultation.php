<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonConsultation extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_consultation');
	}

	// public function getMood()
	// {
	// 	$news = $this->m_news->get_news_category();
	// 	foreach($news as $ne) {
	// 		$res[] = [
	// 			'title' => $ne->title,
	// 			'banner'=> base_url('assets/profile/').$ne->banner,
	// 			'description' => $ne->description,
	// 			'category' => $ne->cat,
	// 			'author' => $ne->author
	// 		];
	// 	}

	// 	$data['data'] = $res; 
		
	// 	$this->output
	// 	->set_status_header(200)
	// 	->set_content_type('application/json', 'utf-8')
	// 	->set_output(json_encode($data, JSON_PRETTY_PRINT))
	// 	->_display();
	// 	exit;
	// }

	public function insertConsultation()
	{
		$email_user 	 = $this->input->post('email_user');
		$email_psikolog  = $this->input->post('email_psikolog');
		$token_psikolog  = $this->input->post('token_psikolog');
		$report 		 = $this->input->post('report');

		$data = array(
			'email_user' 		=> $email_user,
			'email_psikolog' 	=> $email_psikolog,
			'token_psikolog' 	=> $token_psikolog,
			'report' 			=> $report,
		);

		$res = $this->m_consultation->add_consultation($data);

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
