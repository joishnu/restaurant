<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Authenticate_model extends CI_Model {

    public function login($params){
        try{
            $where = array(
                'login_id' => $params['login_id']
            );
            $data = $this->db->get_where('customers', $where)->row_array();
            
            if(!$data){
                throw new Exception("Invalid user id or password.", 1);
            }
            $password = do_hash($params['password']);    
            if($data['password'] != $password){
                throw new Exception("You entered a wrong password.", 1);
            }       
            $response['status'] = true;
            $response['data'] = $data;
            return $response;
        }catch(Exception $e){
            $response['status'] = false;
            $response['message'] = $e->getMessage();
        }
        return $response;
    }

    public function register($params){
        try{

            $fname_str=substr(strtolower($params['fname']), 0, 4);
            $params['password'] = do_hash($params['password']);
            $params['login_id'] = $fname_str.mt_rand(1000,9999);
            $params['created_at'] = date('Y-m-d H:i');
            if(!$this->db->insert('customers', $params)){
                throw new Exception("Error Processing Request", 1);
            }       
            $response['status'] = true;
            $response['data'] = $params;
            return $response;
        }catch(Exception $e){
            $response['status'] = false;
            $response['message'] = $e->getMessage();
        }
    }


}