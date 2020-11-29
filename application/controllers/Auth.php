<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->library('bcrypt');
		$this->load->model('m_auth');
		date_default_timezone_set("Asia/Makassar");
		//load model
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	function aksi_login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email
			);
		$cek = $this->m_auth->cek_login($where);
		$cek_hrd = $this->m_auth->cek_login_hrd($where);
		if($cek->num_rows() > 0){
			foreach ($cek->result() as $row)
			{
				if($this->bcrypt->check_password($password, $row->password)){
					$data_session = array(
						'nama' => $email,
						'status' => "login",
						'level' => "Administrator",
						'id' => $row->id
						);

					$this->session->set_userdata($data_session);

					redirect(base_url("dashboard/"));
				} else {
					echo "Password anda tidak sesuai !";		
				}
			}
		} elseif($cek_hrd->num_rows() > 0) {
			foreach ($cek_hrd->result() as $row)
			{
				if($this->bcrypt->check_password($password, $row->password)){
					$data_session = array(
						'nama' => $email,
						'status' => "login",
						'level' => "Hrd",
						'id' => $row->id
						);

					$this->session->set_userdata($data_session);

					redirect(base_url("dashboard/"));
				} else {
					redirect(base_url("auth/"));		
				}
			}
		} else{
			redirect(base_url("auth/"));		
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth/'));
	}
}
