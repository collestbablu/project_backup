<?php
$tableName="tbl_template_hdr"; 
$supplier='Template Report CSV';
$contents="Raw Material Name,Quantity,Unit,Gross Weight,Net Weight,Runner Weight, \n";

	
	
				
	@extract($_GET);
	$tt=0;
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($product_name!='') {
		
		
		    $queryy.=" and product_name='$product_name'";
		 
		 }
		
		//echo $todate;die;
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
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
 
 $sql1 = $this->db->query("select * from tbl_template_dtl where template_hdr_id='$line->template_hdr_id'");
					   			$fetch=$sql1->row();
															
							
							$Query=$this->db->query("select * from tbl_product_stock where product_id='$fetch->item_name'");
						    $fetchQ=$Query->row();
							

$contents.=str_replace(',',' ',$fetchQ->productname).",";

$contents.=str_replace(',',' ',$fetch->quentity).",";


$contents.=str_replace(',',' ',$fetch->unit).",";

$contents.=str_replace(',',' ',$fetch->gross_weight).",";


$contents.=str_replace(',',' ',$fetch->net_weight).",";
$contents.=str_replace(',',' ',$fetch->scrap_weight).",\n";
//$tt = $tt + $line->quantity;
}
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
//$contents.=str_replace(',',' ',$tt).",";
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
