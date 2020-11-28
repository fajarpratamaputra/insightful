<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonNews extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_news');
	}

	public function getNews()
	{
		$news = $this->m_news->get_news_category();
		foreach($news as $ne) {
			$res[] = [
				'id' => $ne->id,
				'title' => $ne->title,
				'banner'=> base_url('assets/profile/').$ne->banner,
				'description' => $ne->description,
				'category' => $ne->cat,
				'author' => $ne->author
			];
		}

		$data['data'] = $res; 
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($data, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function getNewsSearch()
	{
		$title = $this->input->post('title');
		$news = $this->m_news->get_news_search($title);
		$data['data'] = 'null'; 
		if(empty($news)) {
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))
			->_display();
			exit;
		}
		foreach($news as $ne) {
			$res[] = [
				'id' => $ne->id,
				'title' => $ne->title,
				'banner'=> base_url('assets/profile/').$ne->banner,
				'description' => $ne->description,
				'category' => $ne->cat,
				'author' => $ne->author
			];
		}

		$data['data'] = $res; 
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($data, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function getNewsDetail()
	{
		$id = $this->input->post('id');
		$news = $this->m_news->get_news_detail($id);
		$data['data'] = 'null'; 
		if(empty($news)) {
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))
			->_display();
			exit;
		}
		foreach($news as $ne) {
			$res[] = [
				'id' => $ne->id,
				'title' => $ne->title,
				'banner'=> base_url('assets/profile/').$ne->banner,
				'description' => $ne->description,
				'category' => $ne->cat,
				'author' => $ne->author
			];
		}

		$data['data'] = $res; 
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($data, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

}
