<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Prateek Gupta <prateek.gupta54@gmail.com>
 */
class Fcm {

    private $title;
    private $message;
    private $image;
    private $data;
    private $is_background;
    private $apiKey;
    private $apiSendAddress;
    private $registration_ids;
    private $device_type;
    private $timestamp;
 
    public function __construct() {
        $ci =& get_instance();
        $ci->load->config('fcm',true);
        $this->apiKey = $ci->config->item('fcm_api_key','fcm');
        $this->apiSendAddress = $ci->config->item('fcm_api_send_address','fcm');
        $this->is_background = false;
        $this->registration_ids = [];
        if (!$this->apiKey) {
            show_error('FCM: Needed API Key');
        }

        if (!$this->apiSendAddress) {
            show_error('FCM: Needed API Send Address');
        }
    }

    /*public function __construct() {
        $ci =& get_instance();
        $ci->load->config('fcm',true);
        $this->apiKey = $ci->config->item('fcm_paramedic_api_key','fcm');
        $this->apiSendAddress = $ci->config->item('fcm_api_send_address','fcm');
        $this->is_background = false;
        $this->registration_ids = [];
        if (!$this->apiKey) {
            show_error('FCM: Needed API Key');
        }

        if (!$this->apiSendAddress) {
            show_error('FCM: Needed API Send Address');
        }
    }*/
 
    public function set_title($title) {
        $this->title = $title;
        return $this;
    }
 
    public function set_message($message) {
        $this->message = $message;
        return $this;
    }

    public function set_timestamp($timestamp) {
        $this->timestamp = $timestamp;
        return $this;
    }
 
    public function set_image($imageUrl) {
        $this->image = $imageUrl;
        return $this;
    }
 
    public function set_device_type($device_type) {
        $this->device_type = $device_type;
        return $this;
    }

    public function set_payload($data) {
        $this->data = $data;
        return $this;
    }
 
    public function set_is_background($is_background = true) {
        $this->is_background = $is_background;
        return $this;
    }

    public function add_multiple_recipients($registrationIds){
        if(!$registrationIds || !is_array($registrationIds)){
            return;
        }
        $this->registration_ids = $registrationIds;
        return $this;
    }


    public function add_recipient($registrationId) {
        $this->registration_ids[] = $registrationId;
        return $this;
    }

    public function clear_recipient() {
        $this->registration_ids = array();
        return $this;
    }
 
    public function get_push() {
        $res = array();

        $res['notification']['title'] = $this->title;
        $res['notification']['body'] = $this->message;    
        
        $res['data']['title'] = $this->title;
        $res['data']['body'] = $this->message;
        //$res['data']['is_background'] = $this->is_background;
        //$res['data']['image'] = $this->image;
        //$res['data']['payload'] = $this->data;
        if($this->timestamp){
            $res['data']['timestamp'] = $this->timestamp;
        }else{
            $res['data']['timestamp'] = date('Y-m-d H:i:s');
        }
        return $res;
    }

    public function send() {
        $fields = $this->get_push();
        $fields['registration_ids'] = $this->registration_ids;
        //print_r($fields);die();
        return $this->send_push_notification($fields);
    }
 

    // function makes curl request to firebase servers
    private function send_push_notification($fields) {
        
        $headers[] = 'Content-Type:application/json';
        $headers[] = 'Authorization:key='.$this->apiKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiSendAddress);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        //var_dump(curl_error($ch));
        
        if ($result === FALSE) {
            $result = array('status' => false, 'message' => curl_error($ch), 'response_info' => curl_getinfo($ch));
            curl_close($ch);
            return $result;
        }
        curl_close($ch);
        return array('status' => true, 'result' => $result, 'message' => 'sent!');
    }
}