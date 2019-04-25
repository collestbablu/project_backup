<?php
class model_qc extends CI_Model {
	
function getQc(){
	  $query=$this->db->query("select * from tbl_tailor where status='A' Order by tailor_id desc ");
	  
	  
      
	  return $result=$query->result();  
}

}
