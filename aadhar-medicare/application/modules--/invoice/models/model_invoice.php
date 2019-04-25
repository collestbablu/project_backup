<?php
class model_invoice extends CI_Model {
	
function invoice_data(){
	  $query=$this->db->query("select * from tbl_invoice_hdr");
	  
	  
      
	  return $result=$query->result();  
}

}
