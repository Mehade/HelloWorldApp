<?php

class Category_model extends CI_Model {

    public $category_id;
    public $category_name;

    public function insert_category() {
        $data = array(
            "category_name" => $this->category_name
        );

        $this->db->insert('category', $data);
    }

    public function get_all_category() {
        $this->db->select('*');
        $this->db->from('category');        
        $query = $this->db->get();
        return $query->result();
    }

    public function has_category_name() {
        $this->db->where('category_name', $this->category_name);
        $query = $this->db->get('category');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_category_name() {
        $this->db->select('category_name');
        $this->db->from('category');
        $this->db->where('category_id', $this->category_id);
        $query = $this->db->get();
        return $query->row();
    }

}
