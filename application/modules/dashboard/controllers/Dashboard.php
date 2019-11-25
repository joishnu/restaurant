<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model','dashboard');
		$sess_items = $this->session->all_userdata();

		if(!isset($sess_items['data']))
		{	
			redirect(base_url());
		}
	}
	
	public function index(){
		$data['title'] = 'dashboard';
		$data['tables'] = $this->dashboard->getTableDetails();
		$data['menus'] = $this->dashboard->getMenuDetails();
		$this->load->view('index',$data);
	}

	public function bookTable(){
		$this->form_validation->set_rules('food_ids[]', 'Food ID', 'trim|required');
		$this->form_validation->set_rules('food_qty[]', 'Food Quantity', 'trim|required');
		$input=$this->input->post(null,true);
		if(!$this->form_validation->run()){
			throw new Exception(validation_errors(), 1);
		}

		$rs = $this->dashboard->bookTable($input);
		if(!$rs){
			throw new Exception(validation_errors(), 1);
		}
        $return_array = array(
            'status' => true,
            'data' => $rs
        );
        echo json_encode($return_array);
	}


	public function booking_history(){
		$data['title'] = 'Order History';
		$data['orders'] = $this->dashboard->getOrderDetails();
		$this->load->view('order_history',$data);
	}

	public function order_details($order_id){
		if(isset($order_id)){
			$data['order_details'] = $this->dashboard->getOrderDetailsList($order_id);
			$data['orders'] = $this->dashboard->getOrderDetailsById($order_id);
		}
		$data['title'] = 'Order History';

		$this->load->view('order_details',$data);
	}
	
}
