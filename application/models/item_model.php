<?php

class Item_model extends CI_Model {

    public $item_id;
    public $item_name;
    public $item_unit_price;
    public $item_image;
    public $category_id;
    public $item_present_qty;

    public function insert_item() {

        $data = array(
            "item_name" => $this->item_name,
            "item_unit_price" => $this->item_unit_price,
            "item_image" => $this->item_image,
            "category_id" => $this->category_id
        );

        $this->db->insert('item', $data);
    }

    public function updateQty() {
        $this->db->where('item_id',  $this->item_id);
        $this->db->set('item_present_qty', 'item_present_qty+'.$this->item_present_qty, FALSE);
        $this->db->update('item');
    }

    public function updatePrice() {
        $this->db->where('item_id',  $this->item_id);
        $this->db->set('item_unit_price', $this->item_unit_price, FALSE);
        $this->db->update('item');
    }
    
    public function get_all_category() {
        $query = $this->db->get('category');
        return $query->result();
    }

    public function has_item_name() {
        $this->db->where('item_name', $this->item_name);
        $query = $this->db->get('item');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function item_wise_search($perPage, $limit) {
        $this->db->select('item.item_id, item.item_name as name, item.item_unit_price as price, item.item_image as image, category.category_name as catName');
        $this->db->from('item');
        $this->db->join('category', 'item.category_id = category.category_id');
        $this->db->like('item.item_name', $this->item_name);
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }

    public function item_wise_search_cat($perPage, $limit) {

        $this->db->select('item.item_name as name, item.item_unit_price as price, item.item_image as image, category.category_name as catName');
        $this->db->from('item');
        $this->db->join('category', 'item.category_id = category.category_id');
        $this->db->like('item.category_id', $this->category_id);
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }

    public function NumberOfItems() {
        $query = $this->db->get('item');
        return count($query->result());
    }

    public function nemberOFIntemByName() {
        $this->db->like('item_name', $this->item_name);
        $query = $this->db->get('item');
        return count($query->result());
    }

    public function item_wise_stock_search() {
        $this->db->select('item.item_id,item.item_name as name,item.item_present_qty as qty, item.item_unit_price as price, item.item_image as image, category.category_name as catName');
        $this->db->from('item');
        $this->db->join('category', 'item.category_id = category.category_id');
        $this->db->like('item.item_name', $this->item_name);
        $query = $this->db->get();
        return $query->result();
    }

    public function cat_wise_stock_search() {

        $this->db->select('item.item_id,item.item_name as name,item.item_present_qty as qty, item.item_unit_price as price, item.item_image as image, category.category_name as catName');
        $this->db->from('item');
        $this->db->join('category', 'item.category_id = category.category_id');
        $this->db->like('item.category_id', $this->category_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_item() {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->order_by("item_name", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getCategoryForItem() {
        $this->db->where('category_id', $this->category_id);
        $query = $this->db->get('item');
        return $query->result_array();
    }
    
    public function getCategorywiseItem() {
        $this->db->select('item_id, item_unit_price as price');
        $this->db->from('item');
        $this->db->where('item_id', $this->item_id);
        $query = $this->db->get();
        return $query->row_array();
    }  
    public function getItemnameForDiscount() {
        $this->db->select('item_id as id, item_name as name, item_unit_price as price');
        $this->db->from('item');
        $this->db->where('item_id', $this->item_id);
        $query = $this->db->get();
        return $query->row_array();
    }  
    public function getCategoryWiseProduct($per_page, $limit) {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('category_id', $this->category_id);
        $this->db->limit($per_page, $limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getItemDetails() {
        $this->db->where('item_id', $this->item_id);
        $query = $this->db->get('item');
        return $query->row();
    }
}
