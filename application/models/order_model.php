<?php

class Order_model extends CI_Model {

    public $id;
    public $order_number;
    public $date;
    public $user_id;
    public $delivery_status;
    public $billing_address;
    public $shipping_address;

    public function order_insert() {
        
        $data = array(
            "order_number" => $this->order_number,            
            "user_id" => $this->user_id,            
            "billing_address" => $this->billing_address,
            "shipping_address" => $this->shipping_address
        );  
        $this->db->insert('order', $data); 
        return $this->db->insert_id();
    }
    
    public function search_pending_orders($perPage, $limit) {
        $this->db->select('orders.id as id, orders.order_number as number, orders.date as date, orders.user_id as user, orders.shipping_address as address, order_item.item_qty as qty');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.id = order_item.order_id', 'INNER');
        $this->db->like('orders.delivery_status', 1);
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function search_delivered_orders($perPage, $limit) {
        $this->db->select('orders.id as id, orders.order_number as number, orders.date as date, orders.user_id as user, orders.shipping_address as address, order_item.item_qty as qty');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.id = order_item.order_id', 'INNER');
        $this->db->like('orders.delivery_status', 2);
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function search_cancelled_orders($perPage, $limit) {
        $this->db->select('orders.id as id, orders.order_number as number, orders.date as date, orders.user_id as user, orders.shipping_address as address, order_item.item_qty as qty');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.id = order_item.order_id', 'INNER');
        $this->db->like('orders.delivery_status', 0);
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function numberOfOrders() {
        $query = $this->db->get('orders');
        return count($query->result());
    }
       
}
