<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		date_default_timezone_set("Asia/Makassar");
	}

	public function index()
	{
		$this->template->view('employee/index');
	}

	public function addEmployee()
	{
		$this->template->view('employee/addEmployee');
	}
}
