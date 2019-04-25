<?php
$tableName="tbl_production_dtl"; 
$supplier='Product fabricator Report CSV';
$contents="Date,Invoice Code,Fabricator Name,Product Code,Product Name,Quantity,Completed Quantity, \n";
	
	
				
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
		if($casno!=''){
		$ss =array();
	
		  	$industry_idQuery1=$this->db->query("select * from tbl_production_hdr where caseno like'%$casno%'");
        	foreach($industry_idQuery1->result() as $industryidFetch){
			
			
		
			$ss[]=$industryidFetch->invoiceid;
			$aa=implode(',',$ss);
		
			} 
     if($aa!=''){
		$queryy.=" and invoice_id in ($aa)";
	 }else{
		$queryy.=" and invoice_id in (NULL)";
		}
		}
		if($fdate!='')
		{
			$queryy  = $queryy . "and maker_date >='$fdate' and maker_date <='$todate'";
		}
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where status='A'";
	
	}
	
 
	
 	
	
	$results=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	foreach($results->result() as $line){
	$i++;
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }
   

     
$contents.=str_replace(',',' ',$line->maker_date).",";
$contents.=str_replace(',',' ',$line->invoice_dtl_id).",";


 $Query1=$this->db->query("select * from tbl_production_hdr where invoiceid='$line->invoice_id'"); 
						  $fetchQ1=$Query1->row();		
					  //echo "select * from tbl_contact_m where contact_id='".$line->fabricator."'";die; 
					  	  $Query=$this->db->query("select * from tbl_contact_m where contact_id='$fetchQ1->fabricator'"); 
						$fetchQ=$Query->row();
					    $french= $fetchQ->first_name; 
						
$contents.=str_replace(',',' ',$french).",";						
$contents.=str_replace(',',' ',$line->product_id).",";



$QueryPie=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
						$fetchQPie=$QueryPie->row();
					   		   $qt= $fetchQPie->productname; 
							   
$contents.=str_replace(',',' ',$qt).",";
$contents.=str_replace(',',' ',$line->qnty).",";
$contents.=str_replace(',',' ',$line->quantity_ready).",\n";

}
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
