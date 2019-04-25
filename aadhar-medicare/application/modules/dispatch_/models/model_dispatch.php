<?php
class model_dispatch extends CI_Model {
	
function getdipatch(){
	  $query=$this->db->query("select * from tbl_dispatch_hdr where status='A' Order by dispatch_id desc ");
	  
	  
      
	  return $result=$query->result();  
}

}
