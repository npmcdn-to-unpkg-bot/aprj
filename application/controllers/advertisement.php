

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of advertisement
 *
 * @author Devmie
 */
class advertisement extends CI_Controller {

    //put your code here
    public function _remap($method) {
        if ($method == 'addAd') {
            $this->addAd();
        }
        if ($method == 'getAllAds') {
            $this->getAllAds();
        }
        if ($method == 'getAd') {
            $this->getAd();
        }
        if ($method == 'getNextPriority') {
            $this->getNextPriority();
        }
        if ($method == 'updateAds') {
            $this->updateAds();
        }
        if ($method == 'removeAd') {
            $this->removeAd();
        }
        
        
    }

    public function addAd() {
        $output = $this->input->post();
        //var_dump($output);
        $id = $output['ad_id'];
        $priority = $output['ad_priority'];
        $main_img = $output['ad_main_img'];
        $sec_img = $output['ad_sec_img'];
        $url = $output['ad_url'];
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
           $url = "http://" . $url;
        }
        $action = $output['action'];

	$this->load->model('advertisement_m');
        if ($action == 'update') {
                $this->advertisement_m->updateAd($id, $priority, $main_img, $sec_img, $url);
        } else {
               if (empty($id) || empty($main_img) || empty($url)) {
            	//var_dump('not set');
            		echo ("The marked fields must be not be empty");
            		//echo json_encode(array('status' => 1, 'desc' => 'Question Added Succesfully'));
        	} else {
            		
            		$this->advertisement_m->addAdvertisement($id, $priority, $main_img, $sec_img, $url);
        	}
               
        }
        
    }
    
    public function removeAd(){
        $output = $this->input->post();
        $id = $output['ad_id'];
        $this->load->model('advertisement_m');
        $this->advertisement_m->removeAd($id);
        
    }

    public function getAllAds() {
        $this->load->model('advertisement_m');
        $arrayResult = $this->advertisement_m->getAds();
        echo json_encode($arrayResult);
    }

    public function getAd() {
        $output = $this->input->post();
        $ad_id = $output['ad_id'];
        $this->load->model('advertisement_m');
        $arrayResult = $this->advertisement_m->getAd($ad_id);
        echo json_encode($arrayResult);
    }
    
    public function getNextPriority(){
        $this->load->model('advertisement_m');
        $arrayResult = $this->advertisement_m->getNextPriority();
        echo json_encode($arrayResult);
    }
    
    public function updateAds() {
        $rows = $this->input->post("rows");
        $rows_array = json_decode($rows);
        $this->load->model('advertisement_m');
        //var_dump($rows_array);
        $this->advertisement_m->updateAds($rows_array);
        
        
    }
}