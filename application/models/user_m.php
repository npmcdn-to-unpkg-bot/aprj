<?php

/**
 * Author :- B.S.P.Mendis
 * File Name :- user.php
 * type :- Model
*/

class User_m extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
 
    /**
     * Register user
     */
    function register($username,$password,$user_type,$name,$subject_category)
    {
        // is username unique?
        $res = $this->db->get_where('user',array('username' => $username));
        if ($res->num_rows() > 0) {
            return 'Username already exists';
        }
        // username is unique
        $salt = substr(sha1(mt_rand()),0,20); 
        $hashpwd = sha1($salt . $password);
        $data = array('username' => $username,
                        'pswd' => $hashpwd,
                        'name' => $name,
                        'subCat' => $subject_category,
                        'userTypeId' => $user_type,
                        'salt' => $salt);
        $this->db->insert('user',$data);
        return null; // no error message because all is ok
    }
    
    /**
     * log user
     */
    function login($username,$pwd)
    {
        $this->db->where(array('username' => $username));
        $res = $this->db->get('user',array('salt'));
        if ($res->num_rows() != 1) { // should be only ONE matching row!!
            return false;
        }
        
        $rowData = $res->row_array();
        $this->db->where(array('username' => $username,'pswd' => sha1($rowData['salt'] . $pwd), 'active' => 'Block'));
        $res = $this->db->get('user',array('username'));
        if ($res->num_rows() != 1) { // should be only ONE matching row!!
            return false;
        }
        $this->session->set_userdata(array('username'=>$username));

        // remember login
        $session_id = $this->session->userdata('session_id');
        //var_dump($session_id);
        //var_dump($this->session->all_userdata());
        // remember current login
        $row = $res->row_array();
        $this->db->insert('logins',array('username' => $row['username'],'session_id' => $session_id));
        return $res->row_array();
    }

    /**
    * logout from system
    */
    function logout(){
        $session_id = $this->session->sess_destroy();
    }
    
    /**
    * check whether the user is logged in
    */
    function is_loggedin()
    {
        $session_id = $this->session->userdata('session_id');
        $res = $this->db->get_where('logins',array('session_id' => $session_id));
        if ($res->num_rows() == 1) {
            $row = $res->row_array();
            return $row['username'];
        }
        else {
            return false;
        }
    }
    
    /**
    * change password
    */
    public function changePassword($prev_password,$username,$password) {
    /*
    	var_dump($prev_password. ' '.$username. ' ' .$password);
        $this->db->where(array('username' => $username));
        $res = $this->db->get('user',array('salt'));
        if ($res->num_rows() != 1) { // should be only ONE matching row!!
            return false;
        }
        
        $rowData = $res->row_array();
        $this->db->where(array('username' => $username,'pswd' => sha1($rowData['salt'] . $prev_password)));
        $res = $this->db->get('user',array('username'));
        if ($res->num_rows() != 1) { // should be only ONE matching row!!
            return false;
        }
        
        $salt = substr(sha1(mt_rand()),0,20); 
        $hashpwd = sha1($salt . $password);
        var_dump($hashpwd);
        $this->db->where(array('username' => $username));
        $this->db->update('user', array('pswd' =>  $hashpwd, 'salt' =>  $salt));
        
        return TRUE;
        */
        
        $this->db->where(array('username' => $username));
        $res = $this->db->get('user',array('salt'));
        if ($res->num_rows() != 1) { // should be only ONE matching row!!
            return false;
        }
        
        $rowData = $res->row_array();
        
        $this->db->where(array('username' => $username,'pswd' => sha1($rowData['salt'] . $prev_password)));
        $res = $this->db->get('user',array('username'));
        if ($res->num_rows() != 1) { // should be only ONE matching row!!
            return false;
        }
        
        $salt = substr(sha1(mt_rand()),0,20); 
        $hashpwd = sha1($salt . $password);
        
        $this->db->where(array('username' => $username));
        $this->db->update('user', array('pswd' =>  $hashpwd, 'salt' =>  $salt));
        
        return $hashpwd;
        
    }
    /**
    * update user password with the emailed password
    */
    public function forgotPword($username, $tempPassword) {
        //var_dump($tempPassword);
        $salt = substr(sha1(mt_rand()), 0, 20);
        $hashpwd = sha1($salt . $tempPassword);

        $this->db->where(array('username' => $username));
        $this->db->update('user', array('pswd' => $hashpwd, 'salt' => $salt));
        return TRUE;
    }

    public function getEmailAddress($username) {
        $this->db->select('email');
        $this->db->where('username', $username);
        $res = $this->db->get('user');
        $res = $res->row();
        return $res->email;
    }

    public function addUser($name, $username, $email, $pswd) {
        $salt = substr(sha1(mt_rand()),0,20); 
        $hashpwd = sha1($salt . $pswd);
        $Udata = array('name' => $name,
            'username' => $username,
            'email' => $email,
            'pswd' => $hashpwd,
            'salt' => $salt);
        $this->db->insert('user', $Udata);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function updateUser($name, $username, $email, $pswd){
        if(empty($pswd)){
            $this->db->select('pswd');
            $this->db->where('username', $username);
            $res = $this->db->get('user');
           /* $pswd_row =$res->result_array()->row();
            $pswd = $pswd_row->pswd;*/
        }
        $Udata = array('name' => $name,
            'email' => $email,
            'pswd' => $pswd);
        $this->db->where('username', $username);
        $this->db->update('user', $Udata);
        $this->db->trans_complete();
        //return $insert_id;
    }

    public function userExist($username) {
        //echo $this->db->get_where('user', array('username =' => '$username'));
        return $this->db->get_where('user', array('username =' => $username))->num_rows();
    }

    public function getUsers() {
        $this->db->select('username, name, active, image');
        $res = $this->db->get('user');
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        return $allData;
    }

    public function blockUser($username,$state) {
        //$this->output->enable_profiler(TRUE);
        $data = array(
            'active' => $state
        );
        $this->db->where('username', $username);
        $this->db->update('user', $data);
        $this->db->trans_complete();
    }
    
    public function getUser($username){
        
        $this->db->select('username, name, email, pswd, image');
         $this->db->where('username', $username);
         $res = $this->db->get('user');
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        return $allData;
    }

}