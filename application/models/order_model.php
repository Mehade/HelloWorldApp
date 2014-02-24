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
    
    
    public function search_all_orders($perPage, $limit) {
        $this->db->select('orders.id as id, orders.order_number as number, orders.date as date, orders.user_id as user, orders.shipping_address as address, order_item.item_qty as qty');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.id = order_item.order_id', 'INNER');
        $this->db->group_by("orders.order_number", "asc");
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function search_pending_orders($perPage, $limit) {
        $this->db->select('orders.id as id, orders.order_number as number, orders.date as date, orders.user_id as user, orders.shipping_address as address, order_item.item_qty as qty');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.id = order_item.order_id', 'INNER');
        $this->db->group_by("orders.order_number", "asc");
        $this->db->where('orders.delivery_status', 1);
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function search_delivered_orders($perPage, $limit) {
        $this->db->select('orders.id as id, orders.order_number as number, orders.date as date, orders.user_id as user, orders.shipping_address as address, order_item.item_qty as qty');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.id = order_item.order_id', 'INNER');
        $this->db->group_by("orders.order_number", "asc");
        $this->db->where('orders.delivery_status', 2);
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function search_cancelled_orders($perPage, $limit) {
        $this->db->select('orders.id as id, orders.order_number as number, orders.date as date, orders.user_id as user, orders.shipping_address as address, order_item.item_qty as qty');
        $this->db->from('orders');
        $this->db->join('order_item', 'orders.id = order_item.order_id', 'INNER');
        $this->db->group_by("orders.order_number", "asc");
        $this->db->where('orders.delivery_status', 0);
        $this->db->limit($perPage, $limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function numberOfOrders() {
        $query = $this->db->get('orders');
        return count($query->result());
    }
    
    public function getOrders() {
        $this->db->select('orders.id, orders.order_number, orders.date, user.user_id, orders.billing_address, orders.shipping_address, orders.delivery_status, count(order_item.item_qty) as qty');
        $this->db->from('orders');
        $this->db->join('user', 'orders.user_id = user.user_id', 'LEFT');
        $this->db->join('order_item', 'orders.id = order_item.order_id', 'INNER');
        $this->db->where('orders.id', $this->id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function getOrder_items() {
        $this->db->select('orders.id  as orderId, item.item_name as name, order_item.item_qty as quantity, order_item.item_unit_price as price, (order_item.item_unit_price * order_item.item_qty) as subtotal');
        $this->db->from('order_item');
        $this->db->join('item', 'order_item.item_id = item.item_id', 'INNER');
        $this->db->join('orders', 'order_item.order_id = orders.id', 'INNER');
        $this->db->where('order_item.order_id', $this->id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function updateStatus() {
        $data = array(
            'delivery_status' => $this->delivery_status
        );
        $this->db->where('id', $this->id);
        $this->db->update('orders', $data);
    }
       
}
