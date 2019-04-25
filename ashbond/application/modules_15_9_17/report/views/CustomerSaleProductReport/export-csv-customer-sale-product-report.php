<?php
$tableName="tbl_invoice_hdr"; 
$supplier='Customer Sale Product ReportCSV';
$contents="Invoice No:,Customer Name,Invoice Date,SERVICE TAX,Grand Total, \n";

	
	
				
				 @extract($_GET);
	 @extract($_GET);
	if(@$Search!=''){

 		$queryy="select * from $tableName where status='Invoice done'";
		    if($invoice_no!=''){
		  		  	$queryy.=" and invoiceid like '%$invoice_no%'";

		  }
	if($fdate!='')
		{
			$todate=explode("/",$_REQUEST['todate']);
			$fdate=explode("/",$_REQUEST['fdate']);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
 
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
  $contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->contactid'");
					   $contactFetch=$contactQuery->row();
					   $name=$contactFetch->first_name." ".$contactFetch->last_name;
	
	
$contents.=str_replace(',',' ',$line->invoiceid).",";
$contents.=str_replace(',',' ',$name).",";
$contents.=str_replace(',',' ',$line->invoice_date).",";
$contents.=str_replace(',',' ',$line->service_tax).",";
//$contents.=str_replace(',',' ',$line->balance_total).",";



$contents.=str_replace(',',' ',$line->grand_total).",\n";
$tt = $tt + $line->grand_total;
}
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
//$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','Grand Total').",";
$contents.=str_replace(',',' ',$tt).",";
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
