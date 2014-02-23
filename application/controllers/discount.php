<?php

class Discount extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('category_model');
        $this->load->model('item_model');
        $this->load->model('discount_model');
    }

    public function index() {

        $data['categoryList'] = $this->item_model->get_all_category();
        $this->load->view('discount_view', $data);
    }

    public function getCategoryForItem() {
        $this->item_model->category_id = $this->input->post('id');
        $cat = $this->item_model->getCategoryForItem();
        echo json_encode($cat);
    }

    public function getItemnameForDiscount() {
        $this->item_model->item_id = $this->input->post('id');
        $item = $this->item_model->getItemnameForDiscount();
        echo json_encode($item);
    }

    public function insert_discount() {
        
        $cal = $this->input->post('unit_price') * $this->input->post('discount_price')/100;
        
        $this->discount_model->item_id = $this->input->post('item_id');
        $this->discount_model->discount = $cal;
        $this->discount_model->start_date = $this->input->post('strtDate');
        $this->discount_model->end_date = $this->input->post('endDate');
        $this->discount_model->insert_discount();
        $this->session->set_flashdata('msg', 'Discount Insert Successfully');       
        redirect('discount/index', 'refresh');
        
    }

}
