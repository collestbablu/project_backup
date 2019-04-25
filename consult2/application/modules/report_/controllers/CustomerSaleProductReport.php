<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class CustomerSaleProductReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function customer_sale_product_report(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('CustomerSaleProductReport/customer-sale-product-report');
	}
	else
	{
	redirect('index');
	}
}

public function print_customer_sale_product_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('CustomerSaleProductReport/print-customer-sale-product-report');
	}
	else
	{
	redirect('index');
	}
}
public function export_csv_customer_sale_product_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('CustomerSaleProductReport/export-csv-customer-sale-product-report');
	}
	else
	{
	redirect('index');
	}
}

}

?>