<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of advertisement_m
 *
 * @author Devmie
 */
class advertisement_m extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function addAdvertisement($id, $priority, $main_img, $sec_img, $url) {
        $Adata = array('ad_id' => $id,
            'priority' => $priority,
            'main_ad_image' => $main_img,
            'second_ad_image' => $sec_img,
            'ad_url' => $url);
        $this->db->insert('advertiesment', $Adata);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function removeAd($id) {
        //$this->output->enable_profiler(TRUE);

        
        $this->db->where('ad_id', $id);
        $this->db->delete('advertiesment');
    }
    public function getAds() {
        $this->db->select('ad_id, priority, ad_url, main_ad_image');
        $this->db->order_by("priority", "asc");
        $res = $this->db->get('advertiesment');
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        //var_dump($allData);
        
        return $allData;
    }

    public function getAd($ad_id) {
        $this->db->select('ad_id, priority, ad_url, main_ad_image, second_ad_image');
        $this->db->where('ad_id', $ad_id);
        $res = $this->db->get('advertiesment');
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        //var_dump($allData);
        //$this->output->enable_profiler(TRUE);
        return $allData;
    }

    public function updateAd($id, $priority, $main_img, $sec_img, $url) {
        $data = array(
            'priority' => $priority,
            'main_ad_image' => $main_img,
            'second_ad_image' => $sec_img,
            'ad_url' => $url
        );
        $this->db->where('ad_id', $id);
        $this->db->update('advertiesment', $data);
    }
    
    public function getNextPriority(){
        $this->db->select('priority');
        $this->db->order_by("priority", "desc"); 
        $res = $this->db->get('advertiesment');
        return $res->row();
    }
    
     public function updateAds($rows_array){
            foreach ($rows_array as $row) {
                var_dump($row);
                $data = array(
                    'priority' => $row->Priority 
                );
                $this->db->where('ad_id', $row->Reference);
                $this->db->update('advertiesment', $data);
            }
    }

}