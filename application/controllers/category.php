<?php

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }

    public function index() {
        $data['categoryList'] = $this->category_model->get_all_category();
        $this->load->view('admin/category_create', $data);
    }

    public function insert_category() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cat_name', 'Category Name', 'required|callback_has_category_name');

        if ($this->form_validation->run() == FALSE) {
            $data['categoryList'] = $this->category_model->get_all_category();
            $this->load->view('admin/category_create', $data);
        } else {
            $this->category_model->category_name = $this->input->post('cat_name');
            $data['catdata'] = $this->category_model->insert_category();
            $data['categoryList'] = $this->category_model->get_all_category();
            $this->session->set_flashdata('msg', 'Data Inserted Successfully');
            redirect('category/index', 'refresh');            
        }
    }
   
   public function has_category_name($name) {
        $this->category_model->category_name = $name;
        if ($this->category_model->has_category_name()) {
            $this->form_validation->set_message('has_category_name', 'Sorry, Category Name already exist');
            return FALSE;
        } else {
            return TRUE;
        }
    } 
    
    
}
