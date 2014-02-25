<?php

class Stock extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('category_model');
    }

    public function index() {        
        $this->load->view('admin/stock_view');
    }

    public function search_item_view() {
        $data['categoryList'] = $this->category_model->get_all_category();
        $checkedValue = $this->input->post('radio');
        if ($checkedValue == 'category') {

            $this->item_model->category_id = $this->input->post('category_id');

            $data['ItemViewList'] = $this->item_model->cat_wise_stock_search();
            $this->load->view('admin/stock_view', $data);


            //$data['ItemViewList'] = $this->item_model->item_wise_search_cat();
        }
        if ($checkedValue == 'item') {

            $this->item_model->item_name = $this->input->post('item_name');
            $data['ItemViewList'] = $this->item_model->item_wise_stock_search();

            $this->load->view('admin/stock_view', $data);
        }
        $data['categoryList'] = $this->category_model->get_all_category();
    }

    public function updateStock() {
        $this->item_model->item_id = $this->input->post('prductId');
        $this->item_model->item_present_qty = $this->input->post('nqty');
        $this->item_model->updateQty();
        redirect("stock/", "refresh");
    }

}
