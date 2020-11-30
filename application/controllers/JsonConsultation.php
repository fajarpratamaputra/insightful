<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonConsultation extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_consultation');
		$this->load->model('m_kuesioner');
		date_default_timezone_set("Asia/Makassar");
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
			'datetime'			=> date('Y-m-d H:i:s')
		);

		$res = $this->m_consultation->add_consultation($data);

		$token_deivce = $token_psikolog;
		$token = '"'.$token_deivce.'"';
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS =>'{
			"registration_ids":['.$token.'],
			"notification": {
				"title":"insightful",
				"body":"Anda menerima permintaan konsultasi"
			}
		  }',
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: key=AAAATlTbhi4:APA91bFipNGjoz4HJp44Aj1JR6z9TFSnaw_TXZJIsmNnPeJls2K_4TdTd9qqf0HIyKrGt3Oaj70ovxoBpUtI2dsog77j7QQKebs2fGiQEi1dF74Hljfha5o4IHL2Xs3MaQw3vetMuIw0"
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);

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

	public function insertKuesioner()
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
			'note'				=> 'awal',
			'datetime'			=> date('Y-m-d H:i:s')
		);

		$res = $this->m_kuesioner->add_consultation($data);

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

	public function getKuesioner()
	{
		$email = $this->input->post('email');
		$email_psikolog = $this->input->post('email_psikolog');
		$note = 'awal';
		$kuesioner = $this->m_kuesioner->get_by_email($email, $email_psikolog, $note);
		$data['data'] = null; 
		if(!empty($kuesioner)) {
			if(!empty($email)){
				$res[] = [
					'id'			=> $kuesioner->id,
					'email_user' 		=> $kuesioner->email_user,
					'email_psikolog'=> $kuesioner->email_psikolog,
					'report' 		=> $kuesioner->report,
					'datetime' 		=> $kuesioner->datetime
				];
			} else {
				foreach($kuesioner as $kue) {
					$res[] = [
						'id'			=> $kue->id,
						'email_user' 		=> $kue->email_user,
						'email_psikolog'=> $kue->email_psikolog,
						'report' 		=> $kue->report,
						'datetime' 		=> $kue->datetime
					];
				}
			}
			
		}

		if(empty($kuesioner)) {
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))
			->_display();
			exit;
		}

		$data['data'] = $res; 
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($data, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function insertKuesionerAkhir()
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
			'note'				=> 'akhir',
			'datetime'			=> date('Y-m-d H:i:s')
		);

		$res = $this->m_kuesioner->add_consultation($data);

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

	public function getKuesionerAkhir()
	{
		$email = $this->input->post('email');
		$email_psikolog = $this->input->post('email_psikolog');
		$note = 'akhir';
		$kuesioner = $this->m_kuesioner->get_by_email($email, $email_psikolog, $note);
		$data['data'] = null; 
		if(!empty($kuesioner)) {
			if(!empty($email)){
				$res[] = [
					'id'			=> $kuesioner->id,
					'email_user' 		=> $kuesioner->email_user,
					'email_psikolog'=> $kuesioner->email_psikolog,
					'report' 		=> $kuesioner->report,
					'datetime' 		=> $kuesioner->datetime
				];
			} else {
				foreach($kuesioner as $kue) {
					$res[] = [
						'id'			=> $kue->id,
						'email_user' 		=> $kue->email_user,
						'email_psikolog'=> $kue->email_psikolog,
						'report' 		=> $kue->report,
						'datetime' 		=> $kue->datetime
					];
				}
			}
			
		}

		if(empty($kuesioner)) {
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))
			->_display();
			exit;
		}

		$data['data'] = $res; 
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($data, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

}
