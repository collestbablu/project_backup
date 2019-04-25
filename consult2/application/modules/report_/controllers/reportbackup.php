<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class report extends my_controller {
function __construct(){
   parent::__construct(); 
}     



//---------------------------------------------------------- start report function------------------------
public function report_function(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-report');
	}
	else
	{
	redirect('/report/index');
	}
}


public function invoice_function(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('invoice-report');
	}
	else
	{
	redirect('/report/index');
	}
}
public function payment_receive_function(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('payment-receive-report');
	}
	else
	{
	redirect('/report/index');
	}
}
public function product_stock_report_1(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('product-stock-report-1');
	}
	else
	{
	redirect('/report/index');
	}
}
public function product_stockreport_function(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('product-stockreport');
	}
	else
	{
	redirect('/report/index');
	}
}
public function sale_purchase_report(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('sale-purchase-report');
	}
	else
	{
	redirect('/report/index');
	}
}
public function print_sale_purchase_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-sale-purchase-report');
	}
	else
	{
	redirect('/report/index');
	}
}
public function export_csv_sale_purchase_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-csv-sale-purchase-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function customer_sale_product_report(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('customer-sale-product-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function print_customer_sale_product_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-customer-sale-product-report');
	}
	else
	{
	redirect('/report/index');
	}
}
public function export_csv_customer_sale_product_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-csv-customer-sale-product-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function product_stock_summary(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('product-stock-summary');
	}
	else
	{
	redirect('/report/index');
	}
}

public function report_product_quantity(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('report-product-quantity');
	}
	else
	{
	redirect('/report/index');
	}
}
// report-product-quantity-summary
public function report_product_quantity_summary(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('report-product-quantity-summary');
	}
	else
	{
	redirect('/report/index');
	}
}

public function print_product_stockreport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-product-stockreport');
	}
	else
	{
	redirect('/report/index');
	}
}
public function print_product_stockreport_1(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-product-stockreport-1');
	}
	else
	{
	redirect('/report/index');
	}
}

public function print_product_summary(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-product-summary');
	}
	else
	{
	redirect('/report/index');
	}
}
public function print_invoice_rep(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-invoice-rep');
	}
	else
	{
	redirect('/report/index');
	}
}
public function print_product_quantity(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-product-quantity');
	}
	else
	{
	redirect('/report/index');
	}
}
// 'print-product-quantity-summary'//
public function print_product_quantity_summary(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-product-quantity-summary');
	}
	else
	{
	redirect('/report/index');
	}
}

public function export_csv_product_stock_report_1(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-csv-product-stock-report-1');
	}
	else
	{
	redirect('/report/index');
	}
}

public function customer_sale_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('customer-sale-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function print_customer_sale_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-customer-sale-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function export_csv_customer_sale_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-csv-customer-sale-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function export_csv_product_serial_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-csv-product-serial-report');
	}
	else
	{
	redirect('/report/index');
	}
}
public function export_csv_product_quantity(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-csv-product-quantity');
	}
	else
	{
	redirect('/report/index');
	}
}
// export-csv-product-quantity-summary//
public function export_csv_product_quantity_summary(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-csv-product-quantity-summary');
	}
	else
	{
	redirect('/report/index');
	}
}

public function all_csv_invoice(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('all-csv-invoice');
	}
	else
	{
	redirect('/report/index');
	}
}


public function monthly_payment_receive_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('monthly-payment-receive-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function print_monthly_payment_receive_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-monthly-payment-receive-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function export_csv_monthly_pay_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-csv-monthly-pay-report');
	}
	else
	{
	redirect('/report/index');
	}
}

public function product_max_level(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('product-max-level');
	}
	else
	{
	redirect('/report/index');
	}
}

public function print_product_max_level(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-product-max-level');
	}
	else
	{
	redirect('/report/index');
	}
}
public function export_csv_product_max_level(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-product-max-level');
	}
	else
	{
	redirect('/report/index');
	}
}
//---------------------------------------------------------- close report function------------------------



//---------------------------------------------------------- start color report function------------------------


public function product_color_report(){   
	if($this->session->userdata('is_logged_in')){
		$this->load->view('product-color-stockreport');
	}
	else
	{
	redirect('/report/index');
	}
}

//---------------------------------------------------------- close color report function------------------------



//---------------------------------------------------------- start Fabricator report function------------------------


public function product_fabricator_report(){   
	if($this->session->userdata('is_logged_in')){
		$this->load->view('report-fabricator');
	}
	else
	{
	redirect('/report/index');
	}
}



public function fabricator_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('fabricator-report');
	}
	else
	{
	redirect('/report/index');
	}
}
//---------------------------------------------------------- close fabricator report function------------------------

//---------------------------------------------------------- print color report function------------------------

public function printcolor_stockreport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print_color_stockreport');
	}
	else
	{
	redirect('/report/index');
	}
}


public function print_fabricator_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-fabricator-report');
	}
	else
	{
	redirect('/report/index');
	}
}


public function export_printcolor_stockreport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-product-color-stockreport');
	}
	else
	{
	redirect('/report/index');
	}
}


public function export_product_fabricator_report(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('export-product-fabricator-report');
	}
	else
	{
	redirect('/report/index');
	}
}
//===============================================================purchase order report============


public function purchaseOrderReport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('purchaseOrderReport');
	}
	else
	{
	redirect('/report/index');
	}
}

public function print_Purchase_order_rep(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-purchase-order-rep');
	}
	else
	{
	redirect('/report/index');
	}
}
public function all_csv_purchase_order(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('all-csv-purchase-order');
	}
	else
	{
	redirect('/report/index');
	}
}


//===============================================================Sales order report============


public function salesOrderReport(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('salesOrderReport');
	}
	else
	{
	redirect('/report/index');
	}
}

public function print_sales_order_rep(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('print-sales-order-rep');
	}
	else
	{
	redirect('/report/index');
	}
}
public function all_csv_sales_order(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('all-csv-sales-order');
	}
	else
	{
	redirect('/report/index');
	}
}

}

?>