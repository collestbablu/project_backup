<?php
class model_admin_master extends CI_Model {
	

function master_data_get($last,$strat){
	
	$query=("select *from tbl_master_data where status='A' Order by serial_number DESC limit $strat,$last ");
	
	$getQuery = $this->db->query($query);
   
    return $result=$getQuery->result();
  
}
function FilterMasterData($perpage,$pages,$get){
 	
          $qry = "select * from tbl_master_data where status = 'A'";
    
	     if(sizeof($get) > 0)
		 {
        
		   if($get['name'] != "")
		   	
		      $qry .= " AND keyvalue like '%".$get['name']."%' ";
		   
		   if($get['desc'] != "")
		   	
		      $qry .= " AND description LIKE '%".$get['desc']."%'";
           
		   if($get['value'] != "")
		   {
			   $unitQuery2=$this->db->query("select * from tbl_master_data_mst where keyname LIKE '%".$get['value']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->param_id;
		 
			   $qry .= " AND param_id ='$sr_no2'";
		   }
	    }
 
    $data =  $this->db->query($qry)->result();
  return $data;
}

function count_all($tableName,$status = 0,$get){
   
   $qry ="select count(*) as countval from $tableName where status='A'";
    
        
		   if($get['name'] != "")
		   	
		      $qry .= " AND keyvalue like '%".$get['name']."%' ";
		   
		   if($get['desc'] != "")
		   	
		      $qry .= " AND description LIKE '%".$get['desc']."%'";
           
		   if($get['value'] != "")
		   {
			   $unitQuery2=$this->db->query("select * from tbl_master_data_mst where keyname LIKE '%".$get['value']."%'");
		       $getUnit2=$unitQuery2->row();
		       $sr_no2=$getUnit2->param_id;
		 
			   $qry .= " AND param_id ='$sr_no2'";
		   }
	    

   $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}





}
?>