<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('m_hrd');
		$this->load->model('m_office');
		$this->load->library('template');
		$this->load->library('bcrypt');
	}

	public function index()
	{
		$data['hrd'] = $this->m_hrd->get_all();
		$this->template->view('hr/index',$data);
	}

	public function addHr()
	{
		$data['office'] = $this->m_office->get_author_all();
		$this->template->view('hr/addHr', $data);
	}

	public function insert()
    {
		$fullname 	= $this->input->post("fullname");
		$phone  	= $this->input->post("phone");
		$address 	= $this->input->post("address");
		$office_id 	= $this->input->post("office");
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
					'office_id' => $office_id,
					'fullname' 	=> $fullname,
					'phone' 	=> $phone,
					'address' 	=> $address,
					'photo' 	=> $gbr['file_name'],
					'email' 	=> $email,
					'password' 	=> $hash,
				);
                $this->m_hrd->add_hrd($data);
            }
        }else {
			$data = array(
				'office_id' => $office_id,
				'fullname' 	=> $fullname,
				'phone' 	=> $phone,
				'address' 	=> $address,
				'email' 	=> $email,
				'password' 	=> $hash,
			);
			$this->m_hrd->add_hrd($data);
		}
		
		redirect('hr/');

	}

	public function edit()
	{
		$id_hrd = $this->uri->segment('3');
		$data['hrd'] = $this->m_hrd->edit_hrd($id_hrd);
		$data['office'] = $this->m_office->get_author_all();
		$this->template->view('hr/editHr', $data);
	}

	public function update()
    {
		$fullname 	= $this->input->post("fullname");
		$phone  	= $this->input->post("phone");
		$address 	= $this->input->post("address");
		$office_id 	= $this->input->post("office");
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
                $config['width']= 800; //1680 × 900
                $config['height']= 600;
                $config['new_image']= './assets/profile/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$data = array(
					'office_id' => $office_id,
					'fullname' 	=> $fullname,
					'phone' 	=> $phone,
					'address' 	=> $address,
					'photo' 	=> $gbr['file_name'],
					'email' 	=> $email,
				);
                $this->m_hrd->update_hrd($data, $id);
            }
        }else {
			$data = array(
				'office_id' => $office_id,
				'fullname' 	=> $fullname,
				'phone' 	=> $phone,
				'address' 	=> $address,
				'email' 	=> $email,
			);
			$this->m_hrd->update_hrd($data, $id);
		}
		
		redirect('hr/');

	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$row = $this->db->where('id',$id)->get('hrd')->row();
		$where = array('id' => $id);
		$this->m_hrd->delete_hrd($where);
		if($row->photo != NULL){
			unlink('./assets/profile/'.$row->photo);
		}
		redirect('hr/');
	}
}
