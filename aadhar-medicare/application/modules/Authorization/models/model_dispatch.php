<?php
class model_dispatch extends CI_Model {
	
function getdipatch($last,$strat){

	  $query=$this->db->query("select * from tbl_dispatch_hdr where status='A' Order by dispatch_id desc limit $strat,$last ");
	  return $result=$query->result();  
	}

function filterDispatchList($perpage,$pages,$get){
 	
	
					  $qry = "select * from tbl_dispatch_hdr where status = 'A'";
					  
					 if(sizeof($get) > 0){
					 
					   if($get['d_id'] != "")
						
						  $qry .= " AND dispatch_id LIKE '%".$get['d_id']."%'";
					   
					   if($get['c_name'] != ""){
						  
						   $unitQuery=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['c_name']."%'");
						   $getUnit=$unitQuery->row();
						   $sr_no=$getUnit->contact_id;
					 
						 $qry .= " AND contact_id ='$sr_no'";
			  
					 } 
					 
					 	 if($get['date'] != "")
					
					     $qry .= " AND date LIKE '%".$get['date']."%'"; 
						
				 }
 
    $data =  $this->db->query($qry)->result();
  return $data;
}

}
?>