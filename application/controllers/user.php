<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Devmie
 */
class user extends CI_Controller {

    //put your code here
    public function _remap($method) {
        if ($method == 'addUser') {
            $this->addUser();
        }
        if ($method == 'userExist') {
            $this->userExist();
        }
        if ($method == 'generatePswd') {
            $this->generatePswd();
        }
        if ($method == 'sendRegMail') {
            $this->sendRegMail();
        }
        if ($method == 'getAllUsers') {
            $this->getAllUsers();
        }
        if ($method == 'blockUser') {
            $this->blockUser();
        }
        if ($method == 'getUser') {
            $this->getUser();
        }
        if ($method == 'forgotPword') {
            $this->forgotPword();
        }
    }

    public function forgotPword() {
        $output = $this->input->post();
        $username = $output['user_username'];
        $this->load->helper('string');
        $pswd = random_string('alnum', 5);
        $this->load->model('user_m');
        $email = $this->user_m->getEmailAddress($username);
        $this->user_m->forgotPword($username, $pswd);
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
                $this->email->to($email);
                $this->email->subject('Loud Horn Marketing Account Password Reset');
                $this->email->message('Your account password has being reset successfully. Please use the below credentials to login. Username :- '. $username .' Password :- ' . $pswd);
                $this->email->send();
    }

    public function addUser() {
        $output = $this->input->post();

        $name = $output['user_name'];
        $username = $output['user_username'];
        $email = $output['user_email'];
        $pswd = $output['user_pswd'];
        $action = $output['action'];
        if(array_key_exists('old_pswd',$output)){
        $old_pswd = $output['old_pswd'];
        }
        
        if (empty($username) || empty($email) || empty($name)) {
            echo ("The marked fields must be not be empty");
        } else {
            $this->load->model('user_m');
            if ($action == 'update') {
            if (!empty($old_pswd)){
                    if (empty($pswd)){
                        echo 'You need to enter a new password!';
                        return;
                    }
                    $pswd = $this->user_m->changePassword($old_pswd,$username,$pswd);
                    if ($pswd === false){
                        echo 'The old password is incorrect. Please try again.';
                        return;
                    }
                }
                $this->user_m->updateUser($name, $username, $email, $pswd);
                
            }
            else{
                $this->user_m->addUser($name, $username, $email, $pswd);

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
                $this->email->to($email);
                $this->email->subject('Loud Horn Marketing Account Created Successfully');
                $this->email->message('Please use the below given username and password to login to the system. Username :- '. $username .' Password :- ' . $pswd);
                $this->email->send();
echo $this->email->print_debugger();
                //End Email by Sajith
            }
        }
    }

    public function userExist() {
        $output = $this->input->post();

        $username = $output['user_username'];

        if (!empty($username)) {
            $this->load->model('user_m');
            echo json_encode($this->user_m->userExist($username));
        }
    }

    public function generatePswd() {
        $this->load->helper('string');
        echo random_string('alnum', 5);
    }

    public function sendRegMail() {
        $email = $this->input->post("user_email");
        $pswd = $this->input->post("user_pswd");

//        if(isset($arguments['email'])){
//            $email = $arguments['email'];
        $email = urldecode($email);
        var_dump($email);
//        }
//        $digits = 5;
//        $tempPassword = rand(pow(10, $digits-1), pow(10, $digits)-1);

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'devmie.w@gmail.com',
            'smtp_pass' => 'ds',
            'smtp_timeout' => '4',
            'mailtype' => 'text',
            'charset' => 'iso-8859-1'
        );


        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('devmie.w@gmail.com');
        $this->email->to($email);

        $this->email->subject('Temparory Password for EasyALevel');
        echo 'rt';
//        $this->email->attach('/EasyAL/images/easyallogo.jpg');
//        
//        $data["body"] = '<b><img droparea="cid:/EasyAL/images/easyallogo.jpg" />';
//        $this->email->attach(getcwd() . '/easyallogo.jpg');

        $this->email->message('Please use the below given password to login to the system. Password :- ');

        $this->email->send();
    }

    public function getAllUsers() {
        $this->load->model('user_m');
        $arrayResult = $this->user_m->getUsers();
        echo json_encode($arrayResult);
    }

    public function blockUser() {
        $output = $this->input->post();
        $username = $output['user_username'];
        $state = $output['state'];
        if ($state === 'Unblock') {
            $state = 'Block';
        } else {
            $state = 'Unblock';
        }
        $this->load->model('user_m');
        $this->user_m->blockUser($username, $state);
    }

    public function getUser() {
        $output = $this->input->post();
        $username = $output['username'];

        $this->load->model('user_m');
        $arrayResult = $this->user_m->getUser($username);
        echo json_encode($arrayResult);
    }

}