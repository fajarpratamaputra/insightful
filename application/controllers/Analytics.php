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
		$date = date('Y-m-d');
		$data['graph'] = $this->db->query('select date, (select (select COUNT(mood)) as a from `mood_record` where mood = 1 group by mood) as m from `mood_record` group by date order by date desc limit 7')->result();
		$data['mood'] = $this->m_mood->get_all();
		$data['count'] = $this->db->query('select count(*) from mood_record')->row();
		$data['last_karyawan'] = $this->m_auth->get_log();
		$data['last_psikolog'] = $this->m_auth->get_log_psikolog();
		$data['count_download'] = $this->db->query("SELECT value FROM analytic WHERE name = 'klik'")->row();
		$data['count_log_psikolog'] = $this->db->query("SELECT COUNT(*) as count FROM log_login WHERE datetime like '%$date%' and status = 'Psikolog'")->row();
		$data['count_log_Karyawan'] = $this->db->query("SELECT COUNT(*) as count FROM log_login WHERE datetime like '%$date%' and status = 'Karyawan'")->row();
		$this->template->view('dashboard/index', $data);
	}

}
