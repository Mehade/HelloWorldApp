<?php

class Order_item_model extends CI_Model {

    public $id;
    public $order_id;
    public $item_id;
    public $item_qty;
    public $item_unit_price;

    public function order_item_insert() {
        foreach ($this->cart->contents() as $items) {
            $data = array(
                "order_id" => $this->order_id,
                "item_id" => $items['id'],
                "item_qty" => $items['qty'],
                "item_unit_price" => $items['price']
            );
            $this->db->insert('order_item',$data);
        }
    }

}
