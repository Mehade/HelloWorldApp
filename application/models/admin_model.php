<?php
class Admin_model extends CI_Model {
    
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;
    public $user_contact;
    public $billing_address;
    public $shipping_address;
    
    public function insert_user() {
        $data = array(
            'user_name' => $this->user_name,
            'user_email' => $this->user_email,
            'user_password'=>  $this->user_password,
            'user_contact'=>  $this->user_contact,
            'billing_address'=>  $this->billing_address,
            'shipping_address'=>  $this->shipping_address
                                    
        );
        $this->db->insert('user', $data);
    }
    public function check_unique_user() {
        $this->db->where('user_email', $this->user_email);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getAAdmin() {
        $query = $this->db->get_where('user', array('user_email' => $this->user_email, 'user_password' => $this->user_password));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
    public function get_user_info() {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $this->user_id);
        $query = $this->db->get();
        return $query->result();
    }
    
}
