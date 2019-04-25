<?php
$tableName="tbl_product_stock";
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
<td align="center" valign="top" class="text"><span>PRICE AFTER GST REPORT</span></td>
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
		<th>Serial No:</th>
		<th>Part No</th>
		<th>HSN Code</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Category</th>
		<th>Unit</th>
        <th>Purchase Price</th>
		<th>Gst Tax</th>
		<th>Sale Price</th>
		<th>Remarks</th>
    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
<tbody>
<?php

@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_product_stock where status='A' ";

	 	
		  if($po_no!=''){
	  	 	$queryy.=" and Product_id = '$po_no'";

		  }
		  
		
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1' ";
		}		  
		 
		 
		}
if($Search==''){
		  $queryy="select * from tbl_product_stock where status='A'";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){

	

?>

<tr>
<td><?php echo $i;?></td>
<td><?php echo $line->sku_no;?></td>
<td><?php echo $line->hsn_code;?></td>
<td><?php echo $line->productname;?></td>
<td><?php echo $line->part_no;?></td>
<td><?php 
	$sql1 = $this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='".$line->category."' ");
			$sql2 = $sql1->row();
			echo $sql2->prodcatg_name;
		?>
</td>
<?php
		$proQ1=$this->db->query("select * from tbl_master_data where serial_number='$line->usageunit'");
		$fProQ12=$proQ1->row();
 $fProQ->serial_code;?>
<td><?php echo $fProQ12->keyvalue;?></td>
<td><?php echo $line->unitprice_purchase;?></td>
<td><?php echo $line->gst_tax; ?></td>
<td><?php echo $line->unitprice_sale; ?></td>
<td>&nbsp;</td>
</tr>

<?php
$i++;
 } ?>

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