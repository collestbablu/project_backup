<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class SalePurchaseReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function sale_purchase_report(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SalePurchaseReport/sale-purchase-report');
	}
	else
	{
	redirect('/SalePurchaseReport/index');
	}
}
public function print_sale_purchase_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SalePurchaseReport/print-sale-purchase-report');
	}
	else
	{
	redirect('/SalePurchaseReport/index');
	}
}
public function export_csv_sale_purchase_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('SalePurchaseReport/export-csv-sale-purchase-report');
	}
	else
	{
	redirect('/SalePurchaseReport/index');
	}
}

}

?>