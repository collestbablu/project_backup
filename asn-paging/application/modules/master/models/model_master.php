<?php
class model_master extends CI_Model {


//=============================================Consigner/Consignee========================
	
function contact_get($last,$strat){
  
	$query=$this->db->query("select *from tbl_contact_m where status='A' ORDER BY contact_id DESC limit $strat,$last");
    return $result=$query->result();  
}


function count_all($tableName,$status = 0,$get){
   
   $qry ="select count(*) as countval from $tableName where status='A'";
    
		   if($get['con_name'] != "")
		   	
		      $qry .= " AND first_name like '%".$get['con_name']."%' ";
			  
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
			  
		    if($get['other_contact'] != "")
		
		  	  $qry .= " AND other_contact LIKE '%".$get['other_contact']."%'";
			        

   	$query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}


function filterContactList($perpage,$pages,$get){
 	
        $qry = "select * from tbl_contact_m where status = 'A'";
        
		 if(sizeof($get) > 0)
		 {
        
		    if($get['con_name'] != "")
		   	
		      $qry .= " AND first_name like '%".$get['con_name']."%' ";
			  
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
			  
		    if($get['other_contact'] != "")
		
		  	  $qry .= " AND other_contact LIKE '%".$get['other_contact']."%'";
			  
		 }
 
  $data =  $this->db->query($qry)->result();
 return $data;
}

//=======================================Docket Delivery==================================

function get_Docket_delivery($last,$strat){
  
	$query=$this->db->query("select * from tbl_docket_entry where status='A' and booked_status='Delivered' order by id desc limit $strat,$last");
    return $result=$query->result();  
}


function count_docket($tableName,$status = 0,$get){
   
   $qry ="select count(*) as countval from $tableName where status='A' and booked_status='Delivered' ";
    
		    if($get['date'] != "")
		  	   $qry .= " AND booking_date LIKE '%".$get['date']."%'";
			
			if($get['docket_no'] != "")
		  	   $qry .= " AND docket_no = '".$get['docket_no']."'";
			  
			if($get['consignor'] != "")
			{
			   $unitQuery=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['consignor']."%'");
		       $getUnit=$unitQuery->row();
		       $sr_no=$getUnit->contact_id;
		 
			   $qry .= " AND consignor ='$sr_no'";
		    }
			
			if($get['consignee'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['consignee']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->contact_id;
		 
			   $qry .= " AND consignee ='$sr_no2'";
		    }
			
			if($get['origin'] != "")
			{
			   $unitQuery3=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['origin']."%'");
		       $getUnit3=$unitQuery3->row();
		       $sr_no3=$getUnit3->serial_number;
		 
			   $qry .= " AND origin ='$sr_no3'";
		    }
			
			if($get['destination'] != "")
			{
			   $unitQuery4=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['destination']."%'");
		       $getUnit4=$unitQuery4->row();
		       $sr_no4=$getUnit4->serial_number;
		 
			   $qry .= " AND destination ='$sr_no4'";
		    }
			
			if($get['no_of_pkg'] != "")
		  	   $qry .= " AND no_of_package = '".$get['no_of_pkg']."'";
			   
			if($get['mode_of_pay'] != "")
		  	   $qry .= " AND mode_of_payment like '%".$get['mode_of_pay']."%' ";
			   
			if($get['edd'] != "")
		  	   $qry .= " AND edd like '%".$get['edd']."%' ";
			   
			if($get['shipment_delivered_date'] != "")
		  	   $qry .= " AND shipment_delivered_on like '%".$get['shipment_delivered_date']."%' ";
			   
			if($get['shipment_delivered_time'] != "")
		  	   $qry .= " AND shipment_delivered_on_time like '%".$get['shipment_delivered_time']."%' ";
			   
			if($get['remarks'] != "")
		  	   $qry .= " AND remarkss like '%".$get['remarks']."%' ";
			    
			        

   	$query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}


function filterDocketList($perpage,$pages,$get){
 	
        $qry = "select * from tbl_docket_entry where status='A' and booked_status='Delivered' ";
        
		 if(sizeof($get) > 0)
		 {
			if($get['date'] != "")
		  	   $qry .= " AND booking_date LIKE '%".$get['date']."%'";
			
			if($get['docket_no'] != "")
		  	   $qry .= " AND docket_no = '".$get['docket_no']."'";
			  
			if($get['consignor'] != "")
			{
			   $unitQuery=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['consignor']."%'");
		       $getUnit=$unitQuery->row();
		       $sr_no=$getUnit->contact_id;
		 
			   $qry .= " AND consignor ='$sr_no'";
		    }
			
			if($get['consignee'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['consignee']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->contact_id;
		 
			   $qry .= " AND consignee ='$sr_no2'";
		    }
			
			if($get['origin'] != "")
			{
			   $unitQuery3=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['origin']."%'");
		       $getUnit3=$unitQuery3->row();
		       $sr_no3=$getUnit3->serial_number;
		 
			   $qry .= " AND origin ='$sr_no3'";
		    }
			
			if($get['destination'] != "")
			{
			   $unitQuery4=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['destination']."%'");
		       $getUnit4=$unitQuery4->row();
		       $sr_no4=$getUnit4->serial_number;
		 
			   $qry .= " AND destination ='$sr_no4'";
		    }
			
			if($get['no_of_pkg'] != "")
		  	   $qry .= " AND no_of_package = '".$get['no_of_pkg']."'";
			   
			if($get['mode_of_pay'] != "")
		  	   $qry .= " AND mode_of_payment like '%".$get['mode_of_pay']."%' ";
			   
			if($get['edd'] != "")
		  	   $qry .= " AND edd like '%".$get['edd']."%' ";
			   
			if($get['shipment_delivered_date'] != "")
		  	   $qry .= " AND shipment_delivered_on like '%".$get['shipment_delivered_date']."%' ";
			   
			if($get['shipment_delivered_time'] != "")
		  	   $qry .= " AND shipment_delivered_on_time like '%".$get['shipment_delivered_time']."%' ";
			   
			if($get['remarks'] != "")
		  	   $qry .= " AND remarkss like '%".$get['remarks']."%' ";		 	
		 }
 
  $data =  $this->db->query($qry)->result();
 return $data;
}

//===============================Docket Entry===================================


function get_Docket_Entry($last,$strat){
  
	$query=$this->db->query("select * from tbl_docket_entry where status='A' and booked_status='Booked' or booked_status='Intransit' or booked_status='OFD' order by id desc limit $strat,$last");
    return $result=$query->result();  
}


function count_docket_entry($tableName,$status = 0,$get){
   
   $qry ="select count(*) as countval from $tableName where status='A' and (booked_status='Booked' or booked_status='Intransit' or booked_status='OFD') ";
    
		    if($get['date'] != "")
		  	   $qry .= " AND booking_date LIKE '%".$get['date']."%'";
			
			if($get['docket_no'] != "")
		  	   $qry .= " AND docket_no = '".$get['docket_no']."'";
			  
			if($get['consignor'] != "")
			{
			   $unitQuery=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['consignor']."%'");
		       $getUnit=$unitQuery->row();
		       $sr_no=$getUnit->contact_id;
		 
			   $qry .= " AND consignor ='$sr_no'";
		    }
			
			if($get['consignee'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['consignee']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->contact_id;
		 
			   $qry .= " AND consignee ='$sr_no2'";
		    }
			
			if($get['origin'] != "")
			{
			   $unitQuery3=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['origin']."%'");
		       $getUnit3=$unitQuery3->row();
		       $sr_no3=$getUnit3->serial_number;
		 
			   $qry .= " AND origin ='$sr_no3'";
		    }
			
			if($get['destination'] != "")
			{
			   $unitQuery4=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['destination']."%'");
		       $getUnit4=$unitQuery4->row();
		       $sr_no4=$getUnit4->serial_number;
		 
			   $qry .= " AND destination ='$sr_no4'";
		    }
			
			if($get['no_of_pkg'] != "")
		  	   $qry .= " AND no_of_package = '".$get['no_of_pkg']."'";
			   
			if($get['mode_of_pay'] != "")
		  	   $qry .= " AND mode_of_payment like '%".$get['mode_of_pay']."%' ";
			   
			if($get['edd'] != "")
		  	   $qry .= " AND edd like '%".$get['edd']."%' ";
			   
			if($get['status'] != "")
		  	   $qry .= " AND booked_status like '%".$get['status']."%' ";
			        

   	$query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}


function filterDocketEntry($perpage,$pages,$get){
 	
        $qry = "select * from tbl_docket_entry where status='A' and (booked_status='Booked' or booked_status='Intransit' or booked_status='OFD') ";
        
		 if(sizeof($get) > 0)
		 {
		 	
			if($get['date'] != "")
		  	    $qry .= " AND booking_date = '".$get['date']."'";
			
			if($get['docket_no'] != "")
		  	   $qry .= " AND docket_no = '".$get['docket_no']."'";
			  
			if($get['consignor'] != "")
			{
			   $unitQuery=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['consignor']."%'");
		       $getUnit=$unitQuery->row();
		       $sr_no=$getUnit->contact_id;
		 
			   $qry .= " AND consignor ='$sr_no'";
		    }
			
			if($get['consignee'] != "")
			{
			   $unitQuery2=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['consignee']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->contact_id;
		 
			   $qry .= " AND consignee ='$sr_no2'";
		    }
			
			if($get['origin'] != "")
			{
			   $unitQuery3=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['origin']."%'");
		       $getUnit3=$unitQuery3->row();
		       $sr_no3=$getUnit3->serial_number;
		 
			   $qry .= " AND origin ='$sr_no3'";
		    }
			
			if($get['destination'] != "")
			{
			   $unitQuery4=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['destination']."%'");
		       $getUnit4=$unitQuery4->row();
		       $sr_no4=$getUnit4->serial_number;
		 
			   $qry .= " AND destination ='$sr_no4'";
		    }
			
			if($get['no_of_pkg'] != "")
		  	   $qry .= " AND no_of_package = '".$get['no_of_pkg']."'";
			   
			if($get['mode_of_pay'] != "")
		  	   $qry .= " AND mode_of_payment like '%".$get['mode_of_pay']."%' ";
			   
			if($get['edd'] != "")
		  	   $qry .= " AND edd like '%".$get['edd']."%' ";
			   
			if($get['status'] != "")
		  	   $qry .= " AND booked_status like '%".$get['status']."%' ";
		 }
 
  $data =  $this->db->query($qry)->result();
 return $data;
}

}
?>