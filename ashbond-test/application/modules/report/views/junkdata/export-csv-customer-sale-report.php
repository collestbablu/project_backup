<?php
error_reporting (E_ALL ^ E_NOTICE);
$tableName="tbl_invoice_dtl"; 
$supplier='Customer Sales Report';
$contents="Date,Invoice Detail Id,Product Code ,Product Name,Customer Name,Rate Per Piece,Sale Qty,Amount,\n";

		@extract($_GET);

if($Search!='')
	{
	
	     $queryy="select * from tbl_invoice_dtl where status='A'";
		
		 if($productname!='') 
		
		{
		$productName = array();
		
		
		$quw=$this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
			foreach($quw->result() as $resultp){
			
		   $productName[]=$resultp->Product_id;
		  
		  }
		  $productId45 = implode(',', $productName);
		  
		 $queryy.=" and productid in ($productId45)"; 
		
		 
	   }
	


		
		   if($company_name!='')


  {
  
  

  $sql00=$this->db->query("select * from tbl_invoice_hdr where contactid = '$company_name'");
  
			$result2=$sql00->row();
			$ress=$result2->invoiceid;
			$queryy.=" and invoiceid = '$ress'";
  
          
     //$queryy;
}
if($fdate!='')
		{
			
		
			$todate=explode("/",$_REQUEST['todate']);
			$fdate=explode("/",$_REQUEST['fdate']);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . " and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
		
	}
		if($Search=='')
	   {	   
	     $queryy="select * from tbl_invoice_dtl where status='A'";
		 }
		 
	$result=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	$m =0;
	foreach(@$result->result() as $line){
	$i++;
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }

   @extract($line);
  
  //contact query
					  $contactQuery14=$this->db->query("select *from tbl_invoice_hdr where invoiceid = '$line->invoiceid'");
					   $contactFetch14=$contactQuery14->row();
					   
					    
					   

					   
					   
					    
$contents.=str_replace(',',' ',$contactFetch14->due_date).",";

$contents.=str_replace(',',' ',$line->invoiceid).",";

$quer22=$this->db->query("select * from tbl_product_serial where product_id = '$line->productid' ");
			$quer223=$quer22->row();
			
$contents.=str_replace(',',' ',$quer223->serial_code).",";
					   
					  
 
	$contactQuery12=$this->db->query("select * from tbl_product_stock where Product_id='$line->productid'");
					   $contactFetch12=$contactQuery12->row();
					   
$contents.=str_replace(',',' ',$contactFetch12->productname).",";

 
  
					   
					   $contactQuery11=$this->db->query("select *from tbl_contact_m where contact_id='$contactFetch14->contactid'");
					   $contactFetch11=$contactQuery11->row();
					   
			$name1=$contactFetch11->first_name." ".$contactFetch11->last_name;	    
$contents.=str_replace(',',' ',$name1).",";
					   
					  
	 
					   
				   	  
					    
$contents.=str_replace(',',' ',$line->list_price).",";
					   
					  

$contents.=str_replace(',',' ', $line->qty).",";
 
 $qt = $line->qty*$line->list_price;
 

$contents.=str_replace(',',' ', $qt).",\n";

$m = $m+$qt;

// this code for getting engineer name form admin table table
//$engName=mysql_query("select * from admin where user_id ='$Assigned_engineer'");
//$eng=mysql_fetch_array($engName);




}

$contents.=str_replace(',',' ', '').",";
$contents.=str_replace(',',' ', '').",";
$contents.=str_replace(',',' ', '').",";
$contents.=str_replace(',',' ', '').",";
$contents.=str_replace(',',' ', '').",";
$contents.=str_replace(',',' ', '').",";
$contents.=str_replace(',',' ', 'Total').",";
$contents.=str_replace(',',' ', $m).",";



$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
		
	
?>