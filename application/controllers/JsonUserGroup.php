<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsonUserGroup extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->model('m_chatgroup');
		date_default_timezone_set("Asia/Makassar");
	}

	public function insertUserChatGroup()
	{
		$uid_topic 	= $this->input->post('uid_topic');
		$id_topic  	= $this->input->post('id_topic');
		$email_user = $this->input->post('email_user');
		$token  	= $this->input->post('token');
		$date	   	= date('Y-m-d H:i:s');
		$data = array(
			'uid_topic' 	=> $uid_topic,
			'id_topic' 		=> $id_topic,
			'email_user' 	=> $email_user,
			'token' 		=> $token,
			'created_date' 	=> $date,
		);
		$res = null;

		$res = $this->m_chatgroup->add_userchatgroup($data);

		if(empty($res)) {
			$this->output
			->set_status_header(500)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))
			->_display();
			exit;
		}
		
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($data, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function notifUsergroup()
	{
		$date = date('Y-m-d');
		$time = strtotime(date('H:i:s'));
		$group = $this->db->query("SELECT * FROM category_chat_group where status = 0 and date = '$date' order by id ASC limit 1")->row();
		
		if(!empty($group)) {
			$time_group = strtotime($group->time);
			$diff  = $time - $time_group;
			$jam   = floor($diff / (60 * 60));
			$menit = $diff - $jam * (60 * 60);
			var_dump($menit);
	
			if(($menit >= 0) && ($menit <= 120)) {
				$group = $this->db->query("UPDATE category_chat_group SET status = 1 where status = 0 and date = '$date' order by id ASC limit 1");
			
				$usergroup = $this->db->query("SELECT * FROM user_chat_group where id_topic = 17 order by id ASC")->result();
	
				foreach ($usergroup as $ugroup) {
					$token_deivce = $ugroup->token;
					$token = '"'.$token_deivce.'"';
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
						"registration_ids":['.$token.'],
						"notification": {
							"title":"insightful",
							"body":"Chat Group yang anda ikuti akan segera dimulai, silahkan masuk ke aplikasi"
						}
					}',
					CURLOPT_HTTPHEADER => array(
						"Content-Type: application/json",
						"Authorization: key=AAAATlTbhi4:APA91bFipNGjoz4HJp44Aj1JR6z9TFSnaw_TXZJIsmNnPeJls2K_4TdTd9qqf0HIyKrGt3Oaj70ovxoBpUtI2dsog77j7QQKebs2fGiQEi1dF74Hljfha5o4IHL2Xs3MaQw3vetMuIw0"
					),
					));
	
					$response = curl_exec($curl);	
					}
	
					curl_close($curl);
			}
		}
		

		// if(empty($res)) {
		// 	$this->output
		// 	->set_status_header(500)
		// 	->set_content_type('application/json', 'utf-8')
		// 	->set_output(json_encode($res, JSON_PRETTY_PRINT))
		// 	->_display();
		// 	exit;
		// }
		
		// $this->output
		// ->set_status_header(200)
		// ->set_content_type('application/json', 'utf-8')
		// ->set_output(json_encode($data, JSON_PRETTY_PRINT))
		// ->_display();
		// exit;
	}


}
