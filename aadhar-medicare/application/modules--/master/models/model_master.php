<?php
class model_master extends CI_Model {
	
function productCatg_data(){
	
	  $this->db->select("*");
	  // $this->db->order_by("prodcatg_id","desc");
      $this->db->from('tbl_prodcatg_mst');  
      $query = $this->db->get();
      
	  return $result=$query->result();  
}	

function contact_get(){
	
	  
	  $query=$this->db->query("select *from tbl_contact_m where status='A'");
      
	  return $result=$query->result();  
}

function product_get(){
	
	  
	  $query=$this->db->query("select *from tbl_product_stock where status='A' order by Product_id desc");
      
	  return $result=$query->result();  
}



}
