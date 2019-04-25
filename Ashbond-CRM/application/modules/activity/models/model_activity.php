<?php
class model_activity extends CI_Model {
	
function activity_data(){
	
	  $this->db->select("*");
      $this->db->from('tbl_activity');  
      $query = $this->db->get();
      
	  return $result=$query->result();  
}

function getActivityData($last,$strat)
{
	if($this->session->userdata('user_id')=='1')
	{
		$query=("select * from tbl_activity where status='A' Order by activity_id DESC limit $strat,$last ");
	}
	else
	{
		$query=("select * from tbl_activity where comp_id='".$this->session->userdata('comp_id')."' Order by activity_id DESC limit $strat,$last ");
	}
	$getQuery = $this->db->query($query);
   
    return $result=$getQuery->result();
  
}
function filterActivityData($perpage,$pages,$get)
{
 	if($this->session->userdata('user_id')=='1')
	{
      $qry = "select * from tbl_activity where status='A' ";
    }
	else
	{
	  $qry = "select * from tbl_activity where comp_id='".$this->session->userdata('comp_id')."' ";
	}
	   if(sizeof($get) > 0)
	   {
        
		   // if($get['activity_id'] != "")
		     // $qry .= " AND activity_id = '".$get['activity_id']."'";
		   
		    if($get['user'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_user_mst where user_name LIKE '%".$get['user']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->comp_id;
		 
			   $qry .= " AND comp_id ='$sr_no2'";
		    }
		   
		   if($get['date'] != "")
		   	  $qry .= " AND maker_date = '".$get['date']."'";
			
		   
		   if($get['lead_id'] != "")
		   	  $qry .= " AND lead_id = '".$get['lead_id']."'";
	 		  
	   	   if($get['next_action'] != "")
	 	    {
		   	  $source=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['next_action']."%' ");
			  $getSource=$source->row();
				
		   	  $qry .= " AND nxt_action = '$getSource->serial_number'";
		    }  
		  
		   if($get['next_action_date'] != "")
		  	  $qry .= " AND nxt_action_date = '".$get['next_action_date']."'";
			  
		   if($get['communication'] != "")
		  	  $qry .= " AND communication like '%".$get['communication']."%'";
			  
		   if($get['plan_nxt_activity'] != "")
		  	  $qry .= " AND plan_nxt_activity like '%".$get['plan_nxt_activity']."%'";
		   
		   //if($get['remarks'] != "")
		  	 // $qry .= " AND remarks like '%".$get['remarks']."%'";
		   
			  
	 }
 
    $data =  $this->db->query($qry)->result();
  return $data;
}

function count_activity($tableName,$status = 0,$get)
{
  if($this->session->userdata('user_id')=='1')   
   {
    	$qry ="select count(*) as countval from $tableName where status='A' ";
   } 
   else
   {
   		$qry ="select count(*) as countval from $tableName where comp_id='".$this->session->userdata('comp_id')."' ";
   }
      if(sizeof($get) > 0)
	   {
        
		   // if($get['activity_id'] != "")
		     // $qry .= " AND activity_id = '".$get['activity_id']."'";
		   
		    if($get['user'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_user_mst where user_name LIKE '%".$get['user']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->comp_id;
		 
			   $qry .= " AND comp_id ='$sr_no2'";
		    }
		   
		   if($get['date'] != "")
		   	  $qry .= " AND maker_date = '".$get['date']."'";
			
		   
		   if($get['lead_id'] != "")
		   	  $qry .= " AND lead_id = '".$get['lead_id']."'";
	 		  
	   	   if($get['next_action'] != "")
	 	    {
		   	  $source=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['next_action']."%' ");
			  $getSource=$source->row();
				
		   	  $qry .= " AND nxt_action = '$getSource->serial_number'";
		    }  
		  
		   if($get['next_action_date'] != "")
		  	  $qry .= " AND nxt_action_date = '".$get['next_action_date']."'";
			  
		   if($get['communication'] != "")
		  	  $qry .= " AND communication like '%".$get['communication']."%'";
			  
		   if($get['plan_nxt_activity'] != "")
		  	  $qry .= " AND plan_nxt_activity like '%".$get['plan_nxt_activity']."%'";
		   
		   //if($get['remarks'] != "")
		  	 // $qry .= " AND remarks like '%".$get['remarks']."%'";
		   
			  
	 }

   $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}


}
?>