<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kuesioner extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "kuesioner_report";
    }

    public function get_all() {
        $query = $this->db->query('select distinct email_user from kuesioner');
        return $query->result();
    }

    public function get_by_email($email, $email_psikolog, $note) {
        $query = $this->db->where('email_user', $email)
                    ->where('email_psikolog', $email_psikolog)
                    ->where('note', $note)
                    ->order_by('id', 'DESC')
                    ->limit(1)
                    ->get($this->table);
        return $query->row();
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
