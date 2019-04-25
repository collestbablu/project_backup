<?php
class model_crm extends CI_Model {
	
function lead_data(){
	
	  $this->db->select("*");
	  $this->db->order_by("lead_id","desc");
      $this->db->from('tbl_leads');  
      $query = $this->db->get();
      
	  return $result=$query->result();  
}

function getLeadData($last,$strat)
{
	if($this->session->userdata('user_id')=='1')
	{
		$query=("select * from tbl_leads where status='A' Order by lead_id DESC limit $strat,$last ");
	}
	else
	{
		$query=("select * from tbl_leads where sales_person_id='".$this->session->userdata('user_id')."' Order by lead_id DESC limit $strat,$last ");
	}
	$getQuery = $this->db->query($query);
   
    return $result=$getQuery->result();
  
}
function filterLeadData($perpage,$pages,$get)
{
 	
	if($this->session->userdata('user_id')=='1')
	{
      $qry = "select * from tbl_leads where status='A' ";
    }
	else
	{
	  $qry = "select * from tbl_leads where sales_person_id='".$this->session->userdata('user_id')."' ";
	}
	   if(sizeof($get) > 0)
	   {
        
		   if($get['lead_number'] != "")
		      $qry .= " AND lead_number = '".$get['lead_number']."'";
		  
		   if($get['tour_id'] != "")
		      $qry .= " AND tour_id = '".$get['tour_id']."'";
			   
		   if($get['user'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_user_mst where user_name LIKE '%".$get['user']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->comp_id;
		 
			   $qry .= " AND comp_id ='$sr_no2'";
		    }
		   
		   
		   if($get['customer'] != "")
		   {
			  $unitQuery=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['customer']."%'");
		      $getUnit=$unitQuery->row();
		      $sr_no=$getUnit->contact_id;
		 
			  $qry .= " AND contact_id ='$sr_no'";
           }
	  		
		   if($get['sales_person'] != "")
		    {
			  $unitQuery22=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['sales_person']."%'");
		      $getUnit22=$unitQuery22->row();
		      $sr_no22=$getUnit22->contact_id;
		 
			  $qry .= " AND sales_person_id ='$sr_no22'";
            }
		   
		   if($get['contact_person'] != "")
		   	  $qry .= " AND contact_person LIKE '%".$get['contact_person']."%' ";
		   
		   if($get['subject'] != "")
		   	  $qry .= " AND subject = '".$get['subject']."'";
			  
		   if($get['priority'] != "")
		   {
		   	  $priority=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['priority']."%' ");
			  $getPriority=$priority->row();
				
		   	  $qry .= " AND priority = '$getPriority->serial_number'";
		   }  
		   
		   if($get['closure_date'] != "")
		   	  $qry .= " AND exptd_closer_date = '".$get['closure_date']."'";
			  
		   if($get['source'] != "")
		    {
		   	  $source=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['source']."%' ");
			  $getSource=$source->row();
				
		   	  $qry .= " AND source = '$getSource->serial_number'";
		    }  
		  
		   if($get['stage'] != "")
		    {
		   	  $stage=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['stage']."%' ");
			  $getStage=$stage->row();
				
		   	  $qry .= " AND lead_status = '$getStage->serial_number'";
		    }  
  
	   }
 
    $data =  $this->db->query($qry)->result();
  return $data;
}

function count_leads($tableName,$status = 0,$get)
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
        
		   if($get['lead_number'] != "")
		      $qry .= " AND lead_number = '".$get['lead_number']."'";
		  
		   if($get['tour_id'] != "")
		      $qry .= " AND tour_id = '".$get['tour_id']."'";
			   
		   if($get['user'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_user_mst where user_name LIKE '%".$get['user']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->comp_id;
		 
			   $qry .= " AND comp_id ='$sr_no2'";
		    }
		   
		   
		   if($get['customer'] != "")
		   {
			  $unitQuery=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['customer']."%'");
		      $getUnit=$unitQuery->row();
		      $sr_no=$getUnit->contact_id;
		 
			  $qry .= " AND contact_id ='$sr_no'";
           }
	  		
		   if($get['sales_person'] != "")
		    {
			  $unitQuery22=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['sales_person']."%'");
		      $getUnit22=$unitQuery22->row();
		      $sr_no22=$getUnit22->contact_id;
		 
			  $qry .= " AND sales_person_id ='$sr_no22'";
            }
		   
		   if($get['contact_person'] != "")
		   	  $qry .= " AND contact_person LIKE '%".$get['contact_person']."%' ";
		   
		   if($get['subject'] != "")
		   	  $qry .= " AND subject = '".$get['subject']."'";
			  
		   if($get['priority'] != "")
		   {
		   	  $priority=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['priority']."%' ");
			  $getPriority=$priority->row();
				
		   	  $qry .= " AND priority = '$getPriority->serial_number'";
		   }  
		   
		   if($get['closure_date'] != "")
		   	  $qry .= " AND exptd_closer_date = '".$get['closure_date']."'";
			  
		   if($get['source'] != "")
		    {
		   	  $source=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['source']."%' ");
			  $getSource=$source->row();
				
		   	  $qry .= " AND source = '$getSource->serial_number'";
		    }  
		  
		   if($get['stage'] != "")
		    {
		   	  $stage=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['stage']."%' ");
			  $getStage=$stage->row();
				
		   	  $qry .= " AND lead_status = '$getStage->serial_number'";
		    }  
  
	   }

   $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}



}
?>