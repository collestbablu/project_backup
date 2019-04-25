<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class model_report extends CI_Model {

function getSearchStock($name,$g_name,$m_no) {
	if($name!='' || $g_name!='' || $m_no!=''){
    $select_query = "Select * from tbl_contact_m where group_name='$g_name' || first_name like '$name' || mobile like '$m_no'";
    	}else{
	$select_query = "Select * from tbl_contact_m";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}


function geTdocketSearch($d_no,$consignor,$consignee,$transport,$status,$fdate,$tdate) {
	if($d_no!='' || $consignor!='' || $consignee!='' || $transport!='' || $status!='' || $fdate!='' || $tdate!=''){
	$select_query = "Select * from tbl_docket_entry where docket_no='$d_no' || consignor ='$consignor' || consignee = '$consignee' || mode like '$transport' || booked_status like '$status' || booking_date>='$fdate' and booking_date<='$tdate'";
		}else{
	$select_query = "Select * from tbl_docket_entry Order by booking_date ASC";	
		}
	$query = $this->db->query($select_query);
    return $rrr=$query->result();
}

function geTconsignorInvoiceSearch($d_no,$consignor,$consignee,$transport,$status,$fdate,$tdate) {
	if($d_no!='' || $consignor!='' || $consignee!='' || $transport!='' || $status!='' || $fdate!='' || $tdate!=''){
	$select_query = "Select * from tbl_docket_entry where docket_no='$d_no' || consignor ='$consignor' || consignee = '$consignee' || mode like '$transport' || booked_status like '$status' || booking_date>='$fdate' and booking_date<='$tdate'";
		}else{
	$select_query = "Select * from tbl_docket_entry Order by booking_date ASC";	
		}
	$query = $this->db->query($select_query);
    return $rrr=$query->result();
}

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