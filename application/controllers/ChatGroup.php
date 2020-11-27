<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatGroup extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
	}

	public function index()
	{
		$this->template->view('chatGroup/index');
	}

	public function addChatGroup()
	{
		$this->template->view('chatGroup/addChatGroup');
	}

	public function chat()
	{
		$this->template->view('chatGroup/chat');
	}
}
