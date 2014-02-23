<?php
class Index extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }
    
    public function index() {
        $data['categoryList'] = $this->category_model->get_all_category();
        $this->load->view('index', $data);
    }
}
