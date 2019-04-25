<?php
$locid=$locid;
 $action=explode("~",$locid);
  $actionLoc=$action[0];
  $actionPro=$action[1];
 if($locid!='')
{
	 $ptlId = $actionLoc;
	 $ptProduct = $actionPro;
	//$val="";
	
		  $leadSourceQuery=$this->db->query("SELECT * FROM tbl_product_serial WHERE product_id ='$ptProduct' and location_id='$ptlId'");

  foreach($leadSourceQuery->result() as $leadSourceRow) {
 		 $val = $leadSourceRow->quantity;
	}		
	if(isset($val) && $val !='')
	{
	 echo $val;
	}else
	{
		echo "0";
	}
}
?>