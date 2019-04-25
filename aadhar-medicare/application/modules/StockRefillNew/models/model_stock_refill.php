<?php
class model_stock_refill extends CI_Model {


function getRefill($last,$strat){
	  $query=$this->db->query("select * from tbl_refill_hdr where status='A' Order by rflhdrid desc limit $strat,$last ");
	  return $result=$query->result();  
}


function filterStockRefillList($perpage,$pages,$get){
 	
	
					  $qry = "select * from tbl_refill_hdr where status='A'";
					  
					 if(sizeof($get) > 0){
					
					   if($get['refill_id'] != "")
						
						  $qry .= " AND rflhdrid LIKE '%".$get['refill_id']."%'";
					  
					   if($get['date'] != "")
					
					     $qry .= " AND date LIKE '%".$get['date']."%'";
						  
					   if($get['remarks'] != "")  
					   
					     $qry .= " and remarks like '%".$get['remarks']."%'";
				 }
 
    $data =  $this->db->query($qry)->result();
  return $data;
}

}
