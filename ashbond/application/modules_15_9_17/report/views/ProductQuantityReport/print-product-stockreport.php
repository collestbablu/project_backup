<?php
$tableName="tbl_product_serial_log";
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
<td align="center" valign="top" class="text"><span>Product Serial Report Log</span></td>
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
<th>Serial No:</th>
<th>Date</th>
<th>Product Code</th>
<th>Category</th>
<th>Product Name</th>
<th>Quantity</th>
<th>Location</th>
</tr>
</thead>
	<?php
	@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($productname!='') {
			$proNameQ1 = $this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
			$fproNQ1 = $proNameQ1->row();
	        $proid = $fproNQ1->Product_id;
		
		$queryy.=" and product_id='$proid'";
		 
		 }
		if($product_code!=''){
		
		$queryy.=" and serial_code like '%$product_code%'";
		
		}
		//echo $todate;die;
		if($fdate!='')
		{
			$todate=explode("/",$_REQUEST['todate']);
			$fdate=explode("/",$_REQUEST['fdate']);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where status='A'";
		}
	$result=$this->db->query($queryy);
	//echo $queryy;
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
   ?>
   
   <tr>
   	<td><?php echo $i;?></td>
	<td><?php echo $line->maker_date;?></td>
    <?php  $proNameQ1=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
			$fproNQ1=$proNameQ1->row();	
		?>
	<td><?php echo $fproNQ1->sku_no;?></td>
        	<td>
    	<?php 
			
	$sql1 = $this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='".$fproNQ1->category."' ");
			$sql2 = $sql1->row();
			echo $sql2->prodcatg_name;
		?>
    </td>

    <td><?php 
			$proNameQ=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
			$fproNQ=$proNameQ->row();
	echo $fproNQ->productname;?></td>
	
<!--	<td><?php 
	
/*	$qurty1=$this->db->query("select * from tbl_master_data where serial_number='$line->color'");
	$qq1 = $qurty1->row();
	echo $qq1->keyvalue; */
	?> --></td>
	<td><?php echo $line->quantity;
	
	$tt = $tt + $line->quantity;
	?></td>
	<td><?php
			$locQ=$this->db->query("select * from tbl_location where id='$line->location_id'");
			$flocQ=$locQ->row();
	 echo $flocQ->location_name; ?></td>

    </tr>

	<?php } ?>
	<tr>
	<td colspan="5" align="right">Total:-</td>
	<td colspan = "2"><?php  echo $tt;?></td>
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
