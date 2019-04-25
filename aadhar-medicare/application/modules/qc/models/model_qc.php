<?php
class model_qc extends CI_Model {
	
function getQc($last,$strat){

	  $query=$this->db->query("select * from tbl_tailor where status='A' Order by tailor_id desc limit $strat,$last ");
	  return $result=$query->result();  
	}

function filterQcList($perpage,$pages,$get){
 	
	
					  $qry = "select * from tbl_tailor where status = 'A'";
					  
					 if(sizeof($get) > 0){
					
					   if($get['tailor_id'] != "")
						
						  $qry .= " AND tailor_id LIKE '%".$get['tailor_id']."%'";
					    
					   if($get['f_goods'] != ""){
						  
						   $unitQuery=$this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['f_goods']."%'");
						   $getUnit=$unitQuery->row();
						   $sr_no=$getUnit->Product_id;
					 
						 $qry .= " AND finishProductId ='$sr_no'";
			  
					 }  
					 
					 if($get['qty'] != "")
					
					     $qry .= " AND qty LIKE '%".$get['qty']."%'";
					
					if($get['date'] != "")
					
					     $qry .= " AND date LIKE '%".$get['date']."%'";
					
					if($get['rjct_qty'] != "")
					
					     $qry .= " AND rejct_qty LIKE '%".$get['rjct_qty']."%'";
				 }
 
    $data =  $this->db->query($qry)->result();
  return $data;
}


}
