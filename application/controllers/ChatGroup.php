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
		$username 		= $this->input->post("username");
		$token 			= $this->input->post("token");
		$data = array(
			'title' 		=> $title,
			'status' 		=> 0,
			'date' 			=> date('Y-m-d', strtotime($date)),
			'time' 			=> date('H:i:s', strtotime($time)),
			'psycologist_id'=> $psycologist_id,
			'username'		=> $username,
			'token'			=> $token
		);

		$this->m_chatgroup->add_chatgroup($data);

		$token_deivce = $token;
		$token_user = '"'.$token_deivce.'"';
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS =>'{
			"registration_ids":['.$token_user.'],
			"notification": {
				"title":"insightful",
				"body":"Anda menerima permintaan konsultasi grup"
			}
		  }',
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: key=AAAATlTbhi4:APA91bFipNGjoz4HJp44Aj1JR6z9TFSnaw_TXZJIsmNnPeJls2K_4TdTd9qqf0HIyKrGt3Oaj70ovxoBpUtI2dsog77j7QQKebs2fGiQEi1dF74Hljfha5o4IHL2Xs3MaQw3vetMuIw0"
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
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
		$id = $this->uri->segment(3);
		$data['chat_group'] = $this->m_chatgroup->get_chat($id);
		// var_dump($data['chat_group']);
		$this->template->view('chatGroup/chat', $data);
	}
}
