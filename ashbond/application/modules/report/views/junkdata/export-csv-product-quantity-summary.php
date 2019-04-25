<?php
$tableName="tbl_product_serial_log"; 
$supplier='Product Quantity Report CSV';
$contents="Date,Product Code,Product Name,Location,Quantity, \n";

	
	
				
				 @extract($_GET);
	

	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($productname!='') {
		$productname1=$this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
		$fetchproductname1=$productname1->row();
		@extract($fetchproductname1);
		$queryy.="and product_id like '$fetchproductname1->Product_id'";
		 }
		if($location!=''){
		  	$industry_idQuery1=$this->db->query("select * from tbl_location where location_name like '%$location%'");
        	$industryidFetch=$industry_idQuery1->row(); 
           
		$queryy.=" and location_id like '$industryidFetch->id'";}
		if($fdate!='')
		{
			$queryy  = $queryy . "and maker_date >='$fdate' and maker_date <='$todate'";
		}
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where status='A'";
	
	}
	
	$result=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	foreach(@$result->result() as $line){
	$i++;
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }
   @extract($line);

   $proNameQ=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
			$fproNQ=$proNameQ->row();
	 $pro=$fproNQ->productname;
	
	$locQ=$this->db->query("select * from tbl_location where id='$line->location_id'");
			$flocQ=$locQ->row();
 				$location=$flocQ->location_name;

$contents.=str_replace(',',' ',$line->maker_date).",";

$contents.=str_replace(',',' ',$line->serial_code).",";

$contents.=str_replace(',',' ',$pro).",";
$contents.=str_replace(',',' ',$location).",";
$contents.=str_replace(',',' ',$line->quantity).",\n";

}
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
