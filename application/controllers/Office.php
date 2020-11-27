<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_office');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$data['office'] = $this->m_office->get_author_all();
		$this->template->view('office/index', $data);
	}

	public function addOffice()
	{
		$this->template->view('office/addOffice');
	}

	public function insert()
	{
		$name 	  = $this->input->post("office");
		$phone 	  = $this->input->post("phone");
		$email    = $this->input->post("email");
		$address  = $this->input->post("address");
		$data = array(
			'name' 		=> $name,
			'phone' 	=> $phone,
			'email' 	=> $email,
			'address' 	=> $address,
		);

		$this->m_office->add_office($data);
		//redirect
		redirect('office/');
	}

	public function edit()
	{
		$id_office = $this->uri->segment('3');
		$data['office'] = $this->m_office->edit_office($id_office);
		$this->template->view('office/editOffice', $data);
	}

	public function update()
	{
		$name 	  = $this->input->post("office");
		$phone 	  = $this->input->post("phone");
		$email    = $this->input->post("email");
		$address  = $this->input->post("address");
		$id['id'] = $this->input->post('id_office');
		$data = array(
			'name' 		=> $name,
			'phone' 	=> $phone,
			'email' 	=> $email,
			'address' 	=> $address,
		);

		$this->m_office->update_office($data, $id);
		//redirect
		redirect('office/');
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$where = array('id' => $id);
		$this->m_office->delete_office($where);
		redirect('office/');
	}
}
