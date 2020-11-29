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
		$mood = $this->m_mood->get_all();
		foreach($mood as $mo) {
			$res[] = [
				'id'	=> $mo->id,
				'email' => $mo->employee_email,
				'mood' => $mo->mood,
				'reason' => $mo->reason,
				'date' => $mo->date
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

	public function getMoodbyEmail()
	{
		$email = $this->input->post('email');
		$date = $this->input->post('date');
		$mood = $this->m_mood->get_by_email($email, $date);
		$data['data'] = null; 
		foreach($mood as $mo) {
			$res[] = [
				'id'	=> $mo->id,
				'email' => $mo->employee_email,
				'mood' => $mo->mood,
				'reason' => $mo->reason,
				'date' => $mo->date
			];
		}

		if(empty($mood)) {
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

	public function getMoodbyEmailDate()
	{
		$email = $this->input->post('email');
		$date = $this->input->post('date');
		$mood = $this->m_mood->get_by_email_date($email, $date);
		$data['data'] = null; 
		foreach($mood as $mo) {
			$res[] = [
				'id'	=> $mo->id,
				'email' => $mo->employee_email,
				'mood' => $mo->mood,
				'reason' => $mo->reason,
				'date' => $mo->date
			];
		}

		if(empty($mood)) {
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

	public function insertMood()
	{
		$email = $this->input->post('email');
		$mood  = $this->input->post('mood');
		$reason  = $this->input->post('reason');
		$datetime = date('Y-m-d', strtotime($this->input->post('datetime')));
		$mood_all = $this->m_mood->get_all();
		$data = array(
			'employee_email' 	=> $email,
			'mood' 				=> $mood,
			'reason' 			=> $reason,
			'date' 				=> $datetime,
		);
		$res = null;
		foreach($mood_all as $ma) {
			if(($email == $ma->employee_email) && ($datetime == date('Y-m-d', strtotime($ma->date)))) {
				$id_mood = $this->db->where('employee_email', $email)->limit('1')->get('mood_record')->row();
				$id['id'] = $id_mood->id;
				$res = $this->m_mood->update_mood($data, $id);
			} else {
				$res = $this->m_mood->add_mood($data);
			}
		}

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

}
