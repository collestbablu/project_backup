<?php
class model_packing extends CI_Model {
	
function getPacking($last,$strat){

	  $query=$this->db->query("select * from tbl_qualitiy_check where status='A' Order by qc_id desc limit $strat,$last ");
	  return $result=$query->result();  

}

function filterPackingList($perpage,$pages,$get){
 	
	
					  $qry = "select * from tbl_qualitiy_check where status = 'A'";
					  
					 if(sizeof($get) > 0){
					 
					   if($get['f_goods'] != ""){
						  
						   $unitQuery=$this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['f_goods']."%'");
						   $getUnit=$unitQuery->row();
						   $sr_no=$getUnit->Product_id;
					 
						 $qry .= " AND finishProductId ='$sr_no'";
			  
					 } 
					 
					 	 if($get['date'] != "")
					
					     $qry .= " AND date LIKE '%".$get['date']."%'"; 
						 
						 if($get['qty'] != "")
						
						  $qry .= " AND qty LIKE '%".$get['qty']."%'";
						  
						  if($get['rej_qty'] != "")
						
						  $qry .= " AND reject_qty LIKE '%".$get['rej_qty']."%'";
				 }
 
    $data =  $this->db->query($qry)->result();
  return $data;
}

}
