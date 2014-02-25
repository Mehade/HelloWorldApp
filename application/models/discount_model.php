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

    public function get_discount_items() {
      $query =  $this->db->query('SELECT item.item_id, item.item_name, item.item_description, (item.item_unit_price - discount.discount) as disprice, item.item_image,  discount.start_date, discount.end_date
                          FROM discount
                          INNER JOIN item
                          ON discount.item_id = item.item_id
                          WHERE CURDATE() BETWEEN discount.start_date AND  discount.end_date');
        
        return $query->result();
    }

}
