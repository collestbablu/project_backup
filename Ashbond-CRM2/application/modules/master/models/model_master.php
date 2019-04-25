<?php
class model_master extends CI_Model {

function productCatg_data(){
	
	  $this->db->select("*");
	  // $this->db->order_by("prodcatg_id","desc");
      $this->db->from('tbl_prodcatg_mst');  
      $query = $this->db->get();
      
	  return $result=$query->result();  
}	

//==================================Product Master==============================

function product_get($last,$strat)
{
	
	$query=("select *from tbl_product_stock where status='A' Order by Product_id DESC limit $strat,$last ");
	$getQuery = $this->db->query($query);
    return $result=$getQuery->result();
  
}

function filterProductList($perpage,$pages,$get)
{
 	
	  $qry = "select * from tbl_product_stock where status = 'A'";
    
	     if(sizeof($get) > 0)
		 {
        
			   if($get['sku_no'] != "")				
				  $qry .= " AND sku_no LIKE '%".$get['sku_no']."%'";
				  
			   if($get['hsn_code'] != "")				
				  $qry .= " AND hsn_code LIKE '%".$get['hsn_code']."%'";
				
			   if($get['productname'] != "")				
				  $qry .= " AND productname LIKE '%".$get['productname']."%'";
				
			   if($get['description'] != "")				
				  $qry .= " AND description LIKE '%".$get['description']."%'";
			   
			   if($get['category'] != "")
			   {
				   $unitQuery2=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_name LIKE '%".$get['category']."%'");
				   $getUnit2=$unitQuery2->row();
				   $sr_no2=$getUnit2->prodcatg_id;
			 
				  $qry .= " AND category ='$sr_no2'";
				  
			   }
			   
			   if($get['usageunit'] != "")
			   {
				   $unitQuery=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['usageunit']."%'");
				   $getUnit=$unitQuery->row();
				   $sr_no=$getUnit->serial_number;
			 
				  $qry .= " AND usageunit ='$sr_no'";
				  
			   }
								
			  if($get['unitprice_purchase'] != "")
				  $qry .= " AND unitprice_purchase = '".$get['unitprice_purchase']."'";
				  
			  if($get['gst_tax'] != "")
				  $qry .= " AND gst_tax = '".$get['gst_tax']."'";
				
			  if($get['unitprice_sale'] != "")
				  $qry .= " AND unitprice_sale = '".$get['unitprice_sale']."'";
				  
	    }
 
  $data =  $this->db->query($qry)->result();
 return $data;
}

function count_product($tableName,$status = 0,$get){
   $qry ="select count(*) as countval from $tableName where status='A'";
    
		if(sizeof($get) > 0)
		 {
        
			   if($get['sku_no'] != "")				
				  $qry .= " AND sku_no LIKE '%".$get['sku_no']."%'";
				  
			   if($get['hsn_code'] != "")				
				  $qry .= " AND hsn_code LIKE '%".$get['hsn_code']."%'";
				
			   if($get['productname'] != "")				
				  $qry .= " AND productname LIKE '%".$get['productname']."%'";
				
			   if($get['description'] != "")				
				  $qry .= " AND description LIKE '%".$get['description']."%'";
			   
			   if($get['category'] != "")
			   {
				   $unitQuery2=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_name LIKE '%".$get['category']."%'");
				   $getUnit2=$unitQuery2->row();
				   $sr_no2=$getUnit2->prodcatg_id;
			 
				  $qry .= " AND category ='$sr_no2'";
				  
			   }
			   
			   if($get['usageunit'] != "")
			   {
				   $unitQuery=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['usageunit']."%'");
				   $getUnit=$unitQuery->row();
				   $sr_no=$getUnit->serial_number;
			 
				  $qry .= " AND usageunit ='$sr_no'";
				  
			   }
								
			  if($get['unitprice_purchase'] != "")
				  $qry .= " AND unitprice_purchase = '".$get['unitprice_purchase']."'";
				  
			  if($get['gst_tax'] != "")
				  $qry .= " AND gst_tax = '".$get['gst_tax']."'";
				
			  if($get['unitprice_sale'] != "")
				  $qry .= " AND unitprice_sale = '".$get['unitprice_sale']."'";
				  
	    }
		 
   $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}



//=============================Contact Master===============================

function contact_get($last,$strat)
{
	$query=$this->db->query("select *from tbl_contact_m where status='A' ORDER BY contact_id DESC limit $strat,$last");
    return $result=$query->result();  
}

function filterContactList($perpage,$pages,$get)
{
      $qry = "select * from tbl_contact_m where status = 'A'";
	  
         if(sizeof($get) > 0)
		 {
        
		   if($get['company_name'] != "")	   	
		      $qry .= " AND first_name LIKE '%".$get['company_name']."%'";
			
		   if($get['primary_contact'] != "")	   	
		      $qry .= " AND contact_person LIKE '%".$get['primary_contact']."%'";
           
		   if($get['group_name'] != "")
		   {
			   $unitQuery=$this->db->query("select * from tbl_account_mst where account_name LIKE '%".$get['group_name']."%'");
		       $getUnit=$unitQuery->row();
		       $sr_no=$getUnit->account_id;
		 
			  $qry .= " AND group_name ='$sr_no'";
		   }
		   
		   if($get['email_id'] != "")		   	
		      $qry .= " AND email LIKE '%".$get['email_id']."%'";
			  
		  
		  if($get['mobile_no'] != "")		
       		  $qry .= " AND mobile LIKE '%".$get['mobile_no']."%'";
			  
        }
 
  $data =  $this->db->query($qry)->result();
 return $data;
}

function count_contact($tableName,$status = 0,$get){
   $qry ="select count(*) as countval from $tableName where status='A'";
    
		if(sizeof($get) > 0)
		 {
        
		   if($get['company_name'] != "")	   	
		      $qry .= " AND first_name LIKE '%".$get['company_name']."%'";
			
		   if($get['primary_contact'] != "")	   	
		      $qry .= " AND contact_person LIKE '%".$get['primary_contact']."%'";
           
		   if($get['group_name'] != "")
		   {
			   $unitQuery=$this->db->query("select * from tbl_account_mst where account_name LIKE '%".$get['group_name']."%'");
		       $getUnit=$unitQuery->row();
		       $sr_no=$getUnit->account_id;
		 
			  $qry .= " AND group_name ='$sr_no'";
		   }
		   
		   if($get['email_id'] != "")		   	
		      $qry .= " AND email LIKE '%".$get['email_id']."%'";
			  
		  
		  if($get['mobile_no'] != "")		
       		  $qry .= " AND mobile LIKE '%".$get['mobile_no']."%'";
			  
        }
		 
   $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}


	
}
?>