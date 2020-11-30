<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatGroup extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->model('m_chatgroup');
		$this->load->model('m_psikolog');
		$this->load->library('template');
		date_default_timezone_set("Asia/Makassar");
	}

	public function index()
	{
		$data['chatgroup'] = $this->m_chatgroup->get_all();
		$this->template->view('chatGroup/index',$data);
	}

	public function addChatGroup()
	{
		$data['psyco'] = $this->m_psikolog->get_all();
		$this->template->view('chatGroup/psikolog',$data);
	}

	public function insert()
	{
		$title 	  		= $this->input->post("title");
		$date 	  		= $this->input->post("date");
		$time 	  		= $this->input->post("time");
		$psycologist_id = $this->input->post("id");
		$token 			= $this->input->post("token");
		$data = array(
			'title' 		=> $title,
			'status' 		=> 0,
			'date' 			=> date('Y-m-d', strtotime($date)),
			'time' 			=> date('H:i:s', strtotime($time)),
			'psycologist_id'=> $psycologist_id
		);

		$this->m_chatgroup->add_chatgroup($data);
		//redirect
		redirect('chatGroup/');
	}

	public function edit()
	{
		$id_hrd = $this->uri->segment('3');
		$data['chatgroup'] = $this->m_chatgroup->edit_chatgroup($id_hrd);
		$data['psyco'] = $this->m_psikolog->get_all();
		$this->template->view('chatgroup/editChatGroup', $data);
	}

	public function update()
	{
		$title 	  		= $this->input->post("title");
		$date 	  		= $this->input->post("date");
		$time 	  		= $this->input->post("time");
		$psycologist_id = $this->input->post("psycolog");
		$id['id'] = $this->input->post('id');
		$data = array(
			'title' 		=> $title,
			'status' 		=> 0,
			'date' 			=> date('Y-m-d', strtotime($date)),
			'time' 			=> date('H:i:s', strtotime($time)),
			'psycologist_id'=> $psycologist_id
		);

		$this->m_chatgroup->update_chatgroup($data, $id);
		//redirect
		redirect('chatGroup/');
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$where = array('id' => $id);
		$this->m_chatgroup->delete_chatgroup($where);
		redirect('chatGroup/');
	}

	public function chat()
	{
		$this->template->view('chatGroup/chat');
	}
}
