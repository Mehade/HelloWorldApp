<?php

class Item extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('item_model');
        $this->load->model('category_model');
        $this->load->library('pagination');
    }

    public function index() {
        $this->load->view('admin/items_create');
    }

    public function search_view() {
        $checkedValue = $this->input->post('radio');

        if ($checkedValue == 'category') {
            $categoryId = $this->input->post('category_id');
            $this->showByCat($categoryId);
        }
        if ($checkedValue == 'itemName') {
            $item_name = $this->input->post('item_name');
            $this->showByItem($item_name);
        }
    }

    public function showByCat($cat = 0) {
        if ($cat == 0) {
            $this->item_model->category_id = $this->uri->segment(3);
            $cat = $this->uri->segment(3);
        } else {
            $this->item_model->category_id = $cat;
        }

        if ($this->item_model->NumberOfItems() > 0) {
            $config['base_url'] = 'http://localhost/kenakata/item/showByCat/' . $cat;
            $config['total_rows'] = $this->item_model->NumberOfItems();
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
            $data['ItemViewList'] = $this->item_model->item_wise_search_cat($config['per_page'], $this->uri->segment(3));
            //$categoryList = kanakata_category_list();

            $this->load->view('admin/view_search_items', $data);
        }
    }

    public function showByItem($cat = '') {

        if ($cat == '') {
            $this->item_model->item_name = $this->uri->segment(3);
            $cat = $this->uri->segment(3);
        } else {
            $this->item_model->item_name = $cat;
        }


        if ($this->item_model->nemberOFIntemByName() > 0) {
            $config['base_url'] = 'http://localhost/kenakata/item/showByItem/' . $cat;
            $config['total_rows'] = $this->item_model->nemberOFIntemByName();
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
            $data['ItemViewList'] = $this->item_model->item_wise_search($config['per_page'], $this->uri->segment(4));
            $this->load->view('admin/view_search_items', $data);
        }
    }

    public function detailsOfAnItem() {
        $itemId = $this->uri->segment(3);
        $this->item_model->item_id = $itemId;
        $data['alist'] = $this->item_model->getItemDetails();
        $this->load->view('details_an_item', $data);
    }

    public function insert_item() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required|callback_has_item_name');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required');
        $this->form_validation->set_rules('category_id', 'Category Id', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('view_items', $data);
        } else {

            $this->load->library('image_lib');
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = true;
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();

                $this->load->view('view_items', $data);
            } else {
                $data = $this->upload->data();
                $path = './upload/';
                $source_image = $data['file_name'];

// Resize to medium

                $config['source_image'] = $path . $source_image;
                $config['create_thumb'] = true;
                $config['thumb_marker'] = "_thurm";
                $config['width'] = 200;
                $config['height'] = 200;

                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize()) {
// an error occured
                }

                $this->item_model->item_name = $this->input->post('item_name');
                $this->item_model->item_unit_price = $this->input->post('unit_price');
                $this->item_model->category_id = $this->input->post('category_id');
                $this->item_model->item_image = $data['raw_name'] . "_thurm" . $data['file_ext'];

                $this->item_model->insert_item();
                $this->session->set_flashdata('msg', 'Data Inserted Successfully');
                redirect('item', 'refresh');
            }
        }
    }

    public function has_item_name($name) {
        $this->item_model->item_name = $name;
        if ($this->item_model->has_item_name()) {
            $this->form_validation->set_message('has_item_name', 'Sorry, Item Name already exist');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function search() {
        $config['base_url'] = 'http://localhost/kenakata/item/search';
        $config['total_rows'] = $this->item_model->NumberOfItems();
        $config['per_page'] = 5;
        $config['num_links'] = 5;
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
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
        $data['ItemViewList'] = $this->item_model->item_wise_search($config['per_page'], $this->uri->segment(3));
        $this->load->view('admin/view_search_items', $data);
    }

    public function name() {
        $this->item_model->item_name = $this->uri->segment(3);
        if ($this->item_model->nemberOFIntemByName() > 0) {
            $config['base_url'] = 'http://localhost/kenakata/item/name/' . $this->uri->segment(3);
            $config['total_rows'] = $this->item_model->nemberOFIntemByName();
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
            $data['ItemViewList'] = $this->item_model->item_wise_search($config['per_page'], $this->uri->segment(4));
            $this->load->view('view_search_item', $data);
        }
    }

    public function update_price_view() {
        $categoryList = kanakata_category_list();
        $data['itemList'] = $this->item_model->get_all_item();
        $this->load->view('admin/update_price', $data);
    }

    public function update_price() {
        $this->item_model->item_id = $this->input->post('prductId');
        $this->item_model->item_unit_price = $this->input->post('new_price');
        $this->item_model->updatePrice();
        $this->session->set_flashdata('update', 'Price Updated Successfully');
        redirect('item/update_price_view', 'refresh');
    }

    public function getCategoryForItem() {
        $this->item_model->category_id = $this->input->post('id');
        $cat = $this->item_model->getCategoryForItem();
        echo json_encode($cat);
    }

    public function getCategorywiseItemList() {
        $this->item_model->item_id = $this->input->post('id');
        $item = $this->item_model->getCategorywiseItem();
        echo json_encode($item);
    }

    public function all_item_name() {
        $this->item_model->item_name = $this->input->post('search');
        $data['itemlist'] = $this->item_model->allItemSearchByName();
        $this->load->view('all_item_search', $data);
    }

}
