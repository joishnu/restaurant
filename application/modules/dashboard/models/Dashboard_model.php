<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function getTableDetails()
    {  
        $result = $this->db->get('tables_list')->result_array();
        return $result;
    }

    public function getMenuDetails(){
        //$this->benchmark->mark('code_start');
        $result = $this->db->select('id, dish_name, dish_price, status')->where('status', 1)->get('menus')->result_array();
        //$this->benchmark->mark('code_end');
        //echo $this->benchmark->elapsed_time('code_start', 'code_end');
        //exit();
        return $result;
    }

    public function bookTable($params){
        try{
            $this->db->trans_begin();
            $sess_items = $this->session->all_userdata();
            $total_price=0;
            $order_details=[];

            foreach ($params['food_ids'] as $key => $value) {
                if($params['food_qty'][$key]!=0)
                {
                    $total_price=$total_price+$params['food_price'][$key];
                    $order_details[]= array('dish_id' => $value ,'price'=> $params['food_price'][$key], 'quantity'=>$params['food_qty'][$key]);
                }
            }
            $order_info= array('customer_id' => $sess_items['data']['id'], 'total_price'=>$total_price, 'order_status'=>'1', 'created_on' => date('Y-m-d H:i'), 'tbl_id'=>$params['table_id']);
            $this->db->insert('orders', $order_info);
            $insert_id = $this->db->insert_id();
            $this->db->where('id', $params['table_id'])->update('tables_list', array('status' => 1));
            foreach ($order_details as $key => $value) {
                $order_details[$key]['order_id']=$insert_id;
            }
            $this->db->insert_batch('order_details', $order_details);
            $this->db->trans_commit();
            return $insert_id;
            echo json_encode($return_array);
        }catch(Exception $e){
            $this->db->trans_rollback();
            return false;
        }
    }

    public function getOrderDetails(){
        $sess_items = $this->session->all_userdata();
        return $this->db->select('id,tbl_id,total_price,order_status,created_on')->where('customer_id', $sess_items['data']['id'])->get('orders')->result_array();
    }

    public function getOrderDetailsList($order_id){
        return $this->db->select('order_details.id, order_details.quantity, menus.dish_name, menus.dish_price')->join('menus', 'menus.id = order_details.dish_id')->where('order_id', $order_id)->get('order_details')->result_array();
    }

    public function getOrderDetailsById($order_id){
        $sess_items = $this->session->all_userdata();
        return $this->db->select('id,tbl_id,total_price,order_status,created_on')->where('customer_id', $sess_items['data']['id'])->where('id', $order_id)->get('orders')->row_array();
    }
}
