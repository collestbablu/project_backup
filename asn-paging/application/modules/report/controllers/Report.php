<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Report extends my_controller {
function __construct(){
   parent::__construct(); 
    $this->load->library('pagination');
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

//=======================ConsignorInvoice=================

public function searchConsignorInvoice(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in'))
	{
		$data = $this->Manage_ConsignorInvoice();
		$this->load->view('consignor-invoice-report',$data);
	}
	else
	{
	redirect('index');
	}
}

public function Manage_ConsignorInvoice(){

  	  $data['result'] = "";
	  $table_name  = 'tbl_contact_m';
	  $url        = site_url('/report/Report/searchConsignorInvoice?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_invoice($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchConsignorInvoice?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterInvoiceData($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getInvoice($pagination['per_page'],$pagination['page']);
			
     return $data;

}

//================================End=======================

public function searchDocket(){   //product-color-stockreport
	if($this->session->userdata('is_logged_in')){
		$this->load->view('docket-report');
	}
	else
	{
	redirect('index');
	}
}
//====================Consignee/Consigner Report==================
function searchStock() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['stockSearch'] = $this->model_report->getSearchStock($name,$g_name,$m_no);
	$data = $this->Manage_Contact_List();
    $this->load->view('add-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_Contact_List(){

  	  $data['result'] = "";
	  $table_name  = 'tbl_contact_m';
	  $url        = site_url('/report/Report/searchStock?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_all($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchStock?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterContactList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getContact($pagination['per_page'],$pagination['page']);
			
     return $data;

}


//===================================End==========================
/*
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
*/
/*function searchConsignorInvoice() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['ConsignorInvoiceSearch'] = $this->model_report->geTconsignorInvoiceSearch($d_no,$consignor,$consignee,$mode,$status,$fdate,$tdate);
    $this->load->view('consignor-invoice-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}*/


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