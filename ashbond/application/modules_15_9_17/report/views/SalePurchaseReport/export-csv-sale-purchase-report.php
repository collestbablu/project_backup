<?php
$tableName="tbl_product_stock"; 
$supplier='Sale Purchase Report CSV';
$contents="Serial No:,Product Code,Category,Product Name,Usage Unit,Unit Price Purchase,Unit Price Sale,Total Purchase Qty.,Total Sale Qty.,Total Quantity \n";

	
	
				
				 @extract($_GET);
	


if(@$Search!=''){

	  $queryy="select * from tbl_product_stock where status='A'";

		    if($productname!=''){
	  	$queryy.=" and productname like '%$productname%'";

		  }

	   if($product_code!='')
		  {
		$proQ1=$this->db->query("select * from tbl_product_serial where serial_code like '%$product_code%'");
		$fProQ1=$proQ1->row();
		$pro=$fProQ1->product_id;
	  	$queryy.=" and Product_id='$pro'";

		  }

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

    $proQ=$this->db->query("select * from tbl_product_stock where product_id='$line->Product_id'");
		$fProQ=$proQ->row();
  $pro=$fProQ->sku_no;
 
$contents.=str_replace(',',' ',$srn++).",";
$contents.=str_replace(',',' ',$pro).",";
	$sql1 = $this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='".$line->category."' ");
			$sql2 = $sql1->row();
		
$contents.=str_replace(',',' ',$sql2->prodcatg_name).",";
$contents.=str_replace(',',' ',$line->productname).",";

$proQ1=$this->db->query("select * from tbl_master_data where serial_number='$line->usageunit'");
		$fProQ12=$proQ1->row();

$contents.=str_replace(',',' ',$fProQ12->keyvalue).",";
$contents.=str_replace(',',' ',$line->unitprice_purchase).",";
$contents.=str_replace(',',' ',$line->unitprice_sale).",";

	$sqlqnty = $this->db->query("select sum(quantity) as qty from tbl_product_serial_log where product_id = '".$line->Product_id."'");
	$sqlqnty1 = $sqlqnty->row();
 $a = $toal_sale = $sqlqnty1->qty;
 
 $sqlqnty1 = $this->db->query("select sum(qty) as qty from tbl_invoice_dtl where productid = '".$line->Product_id."'");
 $b = 0;
  $sqlqnty12 = $sqlqnty1->row();
  $b = $sqlqnty12->qty;
	$total = $a-$b;
	
$contents.=str_replace(',',' ',$a).",";
$contents.=str_replace(',',' ',$b).",";
$contents.=str_replace(',',' ',$total).",\n";
	
}
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
