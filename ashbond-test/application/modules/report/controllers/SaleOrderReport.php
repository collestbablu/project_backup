<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class SaleOrderReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function salesOrderReport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SaleOrderReport/salesOrderReport');
	}
	else
	{
	redirect('/SaleOrderReport/index');
	}
}

public function print_sales_order_rep(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SaleOrderReport/print-sales-order-rep');
	}
	else
	{
	redirect('/SaleOrderReport/index');
	}
}
public function all_csv_sales_order(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SaleOrderReport/all-csv-sales-order');
	}
	else
	{
	redirect('/SaleOrderReport/index');
	}
}

}

?>