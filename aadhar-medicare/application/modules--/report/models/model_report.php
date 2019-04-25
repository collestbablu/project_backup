<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class model_report extends CI_Model {

function getSearchStock($p_id,$p_name) {
	if($p_id!='' || $p_name!=''){
    $select_query = "Select * from tbl_product_stock where status='A'";
    if($p_id!='')
		{				
			$select_query.=" and Product_id = '$p_id'";	  
		}
		if($p_name!='')
		{				
			$select_query.=" and productname  like '%$p_name%'";	  
		}
	}else{
			$select_query = "Select * from tbl_product_stock";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}

function getSearchReorderLevel($p_id,$p_name) {
	if($p_id!='' || $p_name!=''){
    $select_query = "Select * from tbl_product_stock where status='A'";
    if($p_id!='')
		{				
			$select_query.=" and Product_id = '$p_id'";	  
		}
		if($p_name!='')
		{				
			$select_query.=" and productname  like '%$p_name%'";	  
		}
	}else{
			$select_query = "Select * from tbl_product_stock";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}



function getSearchMasterCutting($p_id,$p_name,$f_date,$t_date) {
		if($p_id!='' || $p_name!='' || $f_date!='' || $t_date!=''){
    $select_query = "Select * from tbl_production_hdr where status='A'";
    
		if($p_id!='')
		{				
			$select_query.=" and productionid  = '$p_id'";	  
		}
	
		if($p_name!='')
		{				
		$sql1 = $this->db->query("select * from tbl_product_stock where productname like '%$p_name%' ");
			$sql2 = $sql1->row();
			$select_query.=" and product_id  = '$sql2->Product_id'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query .="and date >='$fdate1' and date <='$todate1'";
		}		
	}
		else{
	$select_query = "Select *from tbl_production_hdr ";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}


function getSearchQc($p_id,$t_name,$f_date,$t_date) {
    $select_query = "Select * from tbl_production_log where production_status='Quality Check'";
    
		if($p_id!='')
		{		
			$sql1 = $this->db->query("select * from tbl_qualitiy_check where qc_id = '$p_id' ");
			$sql2 = $sql1->row();	
			$select_query.=" and tailor_id  = '$sql2->tailor_id'";	  
		}
	
		if($t_name!='')
		{				
		$sql1 = $this->db->query("select * from tbl_contact_m where first_name like '%$t_name%' ");
			$sql2 = $sql1->row();
			$select_query.=" and customer_name  = '$sql2->contact_id'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query .="and date >='$fdate1' and date <='$todate1'";
		}		

	$query = $this->db->query($select_query);
    return $query->result();
}

function getSearchTailor($t_name,$f_date,$t_date) {

    $select_query = "Select * from tbl_production_log where production_status='Tailor'";
    
		if($t_name!='')
		{				
			//$sql1 = $this->db->query("select * from tbl_contact_m where first_name like '$t_name%' ");
			//$sql2 = $sql1->row();
			$select_query.=" and customer_name  = '$t_name'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query .="and date >='$fdate1' and date <='$todate1'";
		}		
			
	$query = $this->db->query($select_query);
    return $query->result();
}


function getSearchWhereQty($t_name,$f_date,$t_date) {

    $select_query = "Select * from tbl_product_stock where type='14'";
    
		if($t_name!='')
		{				
			//$sql1 = $this->db->query("select * from tbl_contact_m where first_name like '$t_name%' ");
			//$sql2 = $sql1->row();
			$select_query.=" and customer_name  = '$t_name'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query .="and date >='$fdate1' and date <='$todate1'";
		}		
			
	$query = $this->db->query($select_query);
    return $query->result();
}



function getTemplateSearch($temp_id,$p_name,$f_date,$t_date) {
	if($temp_id!='' || $p_name!='' || $f_date!='' || $t_date!=''){
    $select_query = "Select * from tbl_template_hdr where status='A'";
    
		if($temp_id!='')
		{				
			$select_query.=" and templateid  = '$temp_id'";	  
		}
	
		if($p_name!='')
		{				
		$sql1 = $this->db->query("select * from tbl_product_stock where productname like '%$p_name%' ");
			$sql2 = $sql1->row();
			$select_query.=" and product_id  = '$sql2->Product_id'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query .="and date >='$fdate1' and date <='$todate1'";
		}		
	}
		else{
	$select_query = "Select *from tbl_template_hdr ";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}

function getSearchPacking($p_id,$f_date,$t_date) {

    $select_query = "Select * from tbl_production_log where production_status='packing'";
    
		if($p_id!='')
		{
			$sql1 = $this->db->query("select * from tbl_packing where packing_id = '$p_id' ");
			$sql2 = $sql1->row();						
			$select_query.=" and  qc_id = '$sql2->qc_id' ";	  
		}

		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$select_query .="and date >='$fdate1' and date <='$todate1'";
		}		
	$query = $this->db->query($select_query);
    return $query->result();
}



function getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date,$g_total) {
	if($p_no!='' || $v_name!='' || $f_date!='' || $t_date!='' || $g_total!=''){
//	echo $g_total;die;
   $select_query = "Select * from tbl_purchase_order_hdr";
		if($p_no!='')
		{				
			$select_query.=" where purchaseorderid  = '$p_no'";	  
		}
		
		if($v_name!='')
		{				
			$select_query.=" and vendor_id  = '$v_name'";	  
		}
		
		if($g_total!='')
		{				
			$select_query.=" and grand_total  = '$g_total'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy .="and invoice_date >='$fdate1' and invoice_date <='$todate1'";
		}
    	}else{
	$select_query = "Select * from tbl_purchase_order_hdr";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}

function getSearchSaleOrder($p_no,$v_name,$f_date,$t_date,$g_total) {
	if($p_no!='' || $v_name!='' || $f_date!='' || $t_date!='' || $g_total!=''){
//	echo $g_total;die;
   $select_query = "Select * from tbl_invoice_hdr";
		if($p_no!='')
		{				
			$select_query.=" where salesid  = '$p_no'";	  
		}
		
		if($v_name!='')
		{				
			$select_query.=" and vendor_id  = '$v_name'";	  
		}
		
		if($g_total!='')
		{				
			$select_query.=" and grand_total  = '$g_total'";	  
		}
		
		if($f_date!='' && $t_date!='')
		{
		
			$tdate=explode("-",$t_date);
			
			$fdate=explode("-",$f_date);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy .="and invoice_date >='$fdate1' and invoice_date <='$todate1'";
		}
    }else{
			$select_query = "Select * from tbl_invoice_hdr";	
		}
	$query = $this->db->query($select_query);
    return $query->result();
}
}
?>