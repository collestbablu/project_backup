<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class ProductStockReport extends my_controller {
function __construct(){
   parent::__construct(); 
}     

public function product_stock_report_1(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('ProductStockReport/product-stock-report-1');
	}
	else
	{
	redirect('/ProductStockReport/index');
	}
}

public function print_product_stockreport_1(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('ProductStockReport/print-product-stockreport-1');
	}
	else
	{
	redirect('/ProductStockReport/index');
	}
}

public function export_csv_product_stock_report_1(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('ProductStockReport/export-csv-product-stock-report-1');
	}
	else
	{
	redirect('/ProductStockReport/index');
	}
}


}

?>