<?php

class Auth_model extends CI_Model{
    
    public function authorization($user_role){
        if($this->session->has_userdata('role')){
             return true;
        }
        else{
             redirect(site_url('user/login?stat=1'));
       }
    }
    
    public function login_info(){
        $this->load->database('Default',true);
        $this->session->userdata('username');
    }
}