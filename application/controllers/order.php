<?php

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('order_item_model');
        $this->load->library('pagination');
    }

    public function index() {
        $this->load->view('order_confirmation_page');
    }

    public function orderInsert() {
        $date = date("Y");
        $time = time();
        $order_id = $this->order_model->id;

        $order_number = $date . $time . $order_id;


        if ($this->session->userdata('user_id')) {
            $this->order_model->order_number = $order_number;
            $this->order_model->user_id = $this->input->post('user_id');
            $this->order_model->billing_address = $this->input->post('defaultBillAdd');
            $this->order_model->shipping_address = $this->input->post('defaultShipAdd');
            $inserttedId = $this->order_model->order_insert();

            $this->order_item_model->order_id = $inserttedId;
            $this->order_item_model->order_item_insert();
            $this->cart->destroy();

            $order_msg = array(
                'order_number' => $order_number
            );
            $this->session->set_userdata($order_msg);
            redirect('order/complete', 'refresh');
        } else {

            $this->order_model->order_number = $order_number;
            $this->order_model->user_id = $this->input->post('user_id');
            $this->order_model->billing_address = $this->input->post('differentBillAdd');
            $this->order_model->shipping_address = $this->input->post('sameAddBill');
            $inserttedId = $this->order_model->order_insert();

            $this->order_item_model->order_id = $inserttedId;
            $this->order_item_model->order_item_insert();
            $this->cart->destroy();

            $order_msg = array(
                'order_number' => $order_number
            );
            $this->session->set_userdata($order_msg);
            redirect('order/complete', 'refresh');
        }
    }

    public function complete() {
        $this->load->view('confirmation');
    }

    public function search_orders() {
        $checkedValue = $this->input->post('radio');
        if ($checkedValue == '2') {

            if ($this->order_model->numberOfOrders() > 0) {
                $config['base_url'] = 'http://localhost/kenakata/order/search_orders';
                $config['total_rows'] = $this->order_model->numberOfOrders();
                $config['per_page'] = 5;
                $config['num_links'] = 5;
                $config['prev_link'] = '&laquo;';
                $config['next_link'] = '&raquo;';
                $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
                $config['full_tag_close'] = ' </ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="">';
                $config['cur_tag_close'] = '</a></li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_open'] = '</li>';
                $config['last_link'] = FALSE;
                $config['first_link'] = FALSE;
                $this->pagination->initialize($config);
                $data['orderViewList'] = $this->order_model->search_delivered_orders($config['per_page'], $this->uri->segment(3));
                $this->load->view('admin/view_orders_details', $data);
            }
        }
        if ($checkedValue == '0') {

            if ($this->order_model->numberOfOrders() > 0) {
                $config['base_url'] = 'http://localhost/kenakata/order/search_orders';
                $config['total_rows'] = $this->order_model->numberOfOrders();
                $config['per_page'] = 5;
                $config['num_links'] = 5;
                $config['prev_link'] = '&laquo;';
                $config['next_link'] = '&raquo;';
                $config['full_tag_open'] = '<ul  class="pagination pagination-lg">';
                $config['full_tag_close'] = ' </ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="">';
                $config['cur_tag_close'] = '</a></li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_open'] = '</li>';
                $config['last_link'] = FALSE;
                $config['first_link'] = FALSE;
                $this->pagination->initialize($config);
                $data['orderViewList'] = $this->order_model->search_cancelled_orders($config['per_page'], $this->uri->segment(3));
                $this->load->view('admin/view_orders_details', $data);
            }
        }
        if ($checkedValue == '1') {

            if ($this->order_model->numberOfOrders() > 0) {
                $config['base_url'] = 'http://localhost/kenakata/order/search_orders';
                $config['total_rows'] = $this->order_model->numberOfOrders();
                $config['per_page'] = 5;
                $config['num_links'] = 5;
                $config['prev_link'] = '&laquo;';
                $config['next_link'] = '&raquo;';
                $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
                $config['full_tag_close'] = ' </ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="">';
                $config['cur_tag_close'] = '</a></li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_open'] = '</li>';
                $config['last_link'] = FALSE;
                $config['first_link'] = FALSE;
                $this->pagination->initialize($config);
                $data['orderViewList'] = $this->order_model->search_pending_orders($config['per_page'], $this->uri->segment(3));
                $this->load->view('admin/view_orders_details', $data);
            }
        }
    }

    public function search() {
        $config['base_url'] = 'http://localhost/kenakata/order/search';
        $config['total_rows'] = $this->order_model->numberOfOrders();
        $config['per_page'] = 4;
        $config['num_links'] = 4;
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = ' </ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_open'] = '</li>';
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $this->pagination->initialize($config);
        $data['orderViewList'] = $this->order_model->search_all_orders($config['per_page'], $this->uri->segment(3));
        $this->load->view('admin/view_orders_details', $data);
    }

    public function getdataFromOrder() {
        $this->order_model->id = $this->input->post('id');
        $msg = $this->order_model->getOrders();
        $info = $this->order_model->getOrder_items();
        $result = array("msg" => $msg, "info" => $info);
        echo json_encode($result);
    }

    public function updateStatus() {
        $this->order_model->id = $this->input->post('orderId');
        $this->order_model->delivery_status = $this->input->post('orderChangeStatus');
        $this->order_model->updateStatus();
        $msg = array("msg" => "Update Successfully");
        echo json_encode($msg);
    }

}
