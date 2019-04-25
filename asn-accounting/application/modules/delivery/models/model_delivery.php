<?php
class model_delivery extends CI_Model {
	
function delivery_data(){
	  $query=$this->db->query("select * from tbl_delivery where status='A'  ");
	  
	  
      
	  return $result=$query->result();  
}

}
