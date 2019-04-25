<?php
@extract($_GET);
$contents="Sr. No.,Part Name,Completed Quantity,Rejection Quantity,Rejection % \n";	


if(@$Search!=''){

	   $queryy="select * from tbl_wip_hdr where status='A' ";

	 	
		  if($product_name!=''){
	  	 $queryy.=" and product_name  = '$product_name'";

		  }
		  
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and date >='$fdate1' and date <='$todate1' ";
		}		  
		 
		 $queryy  = $queryy . "group by product_name";
		 
		}
		
		
if($Search==''){
		  $queryy="select * from tbl_wip_hdr where status='A' group by product_name";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){
$Query=$this->db->query("select * from tbl_product_stock where product_id='$line->product_name'");
						    $fetchQ=$Query->row();
	

							
$contents.=str_replace(',',' ',$i).",";
$contents.=str_replace(',',' ',$fetchQ->productname).",";
$contents.=str_replace(',',' ',$line->quantity).",";
$contents.=str_replace(',',' ',$line->rejection_qty).",";

$contents.=str_replace(',',' ',$line->quantity*$line->rejection_qty/100).",\n";
	$i++;
}  
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
