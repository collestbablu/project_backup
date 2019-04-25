<?php
	 $finishid=$finishid;
	$query=$this->db->query("select * from cybercodex_production_dtl where finish_goods='$finishid'");
	foreach($query->result() as $fetchQ){
			
			$pro=$fetchQ->product_id;
			
		$query12=$this->db->query("select min(quantity) as min1 from cybercodex_product_serial where product_id='$pro'");
	$fetchQ12=$query12->row();	
	
	 $quy=$fetchQ12->quantity;
	echo $fetchQ12->min1."<br>";
	}
		?> 