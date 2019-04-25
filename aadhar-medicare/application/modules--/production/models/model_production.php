<?php
class model_production extends CI_Model {
	
function getProduction(){
	  $query=$this->db->query("select * from tbl_production_hdr where status='A' Order by productionid desc ");
	  
	  
      
	  return $result=$query->result();  
}

}
