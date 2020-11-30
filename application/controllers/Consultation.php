<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultation extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_consultation');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
		date_default_timezone_set("Asia/Makassar");
	}

	public function index()
	{
		$data['consultation'] = $this->m_consultation->get_all();
		$this->template->view('consultation/index', $data);
	}

	public function detailConsultation()
	{
		$email = $this->input->get('email');
		$data['consultation'] = $this->m_consultation->get_by_email($email);
		$this->template->view('consultation/detail', $data);
	}

}
