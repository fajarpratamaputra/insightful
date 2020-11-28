<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_news extends CI_model{

    function __construct() {
        parent::__construct();
        $this->table = "news";
    }

    public function get_all() {
        $query =$this->db
                ->order_by('id', 'DESC')
                // ->limit(10)
                ->get($this->table);
        return $query->result();
    }

    public function get_news_category() {
        $query =$this->db->select('news.*, category.category as cat')
                ->from('news')
                ->join('category','category.id = news.category')
                ->where('status', '1')
                ->order_by('news.id', 'DESC')
                ->limit(10)
                ->get();
        return $query->result();
    }

    public function get_news_search($title) {
        $query =$this->db->select('news.*, category.category as cat')
                ->from('news')
                ->join('category','category.id = news.category')
                ->like('news.title', $title)
                ->order_by('news.id', 'DESC')
                ->limit(10)
                ->get();
        return $query->result();
    }

    public function get_news_detail($id) {
        $query =$this->db->select('news.*, category.category as cat')
                ->from('news')
                ->join('category','category.id = news.category')
                ->where('news.id', $id)
                ->order_by('news.id', 'DESC')
                ->limit(10)
                ->get();
        return $query->result();
    }

    public function get_news_detail_category($id_category) {
        $query =$this->db->select('news.*, category.category as cat')
                ->from('news')
                ->join('category','category.id = news.category')
                ->where('news.category', $id_category)
                ->order_by('news.id', 'DESC')
                ->get();
        return $query->result();
    }

    public function add_news($data) {
        $insert = $this->db->insert($this->table, $data);
        if ($insert) :
            return $this->db->insert_id();
        endif;
    }

    public function edit_news($id_news)
	{
		$query = $this->db->where("id", $id_news)
				->get($this->table);
        return $query->row();
    }

    public function update_news($data, $id)
	{
		$query = $this->db->update($this->table, $data, $id);

    }
    
    public function delete_news($id)
	{
		$query = $this->db->delete($this->table, $id);
	}


}
