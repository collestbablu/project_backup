<?php
@extract($_GET);
$contents="Date.,Customer & Vendor Name,Product Name,Description,Remarks,Subject,Ref.No.,Price,Status \n";	


@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_quotation_dtl where status='A'";
	   
	   $queryyone="select * from tbl_purchase_order_dtl where status='A'";
	   
	   $queryytwo="select * from tbl_sales_ordernew_dtl where status='A'";
	 	
		  if($product_name!=''){
	  	 		
				$queryy.=" and product_id = '$product_name'";
				
				$queryyone.=" and product_id = '$product_name'";
				
				$queryytwo.=" and product_id = '$product_name'";

		  }
		  
		  if($Status_name=='Quotation'){
		  
	  	 		$queryy.=" and report_status = 'A'";	
				$queryyone.=" and report_status = 'NoResult'";		
		  		$queryytwo.=" and report_status = 'NoResult'";
		  }
		 
		  
		  if($Status_name=='Purchase_order'){
		  			
			$queryy.=" and report_status = 'NoResult'";	
			$queryyone.=" and report_status = 'A'";		
		  	$queryytwo.=" and report_status = 'NoResult'";
			
		  }
		  
		  if($Status_name=='Sales_order'){
		  
			$queryy.=" and report_status = 'NoResult'";	
			$queryyone.=" and report_status = 'NoResult'";		
		  	$queryytwo.=" and report_status = 'A'";

		  }
		  
		}
if($Search==''){
	
	$queryy="select * from tbl_quotation_dtl where status='A' order by quotation_id_dtl desc";
	
	$queryyone="select * from tbl_purchase_order_dtl where status='A' order by purchase_order_dtl_id desc";
	   
	$queryytwo="select * from tbl_sales_ordernew_dtl where status='A' order by purchase_order_dtl_id desc";
}		

		  $result=$this->db->query($queryy);

		   $i=1;
   
   foreach(@$result->result() as $line){

$Query=$this->db->query("select * from tbl_quotation_hdr where quotation_id_hdr='$line->quotation_id'");
$fetchQ=$Query->row();

$sql = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ->vendor_id'");
$linecategory=$sql->row();	

$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->product_id'");
$getProduct=$productQuery->row();
							
$contents.=str_replace(',',' ',$line->author_date).",";
$contents.=str_replace(',',' ',$linecategory->first_name).",";
$contents.=str_replace(',',' ',$getProduct->productname).",";
$contents.=str_replace(',',' ',$line->description).",";

$contents.=str_replace(',',' ',$fetchQ->remark).",";
$contents.=str_replace(',',' ',$fetchQ->subject).",";
$contents.=str_replace(',',' ',$fetchQ->refno).",";
$contents.=str_replace(',',' ',$line->list_price).",";
$contents.=str_replace(',',' ','Quotation').",\n";
	$i++;
}  
//=================================================================================
$resultone=$this->db->query($queryyone); 
foreach(@$resultone->result() as $fetch_list){

$Query2=$this->db->query("select * from tbl_purchase_order_hdr where purchase_order_id='$fetch_list->purchase_order_hdr_id'");
$fetchQ2=$Query2->row();

$sql2 = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ2->vendor_id'");
$linecategory2=$sql2->row();

$productQuery2=$this->db->query("select *from tbl_product_stock where Product_id='$fetch_list->product_id'");
$getProduct2=$productQuery2->row();
							
$contents.=str_replace(',',' ',$fetch_list->author_date).",";
$contents.=str_replace(',',' ',$linecategory2->first_name).",";
$contents.=str_replace(',',' ',$getProduct2->productname).",";
$contents.=str_replace(',',' ',$fetch_list->description).",";

$contents.=str_replace(',',' ',$fetchQ2->remark).",";
$contents.=str_replace(',',' ',$fetchQ2->subject).",";
$contents.=str_replace(',',' ',$fetchQ2->refno).",";
$contents.=str_replace(',',' ',$fetch_list->list_price).",";
$contents.=str_replace(',',' ','Purchase Order').",\n";

}  
//=================================================================================

$resulttwo=$this->db->query($queryytwo);
foreach(@$resulttwo->result() as $fetch_data){

$Query3=$this->db->query("select * from tbl_sales_ordernew_hdr where purchase_order_id='$fetch_data->purchase_order_hdr_id'");
$fetchQ3=$Query3->row();

$sql3 = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ3->vendor_id'");
$linecategory3=$sql3->row();

$productQuery3=$this->db->query("select * from tbl_product_stock where Product_id='$fetch_data->product_id'");
$getProduct3=$productQuery3->row();
							
$contents.=str_replace(',',' ',$fetch_data->author_date).",";
$contents.=str_replace(',',' ',$linecategory3->first_name).",";
$contents.=str_replace(',',' ',$getProduct3->productname).",";
$contents.=str_replace(',',' ',$fetch_data->description).",";

$contents.=str_replace(',',' ',$fetchQ3->remark).",";
$contents.=str_replace(',',' ',$fetchQ3->subject).",";
$contents.=str_replace(',',' ',$fetchQ3->refno).",";
$contents.=str_replace(',',' ',$fetch_data->list_price).",";
$contents.=str_replace(',',' ','Sales Order').",\n";

}  
//=================================================================================
$filename = $supplier."_".@date('Y-m-d');
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . @date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $contents;
exit;
?>		
	
