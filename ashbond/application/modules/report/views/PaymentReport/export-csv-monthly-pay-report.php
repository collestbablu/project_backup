<?php
$tableName="tbl_invoice_payment"; 
$supplier='Payment Report CSV';
$contents="Vendor Name,Amount,Paid Amount,Opening Balance, \n";
				
				 @extract($_GET);
	 if($Search!='')
	{
		$queryy="select * from $tableName where status='payment'";
		
		 if($productname!=''){
	       	
	//echo $productname;die;
										
	   $queryy = $queryy. " and contact_id = $productname ";
	   }
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy.=" and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
		
		  $queryy  = $queryy . " GROUP BY contact_id";
	}
	
	if($Search=='')
	{
		
		 $queryy="select * from $tableName where status='payment' GROUP BY contact_id";
		
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
  $contactQuery=$this->db->query("select *from tbl_contact_m where group_name ='3' and contact_id='$line->contact_id'");
					   $contactFetch=$contactQuery->row();
					   $name=$contactFetch->first_name." ".$contactFetch->last_name;
	$b1=$this->db->query("select sum(receive_billing_mount) as sum1 from $tableName where contact_id ='".$line->contact_id."' and status='purchaseorder' ") ;
 $b2 = $b1->row();
 
 $b = $b2->sum1;
 
  $a1=$this->db->query("select sum(receive_billing_mount) as sum1 from $tableName where contact_id ='".$line->contact_id."' and status='payment'");
	 $a2=$a1->row();
	 $a = $a2->sum1;
	
	$opening=$b-$a;
	
$contents.=str_replace(',',' ',$name).",";
$contents.=str_replace(',',' ',$b).",";
$contents.=str_replace(',',' ',$a).",";

$contents.=str_replace(',',' ',$opening).",\n";
$tt = $tt + $line->grand_total;
}

$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
