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
		$date = date('Y-m-d');
		$select = $this->db->query("select * from analytic where datetime like '$date%'");
		$data = array(
			'name' 		=> 'klik',
			'value' 	=> 1,
			'datetime' 	=> date('Y-m-d H:i:s'),
		);
		if($select->num_rows() > 0){
			$insert = $this->db->query("UPDATE analytic SET value=value+1 WHERE datetime like '$date%' and  name = 'klik'");
		}else {
			$insert = $this->db->insert('analytic', $data);
		}
		
		redirect("https://drive.google.com/file/d/1_iStZ085zEB_LPgav3bgHc3ZITX2fdJr/view?usp=sharing");
	}

	

}
