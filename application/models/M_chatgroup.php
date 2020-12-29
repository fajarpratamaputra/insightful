<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_chatgroup extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "category_chat_group";
        $this->table_chat = "chat_group";
        $this->table_group_chat = "user_chat_group";
        $this->table_chat_counseling = "chat_couseling";
    }

    public function get_all() {
        $query = $this->db->select('ccg.*')
                ->from('category_chat_group as ccg')
                ->get();
        return $query->result();
    }

    public function get_by_email($id, $email, $status) {
        $query = $this->db->where('id', $id)
                ->where('psycologist_id', $email)
                ->where('status', $status)
                ->get($this->table);
        return $query->row();
    }

    public function get_for_psikolog($email, $status) {
        $query = $this->db->where('psycologist_id', $email)
                ->where('status', $status)
                ->get($this->table);
        return $query->result();
    }

    public function get_topic($id) {
        $query = $this->db->where('id', $id)
                ->get($this->table);
        return $query->row();
    }

    public function get_chat($id) {
        $query = $this->db->where('id_topic', $id)
                ->get($this->table_chat);
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
    
    public function add_chat($data) {
        $insert = $this->db->insert($this->table_chat, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function add_userchatgroup($data) {
        $insert = $this->db->insert($this->table_group_chat, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function add_chat_counseling($data) {
        $insert = $this->db->insert($this->table_chat_counseling, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }


}
