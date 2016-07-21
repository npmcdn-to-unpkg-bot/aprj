<?php

/**
 * Author :- B.S.P.Mendis
 * File Name :- auth.php
 * type :- Controller
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('authlib');
        $this->load->model('user_m');
        $this->load->helper('url');
    }

    public function index() {
        //$this->load->view('main_page',array('errmsg' => ''));
        $loggedin = $this->authlib->is_loggedin();

        if ($loggedin === false) {
           // $this->load->helper('url');
           // redirect('/auth/login');
            $data['username'] = '';
            //print_r($data);
            $this->load->view('homepage', $data);
            
        }
        else{
            $data['username'] = $loggedin;
            //print_r($data);
            $this->load->view('user_profile', $data);
            //$this->load->view('user_profile');
        }
        
    }

    /**
     * Register user to system
     */
    public function register() {
        // TODO implement here
        $username = $this->input->post('uname');
        $password = $this->input->post('pword');
        $re_password = $this->input->post('re_pword');
        $user_type = $this->input->post('user_type');
        $name = $this->input->post('name');
        $subject_category = $this->input->post('subCat');

        if (!($username = $this->authlib->register($username, $password, $re_password, $user_type, $name, $subject_category))) {
            redirect('/auth/login');
        } else {
            $data['username'] = '$errmsg';
            $this->load->view('login', $data);
        }
    }

    /**
     * Redirect to login screen
     */
    public function login() {
        $data['username'] = '';
        $this->load->view('login', $data);
    }
    
    /**
     * logout and redirect to homepage
     */
    public function logout() {
        $this->user_m->logout();
        $data['username'] = '';
        $this->load->view('welcome_message', $data);
    }

    /**
     * Check whether the user is logged in
     */
    public function isLoggedIn() {
        $loggedin = $this->authlib->is_loggedin();
        //$this->load->view('main_page.php', array('username' => $loggedin));
        return $loggedin;
    //return $this->authlib->is_loggedin();
        
    }
    
    public function currentUser() {
        $loggedin = $this->authlib->is_loggedin();
        if ($loggedin === 'saj') {
            echo TRUE;
        } else {
            echo $loggedin;
        }
    }
    
    /**
     * Authenticate User
     */
    public function authenticate() {
        $username = $this->input->post('uname');
        $password = $this->input->post('pword');

        if($this->isLoggedIn() === false){
            $user = $this->authlib->login($username, $password);
            if ($user !== false) {
                $data['logged_username'] = $user['username'];
                $this->load->view('admin_panel', $data);
            } else {
                $data['logged_username'] = "@@invalid";
                $this->load->view('welcome_message2', $data);
            }
        }
        else{
            $data['logged_username'] = $this->isLoggedIn();
            //var_dump($data);
            $this->load->view('admin_panel', $data);
        }
    }
    
    public function learnMore()
    {
        $this->load->view('learn_more');
    }
    
    public function contactUsEmail()
    {
        $contactName = $this->input->post('contact_Name');
        $contactEmail = $this->input->post('contact_Email');
        $contactMsg = $this->input->post('contact_Msg');
        //Email by Sajith
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'easyalevel@gmail.com',
            'smtp_pass' => 'all123456',
            'smtp_timeout' => '4',
            'mailtype' => 'text',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('easyalevel@gmail.com');
        $this->email->to('sajmendis@gmail.com');
        $this->email->subject('Loud Horn Marketing Contact Us');
        $this->email->message('Contact Name :- '. $contactName .' Contact Email :- ' . $contactEmail .' Contact Message :- ' . $contactMsg);
        $this->email->send();
        //End Email by Sajith
    }

    /**
     * Send an email in the event of the password is forgotten and update database with a 
     * temporary password
     */
    public function forgotPword() {
        // TODO implement here
        $email = -1;
        
        $email = $this->input->post("email");
        //var_dump($email);
        
        if(isset($arguments['email'])){
            $email = $arguments['email'];
            $email = urldecode($email);
        }
        
        $digits = 5;
        $tempPassword = rand(pow(10, $digits-1), pow(10, $digits)-1);
        
        $config = Array(		
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'easyalevel@gmail.com',
		    'smtp_pass' => 'all123456',
		    'smtp_timeout' => '4',
		    'mailtype'  => 'text', 
		    'charset'   => 'iso-8859-1'
		);
        
         
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $this->email->from('easyalevel@gmail.com');
        $this->email->to($email); 

        $this->email->subject('Temparory Password for EasyALevel');
        
        
        $this->email->message('Please use the below given password to login to the system. Password :- '.$tempPassword);	

        $this->email->send();
        
        $arrayResult = $this->user->forgotPword($email,$tempPassword);
        if($arrayResult == TRUE){
            echo 'Temporary Password has being Emailed to the email address provided';
        }
        
    }

    /**
     * change password of the user
     */
    public function changePassword() {
        $pre_pword = -1;
        $pword = -1;
        $re_pword = -1;
        $username = -1;
        
        $pre_pword = $this->input->post("pre_pword");
        $pword = $this->input->post("pword");
        $re_pword = $this->input->post("re_pword");
        $username = $this->input->post("username");
        
        
        if(isset($arguments['pre_pword'])){
            $pre_pword = $arguments['pre_pword'];
            $pre_pword = urldecode($pre_pword);
        }
        if(isset($arguments['pword'])){
            $pword = $arguments['pword'];
            $pword = urldecode($pword);
        }
        if(isset($arguments['re_pword'])){
            $re_pword = $arguments['re_pword'];
            $re_pword = urldecode($re_pword);
        }
        if(isset($arguments['username'])){
            $username = $arguments['username'];
            $username = urldecode($username);
        }
        //var_dump('username '.$username. ' answerId '. $answerId);
        $arrayResult = $this->authlib->changePassword($pre_pword,$pword,$re_pword,$username);
        
        echo json_encode($arrayResult); 
        //var_dump($arrayResult);  
    }

   

    /**
     * Get user information
     */
    public function getUserDetails() {
        $username = -1;
        
        $username = $this->input->post("username");
        
        if(isset($arguments['username'])){
            $username = $arguments['username'];
            $username = urldecode($username);
        }
        //var_dump('username '.$username. ' answerId '. $answerId);
        $arrayResult = $this->user->getUserDetails($username);
        
        echo json_encode($arrayResult); 
    }

    function preauthenticate(){
        $uname = $this->input->post("uname");
        $pword = $this->input->post("pword");
        //var_dump($_POST);
        $res=$this->user_m->login($uname,$pword);
        $sendres=array();
        $sendres["u"]=$uname;
        $sendres["p"]=$pword;
        if($res===false || count($res)==0){

            $sendres["type"]=false;
            $sendres["res"]=$res;
        }
        else{
            $sendres["type"]=true;
        }

        echo json_encode($sendres);


    }


}