<?php
$tableName="tbl_sales_ordernew_hdr"; 
$supplier='Sales Order Report CSV';
$contents="Date:,Customer Name,Remarks,Subject,Ref.No.,Grand Total,Status, \n";

			
		 @extract($_GET);
		$queryy="select * from $tableName where status='A' ";
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy.=" and delivery_date >='$fdate1' and delivery_date <='$todate1'";
		}
		if($remark!=''){
				 $queryy.=" and remark like '%$remark%'";
		}
		if($subject!=''){
				 $queryy.=" and subject like '%$subject%'";
		}
		
		if($refno!=''){
				 $queryy.=" and refno like '%$refno%'";
		}
		if($grand_total!=''){
				 $queryy.=" and grand_total like '%$grand_total%'";
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
  $contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->vendor_id'");
					   $contactFetch=$contactQuery->row();
					   $name=$contactFetch->first_name." ".$contactFetch->last_name;
	
	
$contents.=str_replace(',',' ',$line->delivery_date).",";
$contents.=str_replace(',',' ',$name).",";
$contents.=str_replace(',',' ',$line->remark).",";
$contents.=str_replace(',',' ',$line->subject).",";
$contents.=str_replace(',',' ',$line->refno).",";

$contents.=str_replace(',',' ',$line->grand_total).",";
$contents.=str_replace(',',' ',$line->send_status).",\n";
$tt = $tt + $line->grand_total;
}
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
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
	
