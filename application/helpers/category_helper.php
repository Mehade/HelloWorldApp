
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('kanakata_category_list')) {

    function kanakata_category_list() {
        $CI = & get_instance();
        $CI->load->model('item_model');

        $membres = $CI->item_model->get_all_category();
        return $membres;
    }

}

if (!function_exists('kanakata_discount_list')) {

    function kanakata_discount_list() {
        $CI = & get_instance();
        $CI->load->model('discount_model');        
        $membres = $CI->discount_model->get_discount_items();
        return $membres;
    }

}