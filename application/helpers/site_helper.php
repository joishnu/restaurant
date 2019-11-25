<?php
if(!function_exists('checkLogin')){
    function checkLogin()
    {
        $CI = & get_instance();
        $sess_items = $CI->session->all_userdata();
        if(!$sess_items['id']){
            redirect(base_url());
        }
    }
}