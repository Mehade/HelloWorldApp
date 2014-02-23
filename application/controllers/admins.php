<?php

class Admins extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function admin_panel() {
        if ($this->session->userdata('user_email')) {
            $this->load->view('admin/main_page');
        } else {
            $this->load->view('admin/login');
        }
    }

    public function dashboard() {
        $this->load->view('admin/main_page');
    }

    public function error() {
        $this->load->view('admin/404');
    }
    
    
    public function create_user(){
        $this->load->view('admin/user_create');
    }

    public function user_entry() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'User Mail', 'required|callback_user_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required|');
        $this->form_validation->set_rules('user_contact', 'User Contact Information', 'required');
        $this->form_validation->set_rules('user_shipping_addr', 'User Shipping Address Details', 'required');
        $this->form_validation->set_rules('user_billing_addr', 'User Billing Address Details', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/admin_entry_view');
        } else {

            $this->admin_model->user_name = $this->input->post('user_name');
            $this->admin_model->user_email = $this->input->post('email');
            $this->admin_model->user_password = $this->input->post('user_password');
            $this->admin_model->user_contact = $this->input->post('user_contact');
            $this->admin_model->billing_address = $this->input->post('user_shipping_addr');
            $this->admin_model->shipping_address = $this->input->post('user_billing_addr');

            $this->admin_model->insert_user();
            $this->session->set_flashdata('user_insert_msg', 'Registration Successfully Completed');
            redirect('admins/create_user', 'refresh');
        }
    }

    function user_email($email) {
        $this->admin_model->user_email = $email;
        if ($this->admin_model->check_unique_user()) {
            $this->form_validation->set_message('user_email', 'Sorry, User already exist');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function loginChecker() {
        $this->admin_model->user_email = $this->input->post("email");
        $this->admin_model->user_password = $this->input->post("password");
        $error = "";
        if ($info = $this->admin_model->getAAdmin()) {
            $error = FALSE;
            $newdata = array(
                'user_id' => $info->user_id,
                'user_email' => $info->user_email,
                'billing_address' => $info->billing_address,
                'shipping_address' => $info->shipping_address,
                'role' => $info->role,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
        } else {
            $error = TRUE;
        }
        $msg = array("error" => $error);
        echo json_encode($msg);
    }

    public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('admins', 'refresh');
    }

}
