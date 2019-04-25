<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class model_report extends CI_Model {

//==========================Consignee/Consignor===========

function getContact($last,$strat){

	  $query=$this->db->query("Select * from tbl_contact_m  where status = 'A' ORDER BY `tbl_contact_m`.`contact_id` DESC limit $strat,$last ");
	  return $result=$query->result();  
	  
}
function filterContactList($perpage,$pages,$get){

					  $qry = "Select * from tbl_contact_m  where status = 'A'  ";
					  
					 if(sizeof($get) > 0)
					 {
					
					   if($get['name'] != "")					
					     {
					 		$qry .= " AND first_name like '%".$get['name']."%' ";
						 }
					   if($get['g_name'] != "")					
					     {
					 		$qry .= " AND group_name = '".$get['g_name']."' ";
						 }
					   if($get['m_no'] != "")					
						 {
							$qry .= " AND mobile like '%".$get['m_no']."%' ";
						 }
					 }
				   
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_all($perpage,$pages,$get){
 	
					  $qry = "Select * from tbl_contact_m  where status = 'A' ";
					  
					 if(sizeof($get) > 0)
					 {
					
					   if($get['name'] != "")					
					     {
					 		$qry .= " AND first_name like '%".$get['name']."%' ";
						 }
					   if($get['g_name'] != "")					
					     {
					 		$qry .= " AND group_name = '".$get['g_name']."' ";
						 }
					   if($get['m_no'] != "")					
						 {
							$qry .= " AND mobile like '%".$get['m_no']."%' ";
						 }
					 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}


//=========================End==========================

function geTdocketSearch($d_no,$consignor,$consignee,$transport,$status,$fdate,$tdate) {
	if($d_no!='' || $consignor!='' || $consignee!='' || $transport!='' || $status!='' || $fdate!='' || $tdate!=''){
	$select_query = "Select * from tbl_docket_entry where docket_no='$d_no' || consignor ='$consignor' || consignee = '$consignee' || mode like '$transport' || booked_status like '$status' || booking_date>='$fdate' and booking_date<='$tdate'";
		}else{
	$select_query = "Select * from tbl_docket_entry Order by booking_date ASC";	
		}
	$query = $this->db->query($select_query);
    return $rrr=$query->result();
}
//=============================Consignor Invoice=====================


function getInvoice($last,$strat){

	  $query=$this->db->query("Select * from tbl_docket_entry  where status = 'A' ORDER BY `tbl_docket_entry`.`id` DESC limit $strat,$last ");
	  return $result=$query->result();  
	  
}
function filterInvoiceData($perpage,$pages,$get){

					  $qry = "Select * from tbl_docket_entry  where status = 'A'  ";
					  
					 if(sizeof($get) > 0)
					 {
					
					   if($get['d_no'] != "")					
					     {
					 		$qry .= " AND docket_no = '".$get['d_no']."' ";
						 }
					   if($get['consignor'] != "")					
					     {
					 		$qry .= " AND consignor = '".$get['consignor']."' ";
						 }
					   if($get['consignee'] != "")					
						 {
							$qry .= " AND consignee = '".$get['consignee']."' ";
						 }
					   if($get['mode'] != "")					
						 {
							$qry .= " AND mode = '".$get['mode']."' ";
						 }
						if($get['status'] != "")					
						 {
							$qry .= " AND booked_status = '".$get['status']."' ";
						 }
						
					   if($get['fdate']!='' && $get['tdate']!='')
						{
							$tdate=explode("-",$get['tdate']);
							$fdate=explode("-",$get['fdate']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and booking_date >='$fdate1' and booking_date <='$todate1'";
						}
					
				     }
				   
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_invoice($perpage,$pages,$get){
 	
					  $qry = "Select * from tbl_docket_entry  where status = 'A' ";
					  
					 if(sizeof($get) > 0)
					 {
					
					   if($get['d_no'] != "")					
					     {
					 		$qry .= " AND docket_no = '".$get['d_no']."' ";
						 }
					   if($get['consignor'] != "")					
					     {
					 		$qry .= " AND consignor = '".$get['consignor']."' ";
						 }
					   if($get['consignee'] != "")					
						 {
							$qry .= " AND consignee = '".$get['consignee']."' ";
						 }
					   if($get['mode'] != "")					
						 {
							$qry .= " AND mode = '".$get['mode']."' ";
						 }
						if($get['status'] != "")					
						 {
							$qry .= " AND booked_status = '".$get['status']."' ";
						 }
						
					   if($get['fdate']!='' && $get['tdate']!='')
						{
							$tdate=explode("-",$get['tdate']);
							$fdate=explode("-",$get['fdate']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and booking_date >='$fdate1' and booking_date <='$todate1'";
						}
					
				     }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}

//============================End====================================

function geTSearchProductStockSummery($searchBook,$pcode) {
	if($searchBook!='' || $pcode!=''){
	$Query=$this->db->query("select * from tbl_product_stock where  productname like '%$searchBook%'");
						    $fetchQ=$Query->row();
							$row=$fetchQ->Product_id;
	$select_query = "Select * from tbl_product_serial_log where comp_id='".$this->session->userdata('comp_id')."' && brnh_id = '".$this->session->userdata('brnh_id')."' &&  serial_number='$pcode' || product_id = '$row'";
		}else{
	$select_query = "Select * from tbl_product_serial_log";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}


function getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date,$g_total) {
	if($p_no!='' || $v_name!='' || $f_date!='' || $t_date!='' || $g_total!=''){
//	echo $g_total;die;
   $select_query_po = "Select * from tbl_purchase_order_hdr where purchase_order_id='$p_no' || vendor_id='$v_name'  || grand_total='$g_total' || delivery_date >='$f_date' and delivery_date <='$t_date'";
    	}else{
	$select_query_po = "Select * from tbl_purchase_order_hdr";	
		}
	$query = $this->db->query($select_query_po);
    return $query->result();
}
function getSearchSaleOrder($p_no,$v_name,$f_date,$t_date,$g_total) {
	if($p_no!='' || $v_name!='' || $f_date!='' || $t_date!='' || $g_total!=''){
//	echo $g_total;die;
   $select_query_po = "Select * from tbl_sales_order_hdr where salesid='$p_no' || vendor_id='$v_name'  || grand_total='$g_total' || invoice_date >='$f_date' and invoice_date <='$t_date'";
    	}else{
	$select_query_po = "Select * from tbl_sales_order_hdr";	
		}
	$query = $this->db->query($select_query_po);
    return $query->result();
}
}
?>