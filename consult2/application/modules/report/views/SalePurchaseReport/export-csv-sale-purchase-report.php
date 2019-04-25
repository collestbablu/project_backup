<?php
$tableName="tbl_bill_of_material_hdr"; 
$supplier='PRODUCTION PLANNING Report CSV';
$contents="Item Name,Quantity,Unit,Gross Weight,Net Weight,Runner Weight\n";

	
	
				
				 @extract($_GET);
	


if(@$Search!=''){

	  $queryy="select * from tbl_bill_of_material_hdr where status='A'";

	 	 if($Product_typeid!=''){
		
	  	$queryy.=" and product_type like '%$Product_typeid%'";

		  }
		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and serial_no like '%$serial_no%'";

		  } 

		}

if($Search==''){
		  $queryy="select * from tbl_bill_of_material_hdr where status='A'";
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

   $sql1 = $this->db->query("select * from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$line->bill_of_material_id_hdr'");
					   			foreach($sql1->result() as $fetch){
					$Query=$this->db->query("select * from tbl_product_stock where product_id='$fetch->item_name'");
						    $fetchQ=$Query->row();
							
$contents.=str_replace(',',' ',$fetchQ->productname).",";
$contents.=str_replace(',',' ',$fetch->quentity).",";

$contents.=str_replace(',',' ',$fetch->unit).",";
$contents.=str_replace(',',' ',$fetch->gross_weight).",";
$contents.=str_replace(',',' ',$fetch->net_weight).",";

$contents.=str_replace(',',' ',$fetch->scrap_weight).",\n";
	
} } 
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
