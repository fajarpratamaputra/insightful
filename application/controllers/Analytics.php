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
		$data['graph'] = Null;
		$data['all'] = Null;
		$data['count_search'] = Null;
		if($this->input->post('submit') == 'all'){
			$data['all'] = $this->db->query("select name , sum(value) as value from analytic group by name")->result();
			$data['count'] = $this->db->query('select sum(value) as value from analytic')->row();
		} else {
			if(!empty($date)) {
				$data['graph'] = $this->db->query("select * from analytic where datetime like '$date%' ")->result();
				$data['count_search'] = $this->db->query("select * from analytic where datetime like '$date%' ")->row();
			}else {
				$data['graph'] = $this->db->query('select * from analytic')->result();
			}
		}
		
		$data['count_download'] = $this->db->query("SELECT value FROM analytic WHERE name = 'klik'")->row();
		$this->template->view('analytics/index', $data);
	}

}
