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

public function view_activity()
{
	if($this->session->userdata('is_logged_in'))
	{
		$data['ID'] = $_GET['ID'];
		$this->load->view('view-activity',$data);
	}
	else
	{
	redirect('index');
	}
}


//=======================Product Stock======================

function searchStock() 
{
    if($this->session->userdata('is_logged_in'))
	{
		$data = $this->ProductStockData();
    	$this->load->view('add-report', $data);
	}
	else
	{
		redirect('index');
	}
}

function ProductStockData()
{

  	  $data['result'] = "";
	  $table_name  = 'tbl_product_stock';
	  //$url        = site_url('/report/Report/searchStock?');
	  $sgmnt      = "4";
	  
	  if($_GET['entries'] != '')
	  {
	  	$showEntries = $_GET['entries'];
	  }
	  else
	  {
	  	$showEntries= 10;
	  }
      
	  $totalData  = $this->model_report->count_product($pagination['per_page'],$pagination['page'],$this->input->get());
      
	  if($_GET['entries'] != '' && $_GET['filter'] != 'filter')
	  {
         $url = site_url('/report/Report/searchStock?entries='.$_GET['entries']);
      }
	  elseif($_GET['filter'] == 'filter' || $_GET['entries'] != '')
	  {
	  	$url = site_url('/report/Report/searchStock?p_name='.$_GET['p_name'].'&category='.$_GET['category'].'&filter='.$_GET['filter'].'&entries='.$_GET['entries']);
	  }
	  else
	  {
	  	$url = site_url('/report/Report/searchStock?');
	  }
      
	  $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
      
	  $data=$this->user_function();      // call permission fnctn
      $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
      $data['pagination']        = $this->pagination->create_links();
	 
	  if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterProductList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getProduct($pagination['per_page'],$pagination['page']);
			
      return $data;

}

//=========================Lead==================

function searchLead() 
{
    if($this->session->userdata('is_logged_in'))
	{
		$data = $this->Manage_Lead_Data();
    	$this->load->view('lead-report', $data);
	}
	else
	{
		redirect('index');
	}
}

function Manage_Lead_Data()
{


  	  $data['result'] = "";
	  $table_name  = 'tbl_leads';
	  //$url        = site_url('/report/Report/searchLead?');
	  $sgmnt      = "4";
	  
	  if($_GET['entries'] != '')
	  {
	  	$showEntries = $_GET['entries'];
	  }
	  else
	  {
	  	$showEntries= 10;
	  }
      
	  $totalData  = $this->model_report->count_lead($pagination['per_page'],$pagination['page'],$this->input->get());
      
	  if($_GET['entries'] != '' && $_GET['filter'] != 'filter')
	  {
         $url = site_url('/report/Report/searchLead?entries='.$_GET['entries']);
      }
	  elseif($_GET['filter'] == 'filter' || $_GET['entries'] != '')
	  {
	  	$url = site_url('/report/Report/searchLead?contact_id='.$_GET['contact_id'].'&sale_person_id='.$_GET['sale_person_id'].'&filter='.$_GET['filter'].'&entries='.$_GET['entries']);
	  }
	  else
	  {
	  	$url = site_url('/report/Report/searchLead?');
	  }
      
	  $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
      $data=$this->user_function();      // call permission fnctn
      $data['dataConfig'] = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
      $data['pagination'] = $this->pagination->create_links();
	 
	  if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterLeadList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getLead($pagination['per_page'],$pagination['page']);
			
      return $data;


}

//=======================Activity====================

function searchActivity() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['activitySearch'] = $this->model_report->getSearchActivity($l_no,$f_date,$t_date);
	$data = $this->Manage_Activity();
    $this->load->view('activity-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_Activity()
{
	  $data['result'] = "";
	  $table_name  = 'tbl_activity_log';
	  $url        = site_url('/report/Report/searchActivity?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_activity($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchActivity?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterActivityList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getActivity($pagination['per_page'],$pagination['page']);
			
     return $data;

}

//================


function searchTotalStock() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['totalSearchStock'] = $this->model_report->geTtotalSearchStock($p_name,$p_code);
    $this->load->view('total-product-stock-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchPaymentReport() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['totalSearchPayment'] = $this->model_report->getSearchPayment($contactid,$payment_mode);
    $this->load->view('payment-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchPaymentReceivedReport(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['SearchPaymentReceived'] = $this->model_report->getSearchPaymentReceived($contactid,$payment_mode);
    $this->load->view('payment-received-report', $postlist);
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

//====================Tour Report==========

function searchTourReport() 
{
    if($this->session->userdata('is_logged_in'))
	{
		$data = $this->ManageTourData();
		$this->load->view('tour-report', $data);
	}
	else
	{
		redirect('index');
	}
}

function ManageTourData()
{

	  $data['result'] = "";
	  $table_name  = 'tbl_tour';
	  //$url        = site_url('/report/Report/searchTourReport?');
	  $sgmnt      = "4";
	  
	  if($_GET['entries'] != '')
	  {
	  	$showEntries = $_GET['entries'];
	  }
	  else
	  {
	  	$showEntries= 10;
	  }
      
	  $totalData  = $this->model_report->count_tour($pagination['per_page'],$pagination['page'],$this->input->get());
      
	  if($_GET['entries'] != '' && $_GET['filter'] != 'filter')
	  {
         $url = site_url('/report/Report/searchTourReport?entries='.$_GET['entries']);
      }
	  elseif($_GET['filter'] == 'filter' || $_GET['entries'] != '')
	  {
	  	$url = site_url('/report/Report/searchTourReport?contact_id='.$_GET['contact_id'].'&sales_person_id='.$_GET['sales_person_id'].'&f_date='.$_GET['f_date'].'&t_date='.$_GET['t_date'].'&filter='.$_GET['filter'].'&entries='.$_GET['entries']);
	  }
	  else
	  {
	  	$url = site_url('/report/Report/searchTourReport?');
	  }
      
	  $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
      $data=$this->user_function();      // call permission fnctn
      $data['dataConfig'] = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
      $data['pagination'] = $this->pagination->create_links();
	 
	  if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterTourList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getTour($pagination['per_page'],$pagination['page']);
			
      return $data;


}



}

?>