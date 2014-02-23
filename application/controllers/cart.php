<?php

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('admin_model');
        $this->load->library('cart');
    }

    public function index() {
        $data['itemList'] = $this->item_model->get_all_item();
        $this->load->view('cart/view_cart_items', $data);
    }

    public function checkoutView() {
        $this->load->view('check_out_view');
    }
    
    public function mehadi(){
        echo '<pre>';
        print_r($this->cart->contents());
        echo '</pre>';
    }

    public function add_to_cart() {

        $pid = $this->input->post('item_id');
        $pimage = $this->input->post('item_image');
        $pname = $this->input->post('item_name');
        $pprice = $this->input->post('item_price');
        $pqty = $this->input->post('quantity');

        if ($this->cart->contents()) {

            if ($info = $this->checkProductAlready($pid)) {
                $data = array(
                    'rowid' => $info,
                    'qty' => $pqty
                );

                $this->cart->update($data);
            } else {
                $data = array(
                    'id' => $pid,
                    'qty' => $pqty,
                    'price' => $pprice,
                    'name' => $pname,
                    'options' => array('image' => $pimage)
                );

                $this->cart->insert($data);
            }
        } else {
            $data = array(
                'id' => $pid,
                'qty' => $pqty,
                'price' => $pprice,
                'name' => $pname,
                'options' => array('image' => $pimage)
            );

            $this->cart->insert($data);
        }

        $this->load->view('mycc');
    }

    private function checkProductAlready($id) {
        foreach ($this->cart->contents() as $items) {
            if ($items['id'] == $id) {
                return $items['rowid'];
            }
        }
        return false;
    }

    public function updateCarts() {
        $productId = $this->input->post("id");
        $quantity = $this->input->post("qty");

        $data = array(
            'rowid' => $productId,
            'qty' => $quantity
        );

        $this->cart->update($data);
        $unitprice = '';
        $subtotal = '';
        $grandtotal = '';
        $totalItem = $this->cart->total_items();
       foreach ($this->cart->contents() as $items) {
            if ($items['rowid'] == $productId) {
                $unitprice = $this->cart->format_number($items['price']);
                $subtotal = $this->cart->format_number($items['subtotal']); 
               
            }
        }
         $grandtotal = $this->cart->format_number($this->cart->total());
        $result = array("message"=>true,"unit"=>$unitprice,"sub"=>$subtotal,"total"=>$grandtotal,"totalItem"=>$totalItem);
        echo json_encode($result);
    }

}
