<?php
//$tableName="tbl_purchase_order_hdr";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to ERP</title>
<link href="<?php //echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php //echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="<?php //echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php //echo base_url();?>/assets/css/menu-css/demo.css">
<!--<link rel="stylesheet" href="<?php //echo base_url();?>/assets/css/menu-css/bootstrap.min.css">-->
</head>
<body onload="window.print() " >



<table align="center"  cellpadding="0" cellspacing="0" bordercolor="#000000">
<tr>
<td><table width="100%" border="0" class="text" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="top" class="text"><span>ALL PRODUCT REPORT</span></td>
</tr>
<tr>
<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="middle">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td height="1" align="left" valign="top" class="line"></td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top"><table class="table table-striped table-bordered table-hover" border="2%" id="dataTables-example">
<thead>

 <tr>
	<tr>
		<th style="display:none"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th> 
		<th>Date.</th>   
		<th>Customer / Vendor Name</th>  
		<th>Product Name</th>   
		<th>Description</th>
		<th>Remarks</th>
		<th>Subject</th>
		<th>Ref.No.</th>
		<th>Price</th>
		<th>Status</th>
    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
<tbody>
<?php

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
   foreach(@$result->result() as $line){

?>

		<tr>						
							<?php						
							$Query=$this->db->query("select * from tbl_quotation_hdr where quotation_id_hdr='$line->quotation_id'");
						    $fetchQ=$Query->row();?>
							
							<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" value="<?php echo $line->quotation_id_dtl?>" /></td>
							<td style="width:80px;"><?php echo $line->author_date;?></td>
							<td style="width:180px;">
							<?php 
                                $sql = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ->vendor_id'");
                                $linecategory=$sql->row();		
                            ?>
                            <?php echo $linecategory->first_name;?>
                            </td>
							<td>
							  <?php $productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->product_id'");
                              $getProduct=$productQuery->row();
                              ?>
                              <?php echo $getProduct->productname;?>
                              </td>
							<td style="width: 250px;"><?php echo $line->description; ?></td> 
								
							<td><?php echo $fetchQ->remark;?></td> 
							<td><?php echo $fetchQ->subject; ?></td> 
							<td><?php echo $fetchQ->refno; ?></td> 
							<td style="width: 6%;"><?php echo $line->list_price; ?></td> 
							<td style="width: 6%;"><?php echo "Quotation"; ?></td> 			
								
    	</tr>

<?php } ?>
<?php
  
   $resultone=$this->db->query($queryyone); 
   foreach(@$resultone->result() as $fetch_list){

?>

		<tr>						
							<?php						
							$Query2=$this->db->query("select * from tbl_purchase_order_hdr where purchase_order_id='$fetch_list->purchase_order_hdr_id'");
						    $fetchQ2=$Query2->row();?>
							
							<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" value="<?php echo $fetch_list->purchase_order_dtl_id?>" /></td>
							<td style="width:80px;"><?php echo $fetch_list->author_date;?></td>
							<td style="width:180px;">
							<?php 
                                $sql2 = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ2->vendor_id'");
                                $linecategory2=$sql2->row();		
                            ?>
                            <?php echo $linecategory2->first_name;?>
                            </td>
							<td>
							  <?php $productQuery2=$this->db->query("select *from tbl_product_stock where Product_id='$fetch_list->product_id'");
                              $getProduct2=$productQuery2->row();
                              ?>
                              <?php echo $getProduct2->productname;?>
                              </td>
							<td style="width: 250px;"><?php echo $fetch_list->description; ?></td> 
								
							<td><?php echo $fetchQ2->remark;?></td> 
							<td><?php echo $fetchQ2->subject; ?></td> 
							<td><?php echo $fetchQ2->refno; ?></td> 
							<td style="width: 6%;"><?php echo $fetch_list->list_price; ?></td> 
							<td style="width: 6%;"><?php echo "Purchase Order"; ?></td> 			
								
    	</tr>
<?php } ?>

<?php
   $resulttwo=$this->db->query($queryytwo);
   foreach(@$resulttwo->result() as $fetch_data){

?>

		<tr>						
							<?php						
							$Query3=$this->db->query("select * from tbl_sales_ordernew_hdr where purchase_order_id='$fetch_data->purchase_order_hdr_id'");
						    $fetchQ3=$Query3->row();?>
							
							<td style="display:none"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" value="<?php echo $fetch_data->purchase_order_dtl_id?>" /></td>
							<td style="width:80px;"><?php echo $fetch_data->author_date;?></td>
							<td style="width:180px;">
							<?php 
                                $sql3 = $this->db->query("select * from tbl_contact_m where status ='A' and contact_id='$fetchQ3->vendor_id'");
                                $linecategory3=$sql3->row();		
                            ?>
                            <?php echo $linecategory3->first_name;?>
                            </td>
							<td>
							  <?php $productQuery3=$this->db->query("select * from tbl_product_stock where Product_id='$fetch_data->product_id'");
                              $getProduct3=$productQuery3->row();
                              ?>
                              <?php echo $getProduct3->productname;?>
                              </td>
							<td style="width: 250px;"><?php echo $fetch_data->description; ?></td> 
								
							<td><?php echo $fetchQ3->remark;?></td> 
							<td><?php echo $fetchQ3->subject; ?></td> 
							<td><?php echo $fetchQ3->refno; ?></td> 
							<td style="width: 6%;"><?php echo $fetch_data->list_price; ?></td> 
							<td style="width: 6%;"><?php echo "Sales Order"; ?></td> 			
								
    	</tr>
<?php } ?>

</tbody>
</table></td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top" class="line"></td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
</tr>
</table></td>
</tr>
</table>
</body>
</html>