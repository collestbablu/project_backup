<?php
$tableName="tbl_product_stock"; 
$supplier='Product Stock Report CSV';
$contents="Serial No:,Product Code,Category,Product Name,Usage Unit,Unit Price Purchase,Unit Price Sale \n";

	
	
				
				 @extract($_GET);
	


if(@$Search!=''){

	  $queryy="select * from tbl_product_stock where status='A'";

		    if($productname!=''){
	  	$queryy.=" and productname like '%$productname%'";

		  }

if($category!='')
{


	  	$queryy.=" and category='$category'";

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

$contents.=str_replace(',',' ',$line->unitprice_sale).",\n";

}
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
