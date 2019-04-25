<?php
$tableName="tbl_product_serial_log"; 
$supplier='Product serial Report CSV';
$contents="Serial No:,Date,Product Code,Category,Product Name,Quantity,Location, \n";

	
	
				
	@extract($_GET);
	$tt=0;
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($productname!='') {
			$proNameQ1 = $this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
			$fproNQ1 = $proNameQ1->row();
	        $proid = $fproNQ1->Product_id;
		
		$queryy.=" and product_id='$proid'";
		 
		 }
		if($product_code!=''){
		
		$queryy.=" and serial_code like '%$product_code%'";
		
		}
		//echo $todate;die;
		if($fdate!='')
		{
			$todate=explode("/",$_REQUEST['todate']);
			$fdate=explode("/",$_REQUEST['fdate']);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
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
	$srn=1;
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
$contents.=str_replace(',',' ',$srn++).",";
$contents.=str_replace(',',' ',$line->maker_date).",";
$proNameQ1=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
			$fproNQ1=$proNameQ1->row();	
$contents.=str_replace(',',' ',$fproNQ1->sku_no).",";

$sql1 = $this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='".$fproNQ1->category."' ");
			$sql2 = $sql1->row();
			

$contents.=str_replace(',',' ',$sql2->prodcatg_name).",";

$contents.=str_replace(',',' ',$pro).",";


$contents.=str_replace(',',' ',$line->quantity).",";
$contents.=str_replace(',',' ',$location).",\n";
$tt = $tt + $line->quantity;
}
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ',$tt).",";
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
