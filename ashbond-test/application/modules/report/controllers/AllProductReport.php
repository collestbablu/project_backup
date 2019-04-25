<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class AllProductReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function product_report(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('AllProductReport/product-report');
	}
	else
	{
	redirect('index');
	}
}
public function print_part_purduction_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('AllProductReport/print-part-purduction-report');
	}
	else
	{
	redirect('index');
	}
}
public function export_part_purduction_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('AllProductReport/export-part-purduction-report');
	}
	else
	{
	redirect('index');
	}
}

}

?>