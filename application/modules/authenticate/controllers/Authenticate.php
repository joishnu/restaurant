<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authenticate extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		$this->load->model('authenticate_model','auth');
	}
	public function index()
	{	
		if($this->session->userdata('data')){
			redirect('dashboard');
		}else{
			$data['title'] = 'log In';
	        $this->load->view('login',$data);			
		}

	}

	public function do_login(){
		try{
			$this->form_validation->set_rules('login_id', 'Login Id', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			$input=$this->input->post(null,true);
			if(!$this->form_validation->run()){
				throw new Exception(validation_errors(), 1);
			}
    		$rs = $this->auth->login($input);
    		if(!$rs['status']){
    			throw new Exception($rs['message'], 1);
    		}    		
			$this->session->set_userdata($rs);
			redirect(base_url());            
	    }catch(Exception $e){
	    	$this->session->set_flashdata('error',$e->getMessage());
	    	redirect(base_url());
	    }
	}

	public function register(){
		try{
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|is_unique[customers.phone]');
			$input=$this->input->post(null,true);
			if(!$this->form_validation->run()){
				throw new Exception(validation_errors(), 1);
			}
    		$rs = $this->auth->register($input);
    		if(!$rs['status']){
    			throw new Exception($rs['message'], 1);
    		}    		
			//$this->session->set_userdata($rs);
			$this->session->set_flashdata('success', 'Your registration is Successfull. Your Customer ID is '.$rs['data']['login_id'].'.');
			redirect($_SERVER['HTTP_REFERER']);            
	    }catch(Exception $e){
	    	$this->session->set_flashdata('error',$e->getMessage());
	    	redirect($_SERVER['HTTP_REFERER']);
	    }
	}
	
	
	public function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('success','Logged out successfully');
        redirect(base_url());
    }
}
