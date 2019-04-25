<?php
class model_purchaseorder extends CI_Model {
	
function purchaseorder_data(){
	  $query=$this->db->query("select * from tbl_purchase_order_hdr where status='A' Order by purchaseorderid desc ");
	  
	  
      
	  return $result=$query->result();  
}

}
