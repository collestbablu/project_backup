<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Report extends my_controller {
function __construct(){
   parent::__construct(); 
   $this->load->model('model_report');	
   $this->load->library('pagination');
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
//=========================Payment===================
function searchPaymentReport() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['SearchPayment'] = $this->model_report->getSearchPayment($contactid);
	$data = $this->Manage_Payment();
    $this->load->view('payment-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_Payment()
{


  	 $data['result'] = "";
	  $table_name  = 'tbl_contact_m';
	  $url        = site_url('/report/Report/searchPaymentReport?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_payment($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchPaymentReport?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterPayment($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getPayment($pagination['per_page'],$pagination['page']);
			
     return $data;


}

function searchPaymentLogReport() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['totalSearchPayment'] = $this->model_report->getSearchPaymentLog($contactid,$payment_mode,$f_date,$t_date);
	$data = $this->Manage_PaymentLog();
    $this->load->view('payment-log-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_PaymentLog()
{

  	 $data['result'] = "";
	  $table_name  = 'tbl_invoice_payment';
	  $url        = site_url('/report/Report/searchPaymentLogReport?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_payment_log($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchPaymentLogReport?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterPaymentLog($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getPaymentLog($pagination['per_page'],$pagination['page']);
			
     return $data;



}



function searchPaymentReceivedReport(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['SearchPaymentReceived'] = $this->model_report->getSearchPaymentReceived($contactid);
	$data = $this->Manage_PaymentReceived();
    $this->load->view('payment-received-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_PaymentReceived()
{


  	 $data['result'] = "";
	  $table_name  = 'tbl_contact_m';
	  $url        = site_url('/report/Report/searchPaymentReceivedReport?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_payment_received($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchPaymentReceivedReport?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterPaymentReceived($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getPaymentReceived($pagination['per_page'],$pagination['page']);
			
     return $data;

}

function searchPaymentReceivedLogReport(){
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['SearchPaymentReceivedLog'] = $this->model_report->getSearchPaymentReceivedLog($contactid,$payment_mode,$f_date,$t_date);
	$data = $this->Manage_PaymentReceivedLog();
    $this->load->view('payment-received-log-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_PaymentReceivedLog()
{


  	 $data['result'] = "";
	  $table_name  = 'tbl_invoice_payment';
	  $url        = site_url('/report/Report/searchPaymentReceivedLogReport?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_payment_received_log($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchPaymentReceivedLogReport?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterPaymentReceivedLog($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getPaymentReceivedLog($pagination['per_page'],$pagination['page']);
			
     return $data;

}


//============================Product Stock====================

function searchStock() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['stockSearch'] = $this->model_report->getSearchStock($p_id,$p_name);
	$data = $this->Manage_Product_Stock();
    $this->load->view('add-product-report',$data);
	}
	else
	{
	redirect('index');
	}
}

function dailyWiseReport() 
{
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	 //$postlist['stockSearch'] = $this->model_report->getSearchStock($p_id,$p_name);
	 $data = $this->dailyWiseStock();
     $this->load->view('daily-report',$data);
	}
	else
	{
	 redirect('index');
	}
}

function dailyWiseStock()
  {
      $data['result'] = "";
	  $table_name     = 'tbl_product_stock';
	  $url            = site_url('/report/Report/dailyWiseReport?');
	  $sgmnt          = "4";
	  $showEntries    = 10;
      $totalData      = $this->model_report->count_dailyproduct($pagination['per_page'],$pagination['page'],$this->input->get());

      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url         = site_url('/report/Report/dailyWiseReport?entries='.$_GET['entries']);
      }
     $pagination      = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data            = $this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
     $data['result']  = $this->model_report->filtermoddailyreport($pagination['per_page'],$pagination['page'],$this->input->get());
     else	
	 $data['result']  = $this->model_report->moddailyreport($pagination['per_page'],$pagination['page']);
			
    return $data;
 }


function Manage_Product_Stock()
{

		  $table_name='tbl_product_stock';
    	  $data['result'] = "";
		  ////Pagination start ///
		  $url   = site_url('/report/Report/searchStock?');
		  $sgmnt = "4";

		  if($_GET['entries']!="")
		  	$showEntries = $_GET['entries'];
		  else
		  	$showEntries = 10;
		 
		 
		 $totalData   = $this->model_report->count_product($table_name,'A',$this->input->get());

		 if($_GET['entries']!="" && $_GET['filter'] == 'filter'){
			$url   = site_url('/report/Report/searchStock?entries='.$_GET['entries']);
		  } elseif($_GET['filter'] == 'filter' || $_GET['entries'] != ''){
		  	$url   = site_url('/report/Report/searchStock?entries='.$_GET['entries'].'&p_name='.$_GET['p_name'].'&filter='.$_GET['filter']);
		  	 
		  }
			 else
	  {
	  	$url = site_url('/report/Report/searchStock?');
	  }


		  $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
          $data       = $this->user_function();
	      //////Pagination end ///
 		  $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
		  $data['pagination']        = $this->pagination->create_links();
		
		  if($this->input->get('filter') == 'filter' || $_GET['entries']!='')   ////filter start ////
			$data['result']          = $this->model_report->filterProductList($pagination['per_page'],$pagination['page'],$this->input->get());
		  else	
			$data['result']          = $this->model_report->getProduct($pagination['per_page'],$pagination['page']);

          // call permission fnctn
	      return $data;





	 

}

//***********************************Product Location*********************************************************

function searchlocation() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['stockSearch'] = $this->model_report->getSearchStock($p_id,$p_name);
	$data = $this->Manage_Product_location();
    $this->load->view('add-product-location-report',$data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_Product_location()
{

  	 $data['result'] = "";
	  $table_name  = 'tbl_product_serial';
	  $url        = site_url('/report/Report/searchlocation?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_location($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchlocation?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterlocationList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getlocation($pagination['per_page'],$pagination['page']);
			
     return $data;

}


//******************************************GRN**********************************************************
function grn_report() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['stockSearch'] = $this->model_report->getSearchStock($p_id,$p_name);
	$data = $this->Manage_grn_Stock();
    $this->load->view('grn-report',$data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_grn_Stock()
{

  	 $data['result'] = "";
	  $table_name  = 'tbl_inbound_hdr';
	  $url        = site_url('/report/Report/grn_report?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_grn($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/grn_report?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filtergrnList($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getgrn($pagination['per_page'],$pagination['page']);
			
     return $data;

}

//**********************************************************Order Report***************************************

function order_report() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['stockSearch'] = $this->model_report->getSearchStock($p_id,$p_name);
	$data = $this->Manage_order_report();
    $this->load->view('order-report',$data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_order_report()
{
		  $table_name='tbl_order_hdr';
    	  $data['result'] = "";
		  ////Pagination start ///
		  $url   = site_url('/report/Report/order_report?');
		  $sgmnt = "4";

		  if($_GET['entries']!="")
		  	$showEntries = $_GET['entries'];
		  else
		  	$showEntries = 10;
		 
		 
		 $totalData   = $this->model_report->count_order($table_name,'A',$this->input->get());

		 if($_GET['entries']!="" && $_GET['filter'] != 'filter'){
				$url   = site_url('/report/Report/order_report?entries='.$_GET['entries'].'&doc_no='.$_GET['doc_no'].'&veh_no='.$_GET['veh_no'].'&r_name='.$_GET['r_name'].'&dest='.$_GET['dest'].'&transporter_name='.$_GET['transporter_name'].'&vehicle_date='.$_GET['vehicle_date'].'&f_date='.$_GET['f_date'].'&t_date='.$_GET['t_date'].'&filter='.$_GET['filter']);
		  
		  }
		  elseif($_GET['filter'] == 'filter' || $_GET['entries'] != ''){
		  	$url   = site_url('/report/Report/order_report?entries='.$_GET['entries'].'&doc_no='.$_GET['doc_no'].'&veh_no='.$_GET['veh_no'].'&r_name='.$_GET['r_name'].'&dest='.$_GET['dest'].'&transporter_name='.$_GET['transporter_name'].'&vehicle_date='.$_GET['vehicle_date'].'&f_date='.$_GET['f_date'].'&t_date='.$_GET['t_date'].'&filter='.$_GET['filter']);
		  	 
		  }
			 else
	  {
	  	$url = site_url('/report/Report/order_report?');
	  }


		  $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
          $data       = $this->user_function();
	      //////Pagination end ///
 		  $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
		  $data['pagination']        = $this->pagination->create_links();
		
		  if($this->input->get('filter') == 'filter' || $_GET['entries']!='')   ////filter start ////
			$data['result']          = $this->model_report->filterorderList($pagination['per_page'],$pagination['page'],$this->input->get());
		  else	
			$data['result']          = $this->model_report->getorder($pagination['per_page'],$pagination['page']);

          // call permission fnctn
	      return $data;




}



//============Template========================

function searchTemplate() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['searchTemplate'] = $this->model_report->getTemplateSearch($temp_id,$p_name,$f_date,$t_date);
	$data = $this->Manage_Template_Report();
    $this->load->view('template-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_Template_Report()
{


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
        	$data['result'] = $this->model_report->filterTemplate($pagination['per_page'],$pagination['page'],$this->input->get());
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


// function searchProduction() {
// 	extract($_POST);
//     if($this->session->userdata('is_logged_in')){
// 	//$postlist['masterCuttingSearch'] = $this->model_report->getSearchMasterCutting($p_id,$p_name,$f_date,$t_date);
// 	$data = $this->Manage_Production_Data();
//     $this->load->view('production-report', $postlist);
// 	}
// 	else
// 	{
// 	redirect('index');
// 	}
// }

// function Manage_Production_Data()
// {

//   	 $data['result'] = "";
// 	  $table_name  = 'tbl_template_hdr';
// 	  $url        = site_url('/report/Report/searchTemplate?');
// 	  $sgmnt      = "4";
// 	  $showEntries= 10;
//       $totalData  = $this->model_report->count_template($pagination['per_page'],$pagination['page'],$this->input->get());
//       if($_GET['entries']!=""){
//          $showEntries = $_GET['entries'];
//          $url     = site_url('/report/Report/searchTemplate?entries='.$_GET['entries']);
//       }
//      $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
//      $data=$this->user_function();      // call permission fnctn
//      $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
//      $data['pagination']        = $this->pagination->create_links();
	 
// 	 if($this->input->get('filter') == 'filter')   ////filter start ////
//         	$data['result'] = $this->model_report->filterTemplate($pagination['per_page'],$pagination['page'],$this->input->get());
//           	else	
//     		$data['result'] = $this->model_report->getTemplate($pagination['per_page'],$pagination['page']);
			
//      return $data;

// }

function inboundStock() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['masterCuttingSearch'] = $this->model_report->getSearchMasterCutting($p_id,$p_name,$f_date,$t_date);
	$data = $this->Manage_Inbound_Data();
    $this->load->view('inbound-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_Inbound_Data()
{

  	 $data['result'] = "";
	  $table_name  = 'tbl_template_hdr';
	  $url        = site_url('/report/Report/inboundStock?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_inbound($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/inboundStock?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterInbound($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getInbound($pagination['per_page'],$pagination['page']);
			
     return $data;

}

function searchProduction() {
    $_SERVER['REQUEST_URI'];
	extract($_GET);
	
    if($this->session->userdata('is_logged_in')){
    //pagination settings
    	$config['use_page_numbers'] = FAlSE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'offset';
    	//$config['get']=(isset($_GET['search']))?'?search='.$_GET['search']:'';
    	if($_GET['p_name']!="" || $_GET['p_id']!="" || $_GET['f_date']!="" || $_GET['t_date']!="" || $_GET['type']!="")
    		$getval="?p_name=".$_GET['p_name']."&p_id=".$_GET['p_id']."&f_date=".$_GET['f_date']."&t_date=".$_GET['t_date']."&type=".$_GET['type']."&Show=Show";
    	else{
    		$getval ="?"; 
    	}

        $config['base_url']       =  site_url('/report/Report/searchProduction'.$getval);
        $config['total_rows']     =  count($this->model_report->getSearchMasterCutting($_GET,'',0));
        $config['per_page']       =  "6";
        $config["uri_segment"]    =   4;
        $choice                   =  $config["total_rows"] / $config["per_page"];
        $config["num_links"]      =  floor($choice);
     
        //config for bootstrap pagination class integration
        $config['full_tag_open']  = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link']     = 'First';
        $config['last_link']      = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close']= '</li>';
        $config['prev_link']      = '&laquo';
        $config['prev_tag_open']  = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link']      = '&raquo'; 
        $config['next_tag_open']  = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open']  = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open']   = '<li class="active"><a href="#">';
        $config['cur_tag_close']  = '</a></li>';
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';

        $this->pagination->initialize($config);
        $pages = $_GET['per_page'];
        $postlist['page'] = ($pages != "") ? $pages : 0;	
        //echo $this->uri->segment(4);
        $postlist['totalrow'] = $config['total_rows'];

        $postlist['getfinishgood']       = $this->model_report->mod_finishgood();	
	    $postlist['masterCuttingSearch'] = $this->model_report->getSearchMasterCutting($_GET,$config["per_page"], $postlist['page']);
	    $postlist['pagination']          = $this->pagination->create_links();

        $this->load->view('production-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchProductionOverlocking() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $postlist['getfinishgood'] = $this->model_report->mod_finishgood();	
	$postlist['masterCuttingSearch'] = $this->model_report->getOverLocking($_POST,'Overlock');
    $this->load->view('production-report-overlocking', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchProductionCutting() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $postlist['getfinishgood'] = $this->model_report->mod_finishgood();	
	$postlist['masterCuttingSearch'] = $this->model_report->getOverLocking($_POST,'Cutting');
    $this->load->view('production-report-cutting', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchProductionPacking() {
	extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $postlist['getfinishgood'] = $this->model_report->mod_finishgood();	
	$postlist['masterCuttingSearch'] = $this->model_report->getOverLocking($_POST,'Packing');
    $this->load->view('production-report-Paking', $postlist);
	}
	else
	{
	redirect('index');
	}
}


function view_production() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-production');
	}
	else
	{
	redirect('index');
	}
}
//==================INvoice=============

function searchInvoice(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['invceSearch'] = $this->model_report->getSearchInvoice($inv_no,$cust_name,$f_date,$t_date);
	$data = $this->Manage_Invoice_Data();
    $this->load->view('invoice-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_Invoice_Data()
{


  	 $data['result'] = "";
	  $table_name  = 'tbl_invoice_hdr';
	  $url        = site_url('/report/Report/searchInvoice?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_invoice($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchInvoice?entries='.$_GET['entries']);
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

//==============================

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
//====================Proforma Invoice===============

function searchProInvoice(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['proInvceSearch'] = $this->model_report->getSearchProInvoice($inv_no,$cstmr_name,$f_date,$t_date);
	$data = $this->Manage_ProformaInvoice();
    $this->load->view('proforma-invoice-report', $data);
	}
	else
	{
	redirect('index');
	}
}

function Manage_ProformaInvoice()
{

  	  $data['result'] = "";
	  $table_name  = 'tbl_proforma_invoice_hdr';
	  $url        = site_url('/report/Report/searchProInvoice?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_pro_invoice($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchProInvoice?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterProInvoiceData($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getProInvoice($pagination['per_page'],$pagination['page']);
			
     return $data;


}

//=============================

function view_proforma_invoice() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-invoice-order');
	}
	else
	{
	redirect('index');
	}
}


function searchPacking() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['packingSearch'] = $this->model_report->getSearchPacking($p_id,$f_date,$t_date);
    $this->load->view('packing-report', $postlist);
	}
	else
	{
	redirect('index');
	}
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

//**********************************************************************************************************************************************************************************************************************

function searchPurchaseOrder() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['purchaseOrderSearch'] = $this->model_report->getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date);
	$data = $this->Manage_PurchaseOrder_Data();
    $this->load->view('add-purchaseorder-report', $data);
	}
	else
	{
	redirect('index');
	}
}	

function Manage_PurchaseOrder_Data()
{


  	 $data['result'] = "";
	  $table_name  = 'tbl_purchase_order_hdr';
	  $url        = site_url('/report/Report/searchPurchaseOrder?');
	  $sgmnt      = "4";
	  
	  if($_GET['entries']!="")
		  	$showEntries = $_GET['entries'];
		  else
		  	$showEntries = 10;
		 
      $totalData  = $this->model_report->count_po($table_name,'A',$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchPurchaseOrder?entries='.$_GET['entries']);
      }elseif($_GET['filter'] != ""){
		  	 $url   = site_url('/report/Report/searchPurchaseOrder?entries='.$_GET['entries'].'&p_no='.$_GET['p_no'].'&v_name='.$_GET['v_name'].'&f_date='.$_GET['f_date'].'&t_date='.$_GET['t_date'].'&filter='.$_GET['filter']);
		  	 // sku_no=&category=&productname=Bearing+&usages_unit=&purchase_price=&filter=filter
		  }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterPurchaseOrder($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getPurchaseOrder($pagination['per_page'],$pagination['page']);
			
     return $data;


}


//*********************************purchase order log report**************************************************

function searchPurchaseOrderlog() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['purchaseOrderSearch'] = $this->model_report->getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date);
	$data = $this->Manage_PurchaseOrderlog_Data();
    $this->load->view('purchaseorder-log-report', $data);
	}
	else
	{
	redirect('index');
	}
}	

function Manage_PurchaseOrderlog_Data()
{


  	 $data['result'] = "";
	  $table_name  = 'tbl_purchase_order_hdr';
	  $url        = site_url('/report/Report/searchPurchaseOrderlog?');
	  $sgmnt      = "4";
	  
	  if($_GET['entries']!="")
		  	$showEntries = $_GET['entries'];
		  else
		  	$showEntries = 10;
		 
      $totalData  = $this->model_report->count_po_log($table_name,'A',$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchPurchaseOrderlog?entries='.$_GET['entries']);
      }elseif($_GET['filter'] != ""){
		  	 $url   = site_url('/report/Report/searchPurchaseOrderlog?entries='.$_GET['entries'].'&p_no='.$_GET['p_no'].'&v_name='.$_GET['v_name'].'&f_date='.$_GET['f_date'].'&t_date='.$_GET['t_date'].'&filter='.$_GET['filter']);
		  	 // sku_no=&category=&productname=Bearing+&usages_unit=&purchase_price=&filter=filter
		  }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterPurchaseOrderlog($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getPurchaseOrderlog($pagination['per_page'],$pagination['page']);
			
     return $data;


}





//*********************************************************************************************************************************************************************************************************



function searchInboundOutboundOrder() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['purchaseOrderSearch'] = $this->model_report->getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date);
	$data = $this->Manage_InboundOutbound_Data();
    $this->load->view('inbound-outbound-report', $data);
	}
	else
	{
	redirect('index');
	}
}	

function Manage_InboundOutbound_Data()
{


  	 $data['result'] = "";
	  $table_name  = 'tbl_purchase_order_hdr';
	  $url        = site_url('/report/Report/searchInboundOutboundOrder?');
	  $sgmnt      = "4";
	  $showEntries= 10;
      $totalData  = $this->model_report->count_InboundOutboundOrder($pagination['per_page'],$pagination['page'],$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchInboundOutboundOrder?entries='.$_GET['entries']);
      }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterInboundOutboundOrder($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getInboundOutboundOrder($pagination['per_page'],$pagination['page']);
			
     return $data;


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


function view_inbound_outbound()
{
	$data=array(
	'id' => $_POST['id']
	);
	  $this->load->view('view-inbound-outbound', $data);
	
}

function ajax_viewinbound(){
  //echo $this->input->post('id');
}

public function view_inbound_outbond_details()
{
	
	$data=array(
	'id' => $_POST['id']
	);
	
$this->load->view("report/view-inbound-outbond-details",$data);	
	
}















//********************************************************************************************************************************************************************************************************************** purchase stock report

function searchPurchaseStockOrder() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	//$postlist['purchaseOrderSearch'] = $this->model_report->getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date);
	$data = $this->Manage_PurchaseStock_Data();
    $this->load->view('purchaseorder-stock-report', $data);
	}
	else
	{
	redirect('index');
	}
}	

function Manage_PurchaseStock_Data()
{


  	 $data['result'] = "";
	  $table_name  = 'tbl_purchase_order_hdr';
	  $url        = site_url('/report/Report/searchPurchaseStockOrder?');
	  $sgmnt      = "4";
	  
	  if($_GET['entries']!="")
		  	$showEntries = $_GET['entries'];
		  else
		  	$showEntries = 10;
		 
      $totalData  = $this->model_report->count_po_stock($table_name,'A',$this->input->get());
      if($_GET['entries']!=""){
         $showEntries = $_GET['entries'];
         $url     = site_url('/report/Report/searchPurchaseStockOrder?entries='.$_GET['entries']);
      }elseif($_GET['filter'] != ""){
		  	 $url   = site_url('/report/Report/searchPurchaseStockOrder?entries='.$_GET['entries'].'&p_no='.$_GET['p_no'].'&v_name='.$_GET['v_name'].'&f_date='.$_GET['f_date'].'&t_date='.$_GET['t_date'].'&filter='.$_GET['filter']);
		  	 // sku_no=&category=&productname=Bearing+&usages_unit=&purchase_price=&filter=filter
		  }
     $pagination   = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
  
    
     $data=$this->user_function();      // call permission fnctn
     $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
     $data['pagination']        = $this->pagination->create_links();
	 
	 if($this->input->get('filter') == 'filter')   ////filter start ////
        	$data['result'] = $this->model_report->filterPurchaseStock($pagination['per_page'],$pagination['page'],$this->input->get());
          	else	
    		$data['result'] = $this->model_report->getPurchaseStock($pagination['per_page'],$pagination['page']);
			
     return $data;


}

//

function view_po_stock() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data=array(
	'id' => $_POST['id']
	);
    $this->load->view('view-po-stock', $data);
	}
	else
	{
	redirect('index');
	}
}	




function view_po_stock_log() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data=array(
	'id' => $_POST['id']
	);
    $this->load->view('view-po-stock-log', $data);
	}
	else
	{
	redirect('index');
	}
}	

function view_po_stock_log_grn_stn() 
{
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$data=array(
	'id' => $_POST['id']
	);
    $this->load->view('view-po-stock-log-grn-stn', $data);
	}
	else
	{
	redirect('index');
	}
}	







}

?>