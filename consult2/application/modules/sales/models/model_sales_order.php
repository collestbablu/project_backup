<?php
class model_sales_order extends CI_Model {
	
function sales_order_data(){
	  $query=$this->db->query("select * from tbl_finish_goods_order where status='A' order by id desc");
	  
	  
      
	  return $result=$query->result();  
}

}
