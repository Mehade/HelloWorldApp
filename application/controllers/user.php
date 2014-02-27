<?php
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    public function index() {
        $this->load->view('register_login');
    }
    
    public function my_account_info() {
         $this->load->view('my_account_info');
    }
    
    public function edit_profile() {
         $this->load->view('edit_profile');
    }
    
    public function user_registration() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userRegName', 'User Name', 'required');
        $this->form_validation->set_rules('userRegEmail', 'User Mail', 'required|callback_user_email');
        $this->form_validation->set_rules('userRegPassword', 'Password', 'required|');
        $this->form_validation->set_rules('userRegContact', 'User Contact Information', 'required');
        $this->form_validation->set_rules('userRegBillingAdd', 'User Shipping Address Details', 'required');
        $this->form_validation->set_rules('userRegShippingAdd', 'User Billing Address Details', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_login');
        } else {

            $this->admin_model->user_name = $this->input->post('userRegName');
            $this->admin_model->user_email = $this->input->post('userRegEmail');
            $this->admin_model->user_password = $this->input->post('userRegPassword');
            $this->admin_model->user_contact = $this->input->post('userRegContact');
            $this->admin_model->billing_address = $this->input->post('userRegBillingAdd');
            $this->admin_model->shipping_address = $this->input->post('userRegShippingAdd');

            $this->admin_model->insert_user();
            $this->session->set_flashdata('user_insert_msg', 'Registration Successfully Completed');
            redirect('user', 'refresh');
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
        
    
    public function user_login() {
        $this->admin_model->user_email = $this->input->post("userLoginEmail");
        $this->admin_model->user_password = $this->input->post("userLoginPassword");        
        
        if ($info = $this->admin_model->getAAdmin()) {            
            $userlogindata = array(
                'user_id' => $info->user_id,
                'user_password' => $info->user_password,
                'user_contact' => $info->user_contact,
                'user_name' => $info->user_name,
                'user_email' => $info->user_email,
                'billing_address' => $info->billing_address,
                'shipping_address' => $info->shipping_address,
                'role' => $info->role,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($userlogindata);
            redirect('index', 'refresh');
        } else {
            $this->session->set_flashdata('log', 'Invalid Username/Password');
            $this->load->view('register_login');
        }               
    }
    
    public function user_logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('index', 'refresh');
    }
    
    public function get_a_user_info() {
        if($this->admin_model->getAAdmin()){
            $this->admin_model->user_id = $this->session->userdata('user_id');
           $data['userInfo'] = $this->admin_model->get_user_info(); 
        }
    }
    
    public function update_profile() {        
        $this->admin_model->user_id = $this->session->userdata('user_id');
        $this->admin_model->user_name = $this->input->post('userRegName');
        $this->admin_model->user_email = $this->input->post('userRegEmail');
        $this->admin_model->user_password = $this->input->post('userRegPassword');
        $this->admin_model->user_contact = $this->input->post('userRegContact');
        $this->admin_model->billing_address = $this->input->post('userRegBillingAdd');
        $this->admin_model->shipping_address = $this->input->post('userRegShippingAdd');
        $this->admin_model->update_user_info();
        $this->session->set_flashdata('update_msg', 'Update Successfully Completed');
        //redirect('user/edit_profile', 'refresh');
    }
}
