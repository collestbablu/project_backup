<?php
class model_branch_delivery extends CI_Model {
	
function branch_data(){

	  $query=$this->db->query("select * from tbl_branch_delivery where status='A'  ");
      
	  return $results=$query->result();  
}

}
