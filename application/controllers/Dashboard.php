<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$this->template->view('dashboard/index');
	}

}
