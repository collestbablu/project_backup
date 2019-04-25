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
  
$out = array();
$outdate = array();
 $Query=$this->db->query("select * from tbl_po_invoice_no where po_id='$line->purchase_order_id'");
 foreach(@$Query->result() as $rows)
 { 
 $invno = $rows->invoice_no; 
 array_push($out, $invno);
 $invdate= $rows->invoice_date;
 array_push($outdate, $invdate); 

}

$invnoss=implode('|', $out);
$invodates=implode('|', $outdate);

$cateQuery=$this->db->query("select * from tbl_new_case where case_id='$line->case_id'");
$categoryRow=$cateQuery->row();								


$sumbill='';							
$Qresult=$this->db->query("select * from tbl_invoice_report where invoiceid='$line->purchase_order_id' and type='Purchase'");
foreach($Qresult->result() as $fetchQlist)
{								
$sumbill +=$fetchQlist->billamount;										
}
$gst='';
$Query=$this->db->query("select * from tbl_invoice_payment where invoiceid='$line->purchase_order_id' and status='Purchaseorder' ");
$get=$Query->row();															

							
$contents.=str_replace(',',' ',$i).",";
$contents.=str_replace(',',' ',$invnoss).",";
$contents.=str_replace(',',' ',$invodates).",";
$contents.=str_replace(',',' ',$line->refno).",";
$contents.=str_replace(',',' ',$fetchQ->first_name).",";
$contents.=str_replace(',',' ',$categoryRow->category_name).",";
$contents.=str_replace(',',' ',$get->receive_billing_mount).",";
$contents.=str_replace(',',' ',$gst).",";
$contents.=str_replace(',',' ',$line->grand_total).",";
$contents.=str_replace(',',' ',$sumbill).",\n";
	
	
 } 
 
  
$filename = $supplier."_".@date('d-m-Y');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("d-m-Y") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
