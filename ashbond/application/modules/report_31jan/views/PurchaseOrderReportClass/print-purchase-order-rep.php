<?php
$tableName="tbl_defleshing_hdr";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to crm</title>
<link href="<?php //echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php //echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="<?php //echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php //echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php //echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
</head>
<body onload="window.print() " >
<table align="center"  cellpadding="0" cellspacing="0" bordercolor="#000000">
<tr>
<td><table width="100%" border="0" class="text" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="top" class="text"><span>QA Report</span></td>
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
<th>Lot No</th><th>Finish Goods</th><th>Unit</th><th>Total Qty</th><th>Completed Qty</th><th>Rejected Qty</th>
</thead>
<tbody>
<?php
	  @extract($_GET);
	  $tt=0;
	if(@$Search!=''){

	  $queryy="select * from tbl_defleshing_hdr where status='A'";

	 	 if($Product_typeid!=''){
		
	  	$queryy.=" and product_type like '%$Product_typeid%'";

		  }
		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and lot_no like '%$serial_no%'";

		  } 

		}
if($Search=='')
	{
		$queryy="select * from $tableName ";
		}
		  @$result=$this->db->query($queryy);
   $i=$start;
    $j=1;
   foreach(@$result->result() as $line){
   $i++;
   if($i%2!=0){
   	$color='#ECE9D8';
   }else{
   	$color='#F1FEFD';
   }
   


   @extract($line);

	$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->product_name'");
	$getproduct=$productQuery->row();
	
	$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
	$getunit=$unitQuery->row();
	?>	
	<tr>
	
	<td>
	
	<input type="text" name="lot_no" id="lot_no" value="<?php echo $line->lot_no; ?>" readonly="" />
	
	
	<input value="<?php echo $line->date; ?>" id="date" name="date" style="display:none" />
	 
	</td>
	<?php
	$qaQuery=$this->db->query("select SUM(rejection_qty) as rejQty,SUM(quantity) as comQty from tbl_qa_hdr where lot_no='$line->lot_no'");
	$getData=$qaQuery->row();
	
	?>
	<td>
	<input type="hidden" name="p_id" value="<?php echo $getproduct->Product_id; ?>" id="p_id" readonly="" />
	<input type="text" name="p_idp" value="<?php echo $getproduct->productname; ?>" id="p_id" readonly="" />
	
	</td>
	<td><input type="text" name="net_weight" readonly value="<?php echo $getunit->keyvalue; ?>"></td>
	
	<td><input type="text" name="totQty" readonly value="<?php echo $line->quantity; ?>"></td>
	<td><input type="text" name="com_qty" readonly value="<?php echo $line->quantity-$getData->rejQty; ?>"></td>
	<td><input type="text" name="com_qty1" readonly value="<?php echo $getData->rejQty; ?>"></td>
	
	</tr>
<?php } ?>
</tr>
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
