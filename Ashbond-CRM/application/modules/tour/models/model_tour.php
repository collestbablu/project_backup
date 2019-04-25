<?php
class model_tour extends CI_Model {


function product_get(){
	
	  
	  $query=$this->db->query("select * from tbl_tour where status='A'");
      
	  return $result=$query->result();  
}

function getTourData($last,$strat)
{
	
	if($this->session->userdata('user_id')=='1')
	{
		$query=("select * from tbl_tour where status='A' Order by tour_id DESC limit $strat,$last ");
	}
	else
	{
		$query=("select * from tbl_tour where sales_person_id='".$this->session->userdata('user_id')."' Order by tour_id DESC limit $strat,$last ");
	}
	
	$getQuery = $this->db->query($query);
   
    return $result=$getQuery->result();
  
}
function filterTourData($perpage,$pages,$get)
{
 	if($this->session->userdata('user_id')=='1')
	{
      $qry = "select * from tbl_tour where status='A' ";
    }
	else
	{
	   $qry = "select * from tbl_tour where sales_person_id='".$this->session->userdata('user_id')."' ";
	}
	   if(sizeof($get) > 0)
	   {
        
		    if($get['tour_id'] != "")
		      $qry .= " AND tour_id = '".$get['tour_id']."'";
		   
		    if($get['user'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_user_mst where user_name LIKE '%".$get['user']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->comp_id;
		 
			   $qry .= " AND comp_id ='$sr_no2'";
		    }
		   
		    if($get['date'] != "")
		  	  $qry .= " AND date like '%".$get['date']."%'";
			  
		    if($get['contact_id'] != "")
		     {
			  	$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4' and first_name like '".$get['contact_id']."' ");
		 	  	$res1 = $sqlgroup->row();
		   	  	$qry .= " AND contact_id = '$res1->contact_id' ";
			 }
		   
	   	    if($get['sales_person'] != "")
	 	     {
		   	  	$sales=$this->db->query("select * from tbl_contact_m where group_name='3' and first_name LIKE '%".$get['sales_person']."%' ");
			  	$getSales=$sales->row();
	  	   	   $qry .= " AND sales_person_id = '$getSales->contact_id'";
		     }  
		  
		    if($get['priority'] != "")
		     {
			  	 $priority=$this->db->query("select * from tbl_master_data where keyvalue like '%".$get['priority']."%' ");
   	           	$getPriority = $priority->row();
		  	   	$qry .= " AND priority = '$getPriority->serial_number' ";
			 }
			
		   	if($get['source'] != "")
		     {
			   	$source=$this->db->query("select * from tbl_master_data where keyvalue like '%".$get['source']."%' ");
   	           	$getSource = $source->row();
		  	   	$qry .= " AND source = '$getSource->serial_number' ";
			 }
			
		    if($get['lead_status'] != "")
		     {
			 	  $status=$this->db->query("select * from tbl_master_data where keyvalue like '%".$get['lead_status']."%' ");
   	           	  $getStatus = $status->row();
		  	   	 $qry .= " AND lead_status = '$getStatus->serial_number' ";
			 }

		    if($get['state'] != "")
	 	     {
		   	  	$city=$this->db->query("select * from tbl_state_m where stateName LIKE '%".$get['state']."%' ");
			  	$getCity=$city->row();
		   	  	$qry .= " AND state = '$getCity->stateid'";
		     }  
			  
	     }
 		
		$qry .=" LIMIT $pages,$perpage ";
    $data =  $this->db->query($qry)->result();
  return $data;
}

function count_tour($tableName,$status = 0,$get)
{
	
	if($this->session->userdata('user_id')=='1')
	{
		$qry ="select count(*) as countval from $tableName where status='A' ";
	}
	else
	{   
   		$qry ="select count(*) as countval from $tableName where sales_person_id='".$this->session->userdata('user_id')."' ";
    }
      
	 if(sizeof($get) > 0)
	   {
        
		    if($get['tour_id'] != "")
		      $qry .= " AND tour_id = '".$get['tour_id']."'";
		   
		    if($get['user'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_user_mst where user_name LIKE '%".$get['user']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->comp_id;
		 
			   $qry .= " AND comp_id ='$sr_no2'";
		    }
		   
		    if($get['date'] != "")
		  	  $qry .= " AND date like '%".$get['date']."%'";
			  
		    if($get['contact_id'] != "")
		     {
			  	$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4' and first_name like '".$get['contact_id']."' ");
		 	  	$res1 = $sqlgroup->row();
		   	  	$qry .= " AND contact_id = '$res1->contact_id' ";
			 }
		   
	   	    if($get['sales_person'] != "")
	 	     {
		   	  	$sales=$this->db->query("select * from tbl_contact_m where group_name='3' and first_name LIKE '%".$get['sales_person']."%' ");
			  	$getSales=$sales->row();
	  	   	   $qry .= " AND sales_person_id = '$getSales->contact_id'";
		     }  
		  
		    if($get['priority'] != "")
		     {
			  	 $priority=$this->db->query("select * from tbl_master_data where keyvalue like '%".$get['priority']."%' ");
   	           	$getPriority = $priority->row();
		  	   	$qry .= " AND priority = '$getPriority->serial_number' ";
			 }
			
		   	if($get['source'] != "")
		     {
			   	$source=$this->db->query("select * from tbl_master_data where keyvalue like '%".$get['source']."%' ");
   	           	$getSource = $source->row();
		  	   	$qry .= " AND source = '$getSource->serial_number' ";
			 }
			
		    if($get['lead_status'] != "")
		     {
			 	  $status=$this->db->query("select * from tbl_master_data where keyvalue like '%".$get['lead_status']."%' ");
   	           	  $getStatus = $status->row();
		  	   	 $qry .= " AND lead_status = '$getStatus->serial_number' ";
			 }

		    if($get['state'] != "")
	 	     {
		   	  	$city=$this->db->query("select * from tbl_state_m where stateName LIKE '%".$get['state']."%' ");
			  	$getCity=$city->row();
		   	  	$qry .= " AND state = '$getCity->stateid'";
		     }  
			  
	     }

   $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}

	
}
?>