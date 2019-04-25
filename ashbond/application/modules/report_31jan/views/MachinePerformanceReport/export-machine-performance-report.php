<?php
@extract($_GET);
$contents="Serial No.,Part No,HSN Code,Product Name,Description,Category,Unit,Purchase Price,Gst Tax,Sale Price \n";	


if(@$Search!=''){

	   $queryy="select * from tbl_product_stock where status='A' ";

	 	
		  if($po_no!=''){
	  	 	$queryy.=" and Product_id = '$po_no'";

		  }
		  
		
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1' ";
		}		  
		 
		 
		}
		
		
if($Search==''){
		  $queryy="select * from tbl_product_stock where status='A'";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){


 $sql1 = $this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='".$line->category."' ");
			$sql2 = $sql1->row();

$proQ1=$this->db->query("select * from tbl_master_data where serial_number='$line->usageunit'");
		$fProQ12=$proQ1->row();
						 	
							
$contents.=str_replace(',',' ',$i).",";
$contents.=str_replace(',',' ',$line->sku_no).",";
$contents.=str_replace(',',' ',$line->hsn_code).",";
$contents.=str_replace(',',' ',$line->productname).",";

$contents.=str_replace(',',' ',$line->part_no).",";
$contents.=str_replace(',',' ',$sql2->prodcatg_name).",";
$contents.=str_replace(',',' ',$fProQ12->keyvalue).",";

$contents.=str_replace(',',' ',$line->unitprice_purchase).",";
$contents.=str_replace(',',' ',$line->gst_tax).",";
$contents.=str_replace(',',' ',$line->unitprice_sale).",\n";
	$i++;
}  
$filename = "PRICE AFTER GST"." ".@date('d-m-Y');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("d-m-Y") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
