<?php

class Authlib {
 
    function __construct()
    {
        // get a reference to the CI super-object, so we can
        // access models etc. (because we don't extend a core
        // CI class)
        $this->ci = &get_instance();
 
        $this->ci->load->model('user_m');
 
    }
 
    public function register($username,$password,$re_password,$user_type,$name,$subject_category)
    {
        if ($username == '' || $password == '' || $re_password == '' || $user_type == '' || $name == '' || $subject_category == '') {
            return 'Missing field';
        }
        if ($password != $re_password) {
            return "Passwords do not match";
        }
        return $this->ci->user_m->register($username,$password,$user_type,$name,$subject_category);
    }
    
    public function changePassword($prev_password,$password,$re_password,$username) {
        if ($prev_password == '' || $username == '' || $password == '' || $re_password == '') {
            return 'Missing field';
        }
        if ($password != $re_password) {
            return "Passwords do not match";
        }
        return $this->ci->user_m->changePassword($prev_password,$username,$password);
        
    }
    
    public function login($username,$password)
    {
        if ($username == '' || $password == '') {
            return false;
        }
        return $this->ci->user_m->login($username,$password);
    }
    
    public function is_loggedin()
    {
        return $this->ci->user_m->is_loggedin();
    }
}