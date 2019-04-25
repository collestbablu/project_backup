<?php
class model_pickup extends CI_Model {
	
function pickup_data(){
	  $query=$this->db->query("select * from tbl_pick_up where status='A'  ");
	  
	  
      
	  return $result=$query->result();  
}

}
