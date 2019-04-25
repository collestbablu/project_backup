<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Report extends my_controller {

function __construct(){
   parent::__construct(); 
	$this->load->library('pagination'); 
    $this->load->model('model_admin_login');
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

//======================Product Stock===================
function searchStock() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data =  $this->manage_productJoin();
    $this->load->view('add-product-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function manage_productJoin(){
  	 $data['result'] = "";
	  $table_name  = 'tbl_product_stock';
	  $url        = site_url('/report/Report/searchStock?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_product($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchStock?entries='.$_GET['entries']);
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

//==============================End======================

function searchReorderLevel() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data =  $this->manage_reorderLevel();
    $this->load->view('minimum-reorder-level-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function manage_reorderLevel(){
  	 $data['result'] = "";
	  $table_name  = 'tbl_product_stock';
	  $url        = site_url('/report/Report/searchReorderLevel?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_item($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchReorderLevel?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterItemList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getItem($pagination['per_page'],$pagination['page']);
			
     return $data;
}

//=========================

function searchTemplate() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data = $this->manage_Template();
    $this->load->view('template-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function manage_Template(){
  	 $data['result'] = "";
	  $table_name  = 'tbl_template_hdr';
	  $url        = site_url('/report/Report/searchTemplate?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_template($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchTemplate?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterTemplateList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getTemplate($pagination['per_page'],$pagination['page']);
			
     return $data;
}




function view_template() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-template');
	}
	else
	{
	redirect('index');
	}
}

//=====================

function searchMasterCutting() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data = $this->manage_cutting();
    $this->load->view('master-cutting-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function manage_cutting(){
		  	 
	  $data['result'] = "";
	  $table_name  = 'tbl_production_hdr';
	  $url        = site_url('/report/Report/searchMasterCutting?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_cutting($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchMasterCutting?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterCuttingList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getCutting($pagination['per_page'],$pagination['page']);
			
     return $data;
}


function view_master_cutting() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-master-cutting');
	}
	else
	{
	redirect('index');
	}
}

///==============================

function searchQualityCheck(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data = $this->manage_qc_list();
    $this->load->view('qc-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function view_qc() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-qc');
	}
	else
	{
	redirect('index');
	}
}

function manage_qc_list(){
  	 $data['result'] = "";
	  $table_name  = 'tbl_qualitiy_check';
	  $url        = site_url('/report/Report/searchQualityCheck?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_qc($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchQualityCheck?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterQCList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getQc($pagination['per_page'],$pagination['page']);
			
     return $data;
}


//==================Tailor==========================================
function searchTailor(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data =  $this->manage_tailor();
    $this->load->view('tailor-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function manage_tailor(){
  	 $data['result'] = "";
	  ////Pagination start ///
      $table_name  = 'tbl_production_log';
	  $url        = site_url('/report/Report/searchTailor?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_tailor($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchTailor?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     //////Pagination end ///
   
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterTailorList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getTailor($pagination['per_page'],$pagination['page']);
			
     return $data;
}

//=================================================
function searchWhereQty(){
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data =  $this->manage_stockStage();
    $this->load->view('where-qty-report', $data);
	}
	else
	{
	redirect('index');
	}
}


function manage_stockStage(){
  	 $data['result'] = "";
	  $table_name  = 'tbl_product_stock';
	  $url        = site_url('/report/Report/searchWhereQty?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_Stock($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchWhereQty?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterStockList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getStock($pagination['per_page'],$pagination['page']);
			
     return $data;
}

//=================================================

function view_tailor() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-tailor');
	}
	else
	{
	redirect('index');
	}
}

//======================
function searchPacking() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['packingSearch'] = $this->model_report->getSearchPacking($p_id,$f_date,$t_date);
	$data = $this->manage_packing_list();
    $this->load->view('packing-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function manage_packing_list(){
  	 $data['result'] = "";
	  ////Pagination start ///
      $table_name  = 'tbl_packing';
	  $url        = site_url('/report/Report/searchPacking?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_packing($pagination['per_page'],$pagination['page'],$this->input->get());
      //$showEntries= $_GET['entries']?$_GET['entries']:'12';
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchPacking?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
     //////Pagination end ///
   
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     //$data['result']            = $this->model_report->getSearchStock($pagination['per_page'],$pagination['page'],$this->input->get());	
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result']       = $this->model_report->filterPackingList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getPacking($pagination['per_page'],$pagination['page']);
			
     return $data;
}



function view_packing() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-packing');
	}
	else
	{
	redirect('index');
	}
}


//=====================

}

?>