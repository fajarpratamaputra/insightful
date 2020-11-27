<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mood extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "office";
    }

    public function get_author_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function add_office($data) {
        $insert = $this->db->insert($this->table, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function edit_office($id_office)
	{
		$query = $this->db->where("id", $id_office)
				->get($this->table);
        return $query->row();
    }

    public function update_office($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

    }
    
    public function delete_office($id)
	{
		$query = $this->db->delete($this->table, $id);
	}


}
