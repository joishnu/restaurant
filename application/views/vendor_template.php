<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/header_js_css'); ?>
<?php $this->load->view('includes/left_panel_vendor'); ?>
<?php $this->load->view('includes/top_panel'); ?>
<?php $this->load->view($page); ?>
<?php $this->load->view('includes/footer'); 
$data = array();
if(isset($extra_js))
	$data['extra_datatable_data'] = $extra_datatable_data;
 $this->load->view('includes/footer_js_css', $data); ?>	
