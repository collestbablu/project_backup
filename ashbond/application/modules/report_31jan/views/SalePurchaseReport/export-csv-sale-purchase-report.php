<?php
$tableName="tbl_purchase_order_hdr"; 
$supplier='PURCHASE RECORDS CSV';
$contents="Sl. No.,Invoice No.,Invoice Date,P.O. No.,Supplier,Goods Description,Amount,GST,Total Amount,Payment \n";

	
	
				
				 @extract($_GET);
	


if(@$Search!=''){

	  $queryy="select * from tbl_purchase_order_hdr where status='A'";

	 	 if($contact_id!=''){
		
	  	$queryy.=" and vendor_id ='$contact_id'";

		  }
		 
		 if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and delivery_date >='$fdate1' and delivery_date <='$todate1'";
		}
		 
		}

if($Search==''){
		   $queryy="select * from tbl_purchase_order_hdr where status='A'";
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

  $Query=$this->db->query("select * from tbl_contact_m where contact_id='$line->vendor_id'");
						    $fetchQ=$Query->row();
							
$contents.=str_replace(',',' ',$i).",";
$contents.=str_replace(',',' ',$line->invoice_no).",";

$contents.=str_replace(',',' ',$line->invoice_date).",";
$contents.=str_replace(',',' ',$line->refno).",";
$contents.=str_replace(',',' ',$fetchQ->first_name).",";
$contents.=str_replace(',',' ',$fetchQ->first_name).",";
$contents.=str_replace(',',' ',$fetchQ->first_name).",";
$contents.=str_replace(',',' ',$fetchQ->first_name).",";
$contents.=str_replace(',',' ',$line->grand_total).",";
$contents.=str_replace(',',' ',$line->grand_total).",\n";
	
 } 
$filename = $supplier."_".@date('d-m-Y');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("d-m-Y") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
