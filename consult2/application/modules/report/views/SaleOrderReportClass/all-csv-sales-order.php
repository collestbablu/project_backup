<?php
$tableName="tbl_bill_of_material_hdr"; 
$supplier='Packing Report CSV';
$contents="Lot No,Finish Goods,Unit,Total Qty,Status, \n";

	 @extract($_GET);
	if(@$Search!=''){

	 $queryy="select * from $tableName where status='A' and approval_status='Approved'";

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
if($Search=='')
	{
		 $queryy="select * from $tableName where status='A' and approval_status='Approved' order by bill_of_material_id_hdr desc ";
		}		
		  @$result=$this->db->query($queryy);
   $i=$start;
    $j=1;
   foreach(@$result->result() as $liness){
   $i++;
   if($i%2!=0){
   	$color='#ECE9D8';
   }else{
   	$color='#F1FEFD';
   }
 
  $hdrQuery=$this->db->query("select *from tbl_qa_hdr where lot_no='$liness->serial_no'");
	$line=$hdrQuery->row();
	
	$billHdr=$this->db->query("select *from tbl_bill_of_material_hdr where serial_no='$liness->serial_no'");
	$getBillHdr=$billHdr->row();
	
	
	$queryHdr=$this->db->query("select *from tbl_qa_hdr where lot_no='$liness->serial_no'");
	$cntData=$queryHdr->num_rows();
	$getQueryHdr=$queryHdr->row();
	
	
	$queryPackingHdr=$this->db->query("select *from tbl_packing_hdr where lot_no='$liness->serial_no'");
	
	$getqueryPackingHdr=$queryPackingHdr->row();

	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$liness->product_name'");
	$getproduct=$productQuery->row();
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	$qaQuery=$this->db->query("select SUM(rejection_qty) as rejQty,SUM(quantity) as comQty from tbl_qa_hdr where lot_no='$line->lot_no'");
	$getData=$qaQuery->row();
	
$contents.=str_replace(',',' ',$line->lot_no).",";
$contents.=str_replace(',',' ',$getproduct->productname).",";
$contents.=str_replace(',',' ',$getunit->keyvalue).",";
$contents.=str_replace(',',' ',$getBillHdr->quantity-$getQueryHdr->rejection_qty).",";
//$contents.=str_replace(',',' ',$line->balance_total).",";



$contents.=str_replace(',',' ',$getqueryPackingHdr->status).",\n";

}
$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";
//$contents.=str_replace(',',' ','').",";
$contents.=str_replace(',',' ','').",";

$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
