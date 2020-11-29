<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_mood');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$data['graph'] = $this->db->query('select date, (select (select COUNT(mood)) as a from `mood_record` where mood = 1 group by mood) as m from `mood_record` group by date order by date desc limit 7')->result();
		$data['mood'] = $this->m_mood->get_all();
		$data['count'] = $this->db->query('select count(*) from mood_record')->row();
		$this->template->view('dashboard/index', $data);
	}

}
