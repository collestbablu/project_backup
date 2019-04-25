<?php
@extract($_GET);
$contents="P.O NO.,P.O Date,Vendor,S.O NO.,DOD OF P.O,DOD OF S.O,S.O Value,P.O Value \n";	


if(@$Search!=''){

	   $queryy="select * from tbl_purchase_order_hdr where status='A' ";

	 	
		  if($po_no!=''){
	  	 	$queryy.=" and refno = '$po_no'";

		  }
		  
		  if($customer_name!=''){
	  	 	$queryy.=" and vendor_id = '$customer_name'";

		  }
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and delivery_date >='$fdate1' and delivery_date <='$todate1' ";
		}		  
		 
		 
		}
		
		
if($Search==''){
		  $queryy="select * from tbl_purchase_order_hdr where status='A'";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){


 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' and contact_id='$line->vendor_id'");
					 			 $contRow=$contQuery->row();
								 
	 $saleQuery=$this->db->query("select * from tbl_sales_ordernew_hdr where case_id='$line->case_id'");
					 			 $saleRow=$saleQuery->row();							 	
$connn=$contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name;
							
$contents.=str_replace(',',' ',$line->refno).",";
$contents.=str_replace(',',' ',$line->delivery_date).",";
$contents.=str_replace(',',' ',$connn).",";
$contents.=str_replace(',',' ',$saleRow->ponew_no).",";

$contents.=str_replace(',',' ',$line->vendor_dod).",";
$contents.=str_replace(',',' ',$saleRow->ponew_date).",";
$contents.=str_replace(',',' ',$saleRow->grand_total).",";

$contents.=str_replace(',',' ',$line->grand_total).",\n";
	$i++;
}  
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
