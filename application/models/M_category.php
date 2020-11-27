<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "category";
    }

    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function add_category($data) {
        $insert = $this->db->insert($this->table, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function edit_category($id_category)
	{
		$query = $this->db->where("id", $id_category)
				->get($this->table);
        return $query->row();
    }

    public function update_category($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

    }
    
    public function delete_category($id)
	{
		$query = $this->db->delete($this->table, $id);
	}


}
