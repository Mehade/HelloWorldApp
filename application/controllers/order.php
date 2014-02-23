<?php

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('order_item_model');
    }

    public function index() {
        $this->load->view('order_confirmation_page');         
    }

    public function orderInsert() {
        $date = date("Y");
        $time = time();
        $order_id = $this->order_model->id;

        $order_number = $date . $time . $order_id;

        $this->order_model->order_number = $order_number;
        $this->order_model->user_id = $this->input->post('user_id');
        $this->order_model->billing_address = $this->input->post('different_bill_add');
        $this->order_model->shipping_address = $this->input->post('different_ship_add');
        $inserttedId = $this->order_model->order_insert();
        
        $this->order_item_model->order_id = $inserttedId;
        $this->order_item_model->order_item_insert();
        $this->cart->destroy();
        
        $order_msg = array(
            'order_number' => $order_number
        );
        $this->session->set_userdata($order_msg);
        redirect('order/complete','refresh');
    }
    public function complete(){
        $this->load->view('order_confirmation_page');
    }

}
