<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mood extends CI_Controller {

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
		$data['graph'] = $this->db->query('select * from datapenduduk')->result();
		$data['mood'] = $this->m_mood->get_all();
		$this->template->view('mood/index',$data);
	}

}
