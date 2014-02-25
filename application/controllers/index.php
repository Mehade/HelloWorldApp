<?php
class Index extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('item_model');
    }
    
    public function index() {
      
        $data['itemlist'] = $this->item_model->hotsells();
        $this->load->view('index', $data);
    }
}
