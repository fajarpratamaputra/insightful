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


}
