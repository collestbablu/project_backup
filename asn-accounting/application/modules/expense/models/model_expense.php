<?php
class model_expense extends CI_Model {
	
function expense_data(){
	  $query=$this->db->query("select * from tbl_expense where status='A'  ");
	  
	  
      
	  return $result=$query->result();  
}

}
