<?php
$tableName="tbl_new_invoice"; 
$supplier='Sale Records CSV';
$contents="Sl. No.,Invoice No. & Date,S.O. No. & Date,Customer,Description,Basic Amount,GST,Total Amount,Payment Details, \n";

	
	
				
	@extract($_GET);
	$tt=0;
	if($Search!='')
	{
		$queryy="select * from $tableName where choose_status='A'";
		if($contact_id!=''){
						
							$queryy.="and contact_id='$contact_id'";
			 		}
		
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and n_date >='$fdate1' and n_date <='$todate1'";
		}
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where choose_status='A'";
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
 
 $contQuery=$this->db->query("select * from tbl_contact_m where contact_id='$line->contact_id'");
										 $contRow=$contQuery->row();
	$contactn=$contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name;
	
	$inv=$line->invoice_no.' & '.$line->n_date;	
	$so=$line->so_no.' & '.$line->so_date;								 

	$cateQuery=$this->db->query("select * from tbl_new_case where case_id='$line->case_id'");
	$categoryRow=$cateQuery->row();

$contents.=str_replace(',',' ',$i).",";

$contents.=str_replace(',',' ',$inv).",";


$contents.=str_replace(',',' ',$so).",";

$contents.=str_replace(',',' ',$contactn).",";

$contents.=str_replace(',',' ',$categoryRow->category_name).",";

$contents.=str_replace(',',' ',$line->basic_amt).",";

$contents.=str_replace(',',' ',$line->tax).",";
$contents.=str_replace(',',' ',$line->total_amt).",";
$contents.=str_replace(',',' ',$line->payment_status).",\n";
//$tt = $tt + $line->quantity;
}
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
//$contents.=str_replace(',',' ',$tt).",";
$filename = $supplier."_".@date('d-m-Y');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("d-m-Y") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
