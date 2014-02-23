<?php
class Order extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
    }
    
    public function insert() {
        
    }
    
    function test(){
        $this->load->helper('date');
        $datestring = "%d-%m-%Y";
$time = '2014-02-18 00:12:58';
$order_id = mdate($datestring, $time);

echo $order_id;
    }
}
