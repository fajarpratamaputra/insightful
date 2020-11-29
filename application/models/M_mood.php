<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mood extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "mood_record";
    }

    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_by_email($email, $date) {
        if(!empty($date)) {
            $query = $this->db->where('employee_email', $email)
                ->where('date', $date)
                ->get($this->table);
        } else {
            $query = $this->db->where('employee_email', $email)
                ->get($this->table);
        }
        return $query->result();
    }

    public function get_by_email_date($email, $date) {
        if(!empty($date)) {
            $query = $this->db->where('employee_email', $email)
                ->where('date', $date)
                ->get($this->table);
        } else {
            $query = $this->db->where('employee_email', $email)
                ->get($this->table);
        }
        
        return $query->result();
    }

    public function add_mood($data) {
        $insert = $this->db->insert($this->table, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function edit_mood($id_mood)
	{
		$query = $this->db->where("id", $id_mood)
				->get($this->table);
        return $query->row();
    }

    public function update_mood($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

    }
    
    public function delete_mood($id)
	{
		$query = $this->db->delete($this->table, $id);
	}


}
