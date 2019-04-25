<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class PurchaseOrderReportClass extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function purchaseOrderReport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('PurchaseOrderReportClass/purchaseOrderReport');
	}
	else
	{
	redirect('index');
	}
}

public function print_Purchase_order_rep(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('PurchaseOrderReportClass/print-purchase-order-rep');
	}
	else
	{
	redirect('index');
	}
}
public function all_csv_purchase_order(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('PurchaseOrderReportClass/all-csv-purchase-order');
	}
	else
	{
	redirect('index');
	}
}

}

?>