<?php
class model_template extends CI_Model {


function getTemplate($last,$strat){
	  $query=$this->db->query("select * from tbl_template_hdr where status='A' Order by templateid desc limit $strat,$last ");
	  return $result=$query->result();  
}


function filterTemplateList($perpage,$pages,$get){
 	
	
					  $qry = "select * from tbl_template_hdr where status = 'A'";
					  
					 if(sizeof($get) > 0){
					
					   if($get['temp_id'] != "")
						
						  $qry .= " AND templateid LIKE '%".$get['temp_id']."%'";
					  
					   if($get['date'] != "")
					
					     $qry .= " AND date LIKE '%".$get['date']."%'";
						  
					   if($get['goods'] != ""){
						  
						   $unitQuery=$this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['goods']."%'");
						   $getUnit=$unitQuery->row();
						   $sr_no=$getUnit->Product_id;
					 
						 $qry .= " AND product_id ='$sr_no'";
			  
					 }  
				 }
 
    $data =  $this->db->query($qry)->result();
  return $data;
}

}
