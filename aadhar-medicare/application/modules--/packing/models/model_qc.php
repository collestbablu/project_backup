<?php
class model_qc extends CI_Model {
	
function getQc(){
	  $query=$this->db->query("select * from tbl_qualitiy_check where status='A' Order by qc_id desc ");
	      
	  return $result=$query->result();  
}

}
