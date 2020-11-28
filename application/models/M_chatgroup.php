<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_chatgroup extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "category_chat_group";
    }

    public function get_all() {
        $query = $this->db->select('ccg.*, p.fullname')
                ->from('category_chat_group as ccg')
                ->join('psycologist as p', 'p.id = ccg.psycologist_id')
                ->get();
        return $query->result();
    }

    public function add_chatgroup($data) {
        $insert = $this->db->insert($this->table, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function edit_chatgroup($id_chatgroup)
	{
		$query = $this->db->where("id", $id_chatgroup)
				->get($this->table);
        return $query->row();
    }

    public function update_chatgroup($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

    }
    
    public function delete_chatgroup($id)
	{
		$query = $this->db->delete($this->table, $id);
	}


}
