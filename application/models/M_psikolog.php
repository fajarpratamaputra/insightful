<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_psikolog extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "psycologist";
    }

    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function add_psiko($data) {
        $insert = $this->db->insert($this->table, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function edit_psiko($id_psiko)
	{
		$query = $this->db->where("id", $id_psiko)
				->get($this->table);
        return $query->row();
    }

    public function update_office($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

    }
    
    public function delete_psiko($id)
	{
		$query = $this->db->delete($this->table, $id);
	}


}
