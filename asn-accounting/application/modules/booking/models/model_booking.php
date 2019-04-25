<?php
class model_booking extends CI_Model {
	
function booking_data(){
	  $query=$this->db->query("select * from tbl_bookong_order_hdr order by bookingrid asc");
	  
	  
      
	  return $result=$query->result();  
}

}
