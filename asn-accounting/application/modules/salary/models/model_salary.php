<?php
class model_salary extends CI_Model {
	
function salary_data(){
	  $query=$this->db->query("select * from tbl_salary where status='A'  ");
	  
	  
      
	  return $result=$query->result();  
}

}
