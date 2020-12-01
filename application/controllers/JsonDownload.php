<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonDownload extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_chatgroup');
		date_default_timezone_set("Asia/Makassar");
	}

	public function getApp()
	{
		$data = $this->db->query("UPDATE analytic SET value=value+1 WHERE id = '1'");
		
		redirect("https://drive.google.com/file/d/1_iStZ085zEB_LPgav3bgHc3ZITX2fdJr/view?usp=sharing");
	}

	

}
