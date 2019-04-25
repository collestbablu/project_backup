<?php
class model_rentals extends CI_Model {
	
function rentals_data(){
	  $query=$this->db->query("select * from tbl_rentale where status='A'  ");
	  
	  
      
	  return $result=$query->result();  
}

}
