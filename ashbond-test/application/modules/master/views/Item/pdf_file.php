<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Product List</title>
</head>

<body>
<h1><u>Product List</u></h1> 
<table width="100%" border="1">
  <tr>
    <td>Part No.</td>
    <td>HSN Code</td>
    <td>Product Name</td>
	<td>Description</td>
	<td>Category</td>
	<td>Unit</td>
	<td>Purchase Price</td>
	<td>GST Tax</td>
	<td>Sale Price</td>  
  </tr>
  <?php

@$mod_sql=$this->db->query("select * from tbl_product_stock order by Product_id desc");
$i=1;
foreach(@$mod_sql->result() as $line){
		  
   ?>
  <tr>
   <td><?php echo $line->sku_no;?></td>
                                        <td><?php echo $line->hsn_code;?></td>
										<td><?php echo $line->productname;?></td>
										<td><?php echo $line->part_no;?></td>
										
										<td>
										<?php
										$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='$line->category'");
										$res1 = $sqlgroup->row();
										
										?>
										
										<?php echo $res1->prodcatg_name;?></td>
										
										
										<td><?php $sqlgroup=$this->db->query("select * from tbl_master_data where serial_number='".$line->usageunit."'");
										$res2 = $sqlgroup->row();?>
										<?php echo $res2->keyvalue;?></td>
										<td><?php echo $line->unitprice_purchase;?></td>
                                         <td><?php echo $line->gst_tax;?></td>
										
                                       <td><?php echo $line->unitprice_sale;?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>
