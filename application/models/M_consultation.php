<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_consultation extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "consultation_report";
    }

    public function get_all() {
        $query = $this->db->query('select distinct username_user, email_user from consultation_report');
        return $query->result();
    }

    public function get_by_email($email) {
        $query = $this->db->where('email_user', $email)
                ->get($this->table);
        return $query->result();
    }

    public function add_consultation($data) {
        $insert = $this->db->insert($this->table, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function edit_consultation($id_consultation)
	{
		$query = $this->db->where("id", $id_consultation)
				->get($this->table);
        return $query->row();
    }

    public function update_consultation($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

    }
    
    public function delete_consultation($id)
	{
		$query = $this->db->delete($this->table, $id);
	}


}
