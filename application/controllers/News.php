<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->model('m_news');
		$this->load->model('m_category');
		$this->load->library('template');
	}

	public function index()
	{
		$data['news'] = $this->m_news->get_all();
		$this->template->view('news/index',$data);
	}

	public function addNews()
	{
		$data['category'] = $this->m_category->get_all();
		$this->template->view('news/addNews',$data);
	}

	public function insert()
    {
		$title 			= $this->input->post("title");
		$author 		= $this->input->post("author");
		$category 		= $this->input->post("category");
		$description 	= $this->input->post("description");
		
        $this->load->library('upload');
        $nmfile = "file-".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/profile/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '5048'; 
		$config['max_width']  = '4500'; //lebar maksimum 1288 px
        $config['max_height']  = '5500'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['file']['name'])
        {
            if ($this->upload->do_upload('file'))
            {
				$gbr = $this->upload->data();
				$config['image_library']='gd2';
                $config['source_image']='./assets/profile/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 800; //1680 × 900
                $config['height']= 600;
                $config['new_image']= './assets/profile/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$data = array(
					'title' 	=> $title,
					'category' 	=> $category,
					'author' 	=> $author,
					'description' 	=> $description,
					'banner' 	=> $gbr['file_name'],
					'status' 	=> 0,
				);
                $this->m_news->add_news($data);
            }
        }else {
			$data = array(
				'title' 	=> $title,
				'category' 	=> $category,
				'author' 	=> $author,
				'description' 	=> $description,
				'status' 	=> 0,
			);
			$this->m_news->add_news($data);
		}
		
		redirect('news/');

	}

	public function editNews()
	{
		$data['category'] = $this->m_category->get_all();
		$id_news = $this->uri->segment('3');
		$data['news'] = $this->m_news->edit_news($id_news);
		$this->template->view('news/editNews',$data);
	}

	public function update()
    {
		$title 			= $this->input->post("title");
		$author 		= $this->input->post("author");
		$category 		= $this->input->post("category");
		$description 	= $this->input->post("description");
		$id['id'] = $this->input->post('id');

        $this->load->library('upload');
        $nmfile = "file-".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/profile/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '5048'; 
		$config['max_width']  = '4500'; //lebar maksimum 1288 px
        $config['max_height']  = '5500'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['file']['name'])
        {
            if ($this->upload->do_upload('file'))
            {
				$gbr = $this->upload->data();
				$config['image_library']='gd2';
                $config['source_image']='./assets/profile/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 800; //1680 × 900
                $config['height']= 600;
                $config['new_image']= './assets/profile/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$data = array(
					'title' 	=> $title,
					'category' 	=> $category,
					'author' 	=> $author,
					'description' 	=> $description,
					'banner' 	=> $gbr['file_name'],
					'status' 	=> 0,
				);
                $this->m_news->update_news($data, $id);
            }
        }else {
			$data = array(
				'title' 	=> $title,
				'category' 	=> $category,
				'author' 	=> $author,
				'description' 	=> $description,
				'status' 	=> 0,
			);
			$this->m_news->update_news($data, $id);
		}
		
		redirect('news/');

	}

	public function publish()
	{

		$id = $this->uri->segment(3);
		$row = $this->db->where('id',$id)->get('news')->row();
		$id_news['id'] = $this->uri->segment(3);
		if($row->status == 1) {
			$status = 0;
		}else {
			$status = 1;
		}
		$data = array(
			'status' 		=> $status,
		);
		$this->m_news->update_news($data, $id_news);
		//redirect
		redirect('news/');
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$row = $this->db->where('id',$id)->get('news')->row();
		$where = array('id' => $id);
		$this->m_news->delete_news($where);
		if($row->photo != NULL){
			unlink('./assets/profile/'.$row->photo);
		}
		redirect('news/');
	}
}
