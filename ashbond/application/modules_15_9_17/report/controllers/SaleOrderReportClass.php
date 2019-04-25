<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class SaleOrderReportClass extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function salesOrderReport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SaleOrderReportClass/salesOrderReport');
	}
	else
	{
	redirect('/SaleOrderReportClass/index');
	}
}

public function print_sales_order_rep(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SaleOrderReportClass/print-sales-order-rep');
	}
	else
	{
	redirect('/SaleOrderReportClass/index');
	}
}
public function all_csv_sales_order(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SaleOrderReportClass/all-csv-sales-order');
	}
	else
	{
	redirect('/SaleOrderReportClass/index');
	}
}

}

?>