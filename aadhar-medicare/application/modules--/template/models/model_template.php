<?php
class model_template extends CI_Model {
function getTemplate(){
	  $query=$this->db->query("select * from tbl_template_hdr where status='A' Order by templateid desc ");
	  return $result=$query->result();  
}

}
