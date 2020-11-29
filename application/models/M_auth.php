<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "superadmin";
    }
	
	function cek_login($where){
		return $this->db->get_where('superadmin',$where);
    }
    
  function cek_login_hrd($where){
		return $this->db->get_where('hrd',$where);
  }
  
  public function add_log($data) {
    $insert = $this->db->insert('log_login', $data);
    if ($insert) :
        return $this->db->insert_id();
    endif;
  }

  public function get_log() {
    $where = array('Karyawan','Non-Karyawan');
    $query = $this->db->where_in('status', $where)
                ->order_by('id', 'DESC')
                ->get('log_login');
    return $query->result();
  }

  public function get_log_psikolog() {
    $query = $this->db->where('status', 'Psikolog')
                ->order_by('id', 'DESC')
                ->get('log_login');
    return $query->result();
  }

  public function get_log_by_email($email, $username) {
    $query = $this->db->where('email', $email)
                ->where('username', $username)
                ->order_by('id', 'DESC')
                ->limit(1)
                ->get('log_login');
    return $query->row();
  }

  public function update_log($data, $id)
	{
		$query = $this->db->update('log_login', $data, $id);

    }


}
