<?php

class Order_model extends CI_Model {

    public $id;
    public $order_number;
    public $date;
    public $user_id;
    public $delivery_status;
    public $billing_address;
    public $shipping_address;

    public function insert() {
        $data = array(
            "order_number" => $this->order_number,
            "date" => $this->date,
            "user_id" => $this->user_id,
            "delivery_status" => $this->delivery_status,
            "billing_address" => $this->billing_address,
            "shipping_address" => $this->shipping_address
        );  
        $this->db->insert('order', $data); 
        return $this->db->insert_id();
    }
       
}
