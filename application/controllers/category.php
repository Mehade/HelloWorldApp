<?php

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('item_model');

        $this->load->library('pagination');
    }

    public function index() {
        $data['categoryList'] = $this->category_model->get_all_category();
        $this->load->view('admin/category_create', $data);
    }

    public function show() {
        $categoryList = kanakata_category_list();
        $catId = $this->uri->segment(3);
        if ($this->uri->segment(4)) {
            $start = $this->uri->segment(4);
        } else {
            $start = 0;
        }
        $this->item_model->category_id = $catId;
        $this->category_model->category_id = $catId;
        $data['catName'] = $this->category_model->get_category_name();
        $config['uri_segment'] = 4;
        $config['base_url'] = 'http://localhost/kenakata/category/show/' . $catId;
        $config['total_rows'] = $this->item_model->NumberOfItems();
        $config['per_page'] = 9;
        $config['num_links'] = 5;
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['full_tag_open'] = '<ul class="pagination">';
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
        $data['itemlist'] = $this->item_model->getCategoryWiseProduct($config['per_page'], $start);
        $this->load->view('show_items', $data);
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
