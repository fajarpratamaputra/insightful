<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_category');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$data['category'] = $this->m_category->get_all();
		$this->template->view('category/index', $data);
	}

	public function addCategory()
	{
		$this->template->view('category/addCategory');
	}

	public function insert()
	{
		$category 	  = $this->input->post("category");
		$data = array(
			'category' 		=> $category,
		);

		$this->m_category->add_category($data);
		//redirect
		redirect('category/');
	}

	public function edit()
	{
		$id_category = $this->uri->segment('3');
		$data['category'] = $this->m_category->edit_category($id_category);
		$this->template->view('category/editCategory', $data);
	}

	public function update()
	{
		$category 	  = $this->input->post("category");
		$id['id'] = $this->input->post('id_category');
		$data = array(
			'category' 		=> $category,
		);

		$this->m_category->update_category($data, $id);
		//redirect
		redirect('category/');

	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$where = array('id' => $id);
		$this->m_category->delete_category($where);
		redirect('category/');
	}
}
