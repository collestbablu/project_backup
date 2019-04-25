<?php 

$product_id=$_GET['product_id'];
$implo =explode(',',$product_id);
$id=$implo[0];
$value=$implo[1];


$ewww = $this->db->query("select * from cybercodex_production_dtl where finish_goods='$id' ");
$true = 1;
foreach($ewww->result() as $rew){
		//echo "select * from cybercodex_product_serial where product_id='$rew->product_id' and location_id =1";
		//echo "select * from cybercodex_product_serial where product_id='$rew->product_id' and location_id =1";
		 $ewww1 = $this->db->query("select * from cybercodex_product_serial where product_id='$rew->product_id' and location_id =1");
		 $fe=$ewww1->row();
		 $qq=$rew->qnty*$value;
		
		if($fe->quantity<$qq){
			$true = 0;
			//exit;
		}
		
		 }
		echo $true; 
		

?>
