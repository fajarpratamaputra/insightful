<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psikolog extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('m_psikolog');
		$this->load->library('template');
		$this->load->library('bcrypt');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
		date_default_timezone_set("Asia/Makassar");
	}

	public function index()
	{
		$data['psiko'] = $this->m_psikolog->get_all();
		$this->template->view('psikolog/index', $data);
	}

	public function addPsikolog()
	{
		$this->template->view('psikolog/addPsikolog');
	}

	public function insert()
    {
		$fullname 	= $this->input->post("fullname");
		$phone  	= $this->input->post("phone");
		$address 	= $this->input->post("address");
		$email 	  	= $this->input->post("email");
		$password  	= $this->input->post("password");
		$hash = $this->bcrypt->hash_password($password);
		
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
					'fullname' 	=> $fullname,
					'phone' 	=> $phone,
					'address' 	=> $address,
					'photo' 	=> $gbr['file_name'],
					'email' 	=> $email,
					'password' 	=> $hash,
				);
                $this->m_psikolog->add_psiko($data);
            }
        }else {
			$data = array(
				'fullname' 	=> $fullname,
				'phone' 	=> $phone,
				'address' 	=> $address,
				'email' 	=> $email,
				'password' 	=> $hash,
			);
			$this->m_psikolog->add_psiko($data);
		}
		
		redirect('psikolog/');

	}

	public function edit()
	{
		$id_psiko = $this->uri->segment('3');
		$data['psiko'] = $this->m_psikolog->edit_psiko($id_psiko);
		$this->template->view('psikolog/editPsikolog', $data);
	}

	public function update()
    {
		$fullname 	= $this->input->post("fullname");
		$phone  	= $this->input->post("phone");
		$address 	= $this->input->post("address");
		$email 	  	= $this->input->post("email");
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
                $config['width']= 1680; //1680 × 900
                $config['height']= 900;
                $config['new_image']= './assets/profile/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$data = array(
					'fullname' 	=> $fullname,
					'phone' 	=> $phone,
					'address' 	=> $address,
					'photo' 	=> $gbr['file_name'],
					'email' 	=> $email,
				);
                $this->m_psikolog->update_office($data, $id);
            }
        }else {
			$data = array(
				'fullname' 	=> $fullname,
				'phone' 	=> $phone,
				'address' 	=> $address,
				'email' 	=> $email,
			);
			$this->m_psikolog->update_office($data, $id);
		}
		
		redirect('psikolog/');

	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$row = $this->db->where('id',$id)->get('psycologist')->row();
		if($row->photo != NULL){
			unlink('./assets/profile/'.$row->photo);
		}
		$where = array('id' => $id);
		$this->m_psikolog->delete_psiko($where);
		redirect('psikolog/');
	}
}
