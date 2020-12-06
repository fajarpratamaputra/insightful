<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_mood');
		$this->load->model('m_auth');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
		date_default_timezone_set("Asia/Makassar");
	}

	public function index()
	{
		$date = $this->input->post('date');
		if(!empty($date)) {
			$data['graph'] = $this->db->query("select * from analytic where datetime like '$date%' ")->result();
		}else {
			$data['graph'] = $this->db->query('select * from analytic')->result();
		}
		
		$data['count'] = $this->db->query('select sum(value) from analytic')->row();
		$data['count_download'] = $this->db->query("SELECT value FROM analytic WHERE name = 'klik'")->row();
		$this->template->view('analytics/index', $data);
	}

}
