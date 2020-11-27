<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hrd extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "hrd";
    }

    public function get_all() {
        $query = $this->db->select('hrd.*, office.name')
                ->join('office', 'office.id = hrd.office_id')
                ->get($this->table);
        return $query->result();
    }

    public function add_hrd($data) {
        $insert = $this->db->insert($this->table, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function edit_hrd($id_hrd)
	{
		$query = $this->db->where("id", $id_hrd)
				->get($this->table);
        return $query->row();
    }

    public function update_hrd($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

    }
    
    public function delete_hrd($id)
	{
		$query = $this->db->delete($this->table, $id);
	}


}
