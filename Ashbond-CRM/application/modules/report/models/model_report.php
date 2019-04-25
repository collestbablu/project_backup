<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class model_report extends CI_Model {

//=======================Product Stock=============================

function getProduct($last,$strat)
{
	  $query=$this->db->query("Select * from tbl_product_stock where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}

function filterProductList($perpage,$pages,$get)
{

    $qry = "Select * from tbl_product_stock where status='A'";
					  
		if(sizeof($get) > 0)
		 {
		   if($get['p_name'] != "")
			  $qry .= " AND productname like '%".$get['p_name']."%' ";

		   if($get['category'] != "")
			 $qry .= " AND category = '".$get['category']."' ";
		 }

		$qry .=" LIMIT $pages,$perpage ";
	  $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_product($perpage,$pages,$get)
{
 	
    $qry = "Select * from tbl_product_stock where status='A'";
			  
		if(sizeof($get) > 0)
		{
		   if($get['p_name'] != "")
			  $qry .= " AND productname like '%".$get['p_name']."%' ";
		  
		   if($get['category'] != "")
			 $qry .= " AND category = '".$get['category']."' ";
		}

    $data =  $this->db->query($qry)->num_rows();
 return $data;
}

//================================Lead====================================


function getLead($last,$strat)
{
	  $query=$this->db->query("Select * from tbl_leads where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}


function filterLeadList($perpage,$pages,$get)
{

  $qry = "Select * from tbl_leads where status='A'";
				  
		if(sizeof($get) > 0)
			 {
			
			   if($get['contact_id'] != "")
				{
					//$sql1 = $this->db->query("select * from tbl_contact_m where first_name like '%".$get['c_name']."%' ");
					//$sql2 = $sql1->row();
				 
				  $qry .= " AND contact_id = '".$get['contact_id']."' ";	
				}
			   if($get['sale_person_id'] != "")
			   {
				  //$name = $this->db->query("select * from tbl_contact_m where first_name like '%".$get['sales']."%' ");
				  //$getName = $name->row();
				  
				 $qry .= " AND sales_person_id = '".$get['sale_person_id']."' ";
			   }
			 }
				 
		$qry .=" LIMIT $pages,$perpage ";
	$data =  $this->db->query($qry)->result();
 return $data;

}

function count_lead($perpage,$pages,$get)
{

   $qry = "Select * from tbl_leads where status='A'";
				  
		 if(sizeof($get) > 0)
		 {
		
		   if($get['contact_id'] != "")
			{
				//$sql1 = $this->db->query("select * from tbl_contact_m where first_name like '%".$get['c_name']."%' ");
				//$sql2 = $sql1->row();
			 
			  $qry .= " AND contact_id = '".$get['contact_id']."' ";	
			}
		   if($get['sale_person_id'] != "")
		   {
			  //$name = $this->db->query("select * from tbl_contact_m where first_name like '%".$get['sales']."%' ");
			  //$getName = $name->row();
			  
			 $qry .= " AND sales_person_id = '".$get['sale_person_id']."' ";
		   }
		 }

    $data =  $this->db->query($qry)->num_rows();
 return $data;

}

//====================Activity===========================

function getActivity($last,$strat)
{
	  $query=$this->db->query("Select * from tbl_activity where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}
function filterActivityList($perpage,$pages,$get)
{

	  $qry = "Select * from tbl_activity where status='A'";
					  
				if(sizeof($get) > 0)
					 {
					
					   if($get['l_no'] != "")
						{
						  $qry .= " AND lead_id = '".$get['l_no']."'";	
					    }
					   if($get['f_date']!="" && $get['t_date']!="")
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							
							$qry .="and nxt_action_date >='$fdate1' and nxt_action_date <='$todate1'";
						}
				     }
	    $data =  $this->db->query($qry)->result();
  	return $data;
}

function count_activity($perpage,$pages,$get)
{
 	
		  $qry = "Select * from tbl_activity where status='A'";
					  
					 if(sizeof($get) > 0)
					 {
					
					   if($get['l_no'] != "")
						{
						  $qry .= " AND lead_id = '".$get['l_no']."'";	
					    }
					   if($get['f_date']!='' && $get['t_date']!='')
						{
						
							$tdate=explode("-",$get['t_date']);
							
							$fdate=explode("-",$get['f_date']);
				
							$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
							$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
							
							$select_query .="and nxt_action_date >='$fdate1' and nxt_action_date <='$todate1'";
						}
				     }
 
    $data =  $this->db->query($qry)->num_rows();
 return $data;
}



//===================Tour===================

function getTour($last,$strat)
{
	  $query=$this->db->query("Select * from tbl_tour where status='A'  limit $strat,$last ");
	  return $result=$query->result();  
}

function filterTourList($perpage,$pages,$get)
{

  $qry = "Select * from tbl_tour where status='A'";
				  
		if(sizeof($get) > 0)
		 {
			
			   if($get['sales_person_id'] != "")
				{
				  $qry .= " AND sales_person_id = '".$get['sales_person_id']."'";	
				}
				if($get['contact_id'] != "")
				{
				  $qry .= " AND contact_id = '".$get['contact_id']."'";	
				}
			   if($get['f_date']!="" && $get['t_date']!="")
				{
				
					$tdate=explode("-",$get['t_date']);
					
					$fdate=explode("-",$get['f_date']);
		
					$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
					$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
					
					$qry .="and date >='$fdate1' and date <='$todate1'";
				}
		   }
		   
		   $qry .=" LIMIT $pages,$perpage";
	  $data =  $this->db->query($qry)->result();
  return $data;

}

function count_tour($perpage,$pages,$get)
{
 	
  $qry = "Select * from tbl_tour where status='A'";
			  
		if(sizeof($get) > 0)
		 {
			
			   if($get['sales_person_id'] != "")
				{
				  $qry .= " AND sales_person_id = '".$get['sales_person_id']."'";	
				}
				if($get['contact_id'] != "")
				{
				  $qry .= " AND contact_id = '".$get['contact_id']."'";	
				}
			   if($get['f_date']!="" && $get['t_date']!="")
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

}
?>