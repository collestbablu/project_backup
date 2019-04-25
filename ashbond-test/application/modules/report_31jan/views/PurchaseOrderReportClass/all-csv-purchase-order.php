<?php
$tableName="tbl_defleshing_hdr"; 
$supplier='QA Report CSV';
$contents="Lot No,Finish Goods,Unit,Total Qty,Completed Qty,Rejected Qty, \n";

	
	
				
				 @extract($_GET);
	
	if(@$Search!=''){

	  $queryy="select * from tbl_defleshing_hdr where status='A'";

	 	 if($Product_typeid!=''){
		
	  	$queryy.=" and product_type like '%$Product_typeid%'";

		  }
		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and lot_no like '%$serial_no%'";

		  } 

		}
if($Search=='')
	{
		$queryy="select * from $tableName";
		}

		  @$result=$this->db->query($queryy);
   $i=$start;
    $j=1;
   foreach(@$result->result() as $line){
   $i++;
   if($i%2!=0){
   	$color='#ECE9D8';
   }else{
   	$color='#F1FEFD';
   }
 $productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->product_name'");
	$getproduct=$productQuery->row();
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	
	$qaQuery=$this->db->query("select SUM(rejection_qty) as rejQty,SUM(quantity) as comQty from tbl_qa_hdr where lot_no='$line->lot_no'");
	$getData=$qaQuery->row();
	
	
	
$contents.=str_replace(',',' ',$line->lot_no).",";
$contents.=str_replace(',',' ',$getproduct->productname).",";
$contents.=str_replace(',',' ',$getunit->keyvalue).",";
$contents.=str_replace(',',' ',$line->quantity).",";
$contents.=str_replace(',',' ',$line->quantity-$getData->rejQty).",";



$contents.=str_replace(',',' ',$getData->rejQty).",\n";

}
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
