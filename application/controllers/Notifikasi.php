<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		//load model
		$this->load->library('template');
		$this->load->model('m_mood');
	}

	public function notif() {
		$token_deivce = $this->input->post('token');
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
				"body":"anda menerima pesan dari hrd"
			}
		  }',
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: key=AAAATlTbhi4:APA91bFipNGjoz4HJp44Aj1JR6z9TFSnaw_TXZJIsmNnPeJls2K_4TdTd9qqf0HIyKrGt3Oaj70ovxoBpUtI2dsog77j7QQKebs2fGiQEi1dF74Hljfha5o4IHL2Xs3MaQw3vetMuIw0"
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}

	public function notif_chat() {
		$token_deivce = $this->input->post('token');
		$isi_pesan = $this->input->post('isi_pesan');
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
				"body":"'.$isi_pesan.'"
			}
		  }',
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/json",
			"Authorization: key=AAAATlTbhi4:APA91bFipNGjoz4HJp44Aj1JR6z9TFSnaw_TXZJIsmNnPeJls2K_4TdTd9qqf0HIyKrGt3Oaj70ovxoBpUtI2dsog77j7QQKebs2fGiQEi1dF74Hljfha5o4IHL2Xs3MaQw3vetMuIw0"
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}

}
