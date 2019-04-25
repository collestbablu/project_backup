<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Report extends my_controller {
function __construct(){
   parent::__construct(); 
    $this->load->model('model_report');	
}     

function report_function() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('open-page-report');
	}
	else
	{
	redirect('index');
	}
}

public function viewContactName(){
	if($this->session->userdata('is_logged_in')){
	
	$this->load->view('view-contact-name');
	}
	else
	{
	redirect('index');
	}
		
}


function searchStock() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['stockSearch'] = $this->model_report->getSearchStock($name,$g_name,$m_no);
    $this->load->view('add-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}



function searchDocket() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['docketSearch'] = $this->model_report->geTdocketSearch($d_no,$consignor,$consignee,$mode,$status,$fdate,$tdate);
    $this->load->view('docket-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchConsignorInvoice() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['ConsignorInvoiceSearch'] = $this->model_report->geTconsignorInvoiceSearch($d_no,$consignor,$consignee,$mode,$status,$fdate,$tdate);
    $this->load->view('consignor-invoice-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}


function searchProductStockSummery() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['searchProductStockSummery'] = $this->model_report->geTSearchProductStockSummery($p_name,$p_code);
    $this->load->view('product-stock-summery-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}



function searchPurchaseOrder() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['purchaseOrderSearch'] = $this->model_report->getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date,$g_total);
    $this->load->view('add-purchaseorder-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}	

function searchSalesOrder() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['saleOrderSearch'] = $this->model_report->getSearchSaleOrder($p_no,$v_name,$f_date,$t_date,$g_total);
    $this->load->view('add-saleorder-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}	

}

?>