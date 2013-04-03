<?php
if (!defined('googoauth2_authentication_helper')) {
    define('googoauth2_authentication_helper', TRUE);

    function auth_logout($redirect = true){

        $CI =& get_instance();
        $CI->load->library('session');

        $user = $CI->session->userdata('user');
        if ($user) {
            $CI->session->unset_userdata('user');
        }
        if ($redirect){
            redirect('orion');
        }else{
            return;
        }
    }

    function auth_login($input){

        $CI =& get_instance();
        $CI->load->library('session');

        $user = $CI->UserModel->create();
        $CI->session->set_userdata(array('user' => json_encode($user)));

        $redirect = $input['location'];
        if (!$redirect){
            $redirect = "orion";
        }
        redirect($redirect);
    }

    function auth_get_user(){

        $CI =& get_instance();
        $CI->load->model('user/UserModel');

        return $CI->UserModel->create();

    }

}
?>
