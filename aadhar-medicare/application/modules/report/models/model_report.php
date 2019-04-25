<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class model_report extends CI_Model {

//==================================

function getProduct($last,$strat){
	  $query=$this->db->query("Select * from tbl_product_stock where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterProductList($perpage,$pages,$get){

					  $qry = "Select * from tbl_product_stock where status='A'";
					  
					 if(sizeof($get) > 0){
					
					   if($get['p_id'] != "")
						
						  $qry .= " AND Product_id = '".$get['p_id']."'";
					  
					   if($get['p_name'] != "")
					
					     $qry .= " AND type LIKE '%".$get['p_name']."%'";
					
				 }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_product($perpage,$pages,$get){
 	
					  $qry = "Select * from tbl_product_stock where status='A'";
					  
					 if(sizeof($get) > 0){
					
					   if($get['p_id'] != "")
						
						  $qry .= " AND Product_id = '".$get['p_id']."'";
					  
					   if($get['p_name'] != "")
					
					     $qry .= " AND type LIKE '%".$get['p_name']."%'";
					   
				 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}

//==========================================

function getItem($last,$strat){
	  $query=$this->db->query("Select * from tbl_product_stock where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterItemList($perpage,$pages,$get){

					  $qry = "Select * from tbl_product_stock where status='A'";
					  
					  if(sizeof($get) > 0){
					
					   if($get['ptype'] != "")
						
						  $qry .= " AND type LIKE '%".$get['ptype']."%'";
					  
					   if($get['p_name'] != "")
					
					     $qry .= " AND productname LIKE '%".$get['p_name']."%'";
		
				 }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_item($perpage,$pages,$get){
 	
					 $qry = "Select * from tbl_product_stock where status='A'";
					  
					  if(sizeof($get) > 0){
					
					   if($get['ptype'] != "")
						
						  $qry .= " AND type LIKE '%".$get['ptype']."%'";
					  
					   if($get['p_name'] != "")
					
					     $qry .= " AND productname LIKE '%".$get['p_name']."%'";
					   
				 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}

//======================


function getCutting($last,$strat){
	  $query=$this->db->query("Select * from tbl_production_hdr where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterCuttingList($perpage,$pages,$get){

					  $qry = "Select * from tbl_production_hdr where status='A'";
					  
					  if(sizeof($get) > 0){
					
					   if($get['p_id'] != "")
						
						  $qry .= " AND productionid = '".$get['p_id']."'";
					  
					    if($get['p_name'] != "")
						{
						  
						   $unitQuery=$this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['p_name']."%'");
						   $getUnit=$unitQuery->row();
						   $sr_no=$getUnit->Product_id;
					 
						  $qry .= " AND product_id ='$sr_no'";
			  
					   }  
					 
					  if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
				 }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_cutting($perpage,$pages,$get){
 	
					 $qry = "Select * from tbl_production_hdr where status='A'";
					  
					if(sizeof($get) > 0){
					
					   if($get['p_id'] != "")
						
						  $qry .= " AND productionid = '".$get['p_id']."'";
					  
					    if($get['p_name'] != "")
						{
						  
						   $unitQuery=$this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['p_name']."%'");
						   $getUnit=$unitQuery->row();
						   $sr_no=$getUnit->Product_id;
					 
						  $qry .= " AND product_id ='$sr_no'";
			  
					   }  
					 
					  if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
				 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}


//==================================


function getQc($last,$strat){
	  $query=$this->db->query("Select * from tbl_qualitiy_check where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterQCList($perpage,$pages,$get){

					  $qry = "Select * from tbl_qualitiy_check where status='A'";
					  
					  if(sizeof($get) > 0){
					
					   if($get['qc_id'] != "")
						
						  $qry .= " AND qc_id = '".$get['qc_id']."'";
					  
					    if($get['t_name'] != "")
						{
					 
						  $qry .= " AND customer_name = '".$get['t_name']."'";
			  
					   }  
					 
					  if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
				 }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_qc($perpage,$pages,$get){
 	
					 $qry = "Select * from tbl_qualitiy_check where status='A'";
					  
					if(sizeof($get) > 0){
					
					   if($get['qc_id'] != "")
						
						  $qry .= " AND qc_id = '".$get['qc_id']."'";
					  
					    if($get['t_name'] != "")
						{
					 
						  $qry .= " AND customer_name = '".$get['t_name']."'";
			  
					   }  
					 
					  if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
				 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}


//=============================================

function getTailor($last,$strat){
	  $query=$this->db->query("Select * from tbl_production_log where production_status='Tailor'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterTailorList($perpage,$pages,$get){

					  $qry = "Select * from tbl_production_log where production_status='Tailor'";
					  
					  if(sizeof($get) > 0){
					
					   if($get['t_name'] != "")
						
						  $qry .= " AND customer_name = '".$get['t_name']."'";
					  
					   if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}		
				 }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_tailor($perpage,$pages,$get){
 	
					 $qry = "Select * from tbl_production_log where production_status='Tailor'";
					  
					  if(sizeof($get) > 0){
					
					   if($get['t_name'] != "")
						
						  $qry .= " AND customer_name = '".$get['t_name']."'";
					  
					   if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
					   
				 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}


//=========================

function getStock($last,$strat){
	  $query=$this->db->query("Select * from tbl_product_stock where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterStockList($perpage,$pages,$get){

					  $qry = "Select * from tbl_product_stock where status='A'";
					  
					  if(sizeof($get) > 0){
					
					   if($get['ptype'] != "")
						
						  $qry .= " AND type LIKE '%".$get['ptype']."%'";
					  
					   if($get['pname'] != "")
					
					     $qry .= " AND productname LIKE '%".$get['pname']."%'";
		
				 }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_Stock($perpage,$pages,$get){
 	
					 $qry = "Select * from tbl_product_stock where status='A'";
					  
					  if(sizeof($get) > 0){
					
					   if($get['ptype'] != "")
						
						  $qry .= " AND type LIKE '%".$get['ptype']."%'";
					  
					   if($get['pname'] != "")
					
					     $qry .= " AND productname LIKE '%".$get['pname']."%'";
					   
				 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}


//==========================


function getTemplate($last,$strat){
	  $query=$this->db->query("Select * from tbl_template_hdr where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterTemplateList($perpage,$pages,$get){

			    $qry = "Select * from tbl_template_hdr where status='A'";
					  
				if(sizeof($get) > 0){
					
					   if($get['temp_id'] != "")
						
						  $qry .= " AND templateid = '".$get['temp_id']."'";
					  
					    if($get['p_name'] != "")
						{
						  
						   $unitQuery=$this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['p_name']."%'");
						   $getUnit=$unitQuery->row();
						   $sr_no=$getUnit->Product_id;
					 
						  $qry .= " AND product_id ='$sr_no'";
			  
					   }  
					 
					  if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
				 }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_template($perpage,$pages,$get){
 	
			    $qry = "Select * from tbl_template_hdr where status='A'";
					  
				if(sizeof($get) > 0){
					
					   if($get['temp_id'] != "")
						
						  $qry .= " AND templateid = '".$get['temp_id']."'";
					  
					    if($get['p_name'] != "")
						{
						  
						   $unitQuery=$this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['p_name']."%'");
						   $getUnit=$unitQuery->row();
						   $sr_no=$getUnit->Product_id;
					 
						  $qry .= " AND product_id ='$sr_no'";
			  
					   }  
					 
					  if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
				 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}

//=======================End Template=============


function getPacking($last,$strat){
	  $query=$this->db->query("Select * from tbl_packing where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterPackingList($perpage,$pages,$get){

			    $qry = "Select * from tbl_packing where status='A'";
					  
				if(sizeof($get) > 0)
				 {
					    if($get['p_id'] != "")
						{
						
						  $qry .= " AND packing_id = '".$get['p_id']."'";
			  
					   }  
					 
					  if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
				 }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_packing($perpage,$pages,$get){
 	
			    $qry = "Select * from tbl_packing where status='A'";
					  
				if(sizeof($get) > 0)
				{
					    if($get['p_id'] != "")
						{
						
						  $qry .= " AND packing_id = '".$get['p_id']."'" ;
			  
					   }  
					 
					  if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							$qry .="and date >='$fdate1' and date <='$todate1'";
						}
				 }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}


//==========================================================


}
?>