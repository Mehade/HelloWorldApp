<?php


class Discount_model extends CI_Model {
    
    public $id;
    public $item_id;
    public $discount;
    public $start_date;
    public $end_date;
    
    public function insert_discount() {

        $data = array(
            "item_id" => $this->item_id,
            "discount" => $this->discount,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date
        );

        $this->db->insert('discount', $data);
    }
    
    
}
