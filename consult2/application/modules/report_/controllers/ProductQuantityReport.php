<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class ProductQuantityReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function product_stockreport_function(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('ProductQuantityReport/product-stockreport');
	}
	else
	{
	redirect('index');
	}
}


public function getproductcode(){

	if($this->session->userdata('is_logged_in')){

		$this->load->view('ProductQuantityReport/getproductcode');

	}

	else

	{

	redirect('index');

	}

}
	
public function print_product_stockreport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('ProductQuantityReport/print-product-stockreport');
	}
	else
	{
	redirect('index');
	}
}

public function export_csv_product_serial_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('ProductQuantityReport/export-csv-product-serial-report');
	}
	else
	{
	redirect('index');
	}
}
}

?>