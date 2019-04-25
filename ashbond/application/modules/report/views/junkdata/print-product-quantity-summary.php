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
<td align="center" valign="top" class="text"><span>Product Quantity Report</span></td>
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
 	<th>Date</th>
	<th>Product Code</th>
   <th>Product Name</th>
    
    <th>Location</th>
    <th>Quantity</th>
</tr></thead>
<tbody>
	<?php

	@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($productname!='') {
		$productname1=$this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
		$fetchproductname1=$productname1->row();
		@extract($fetchproductname1);
		$queryy.="and product_id like '$fetchproductname1->Product_id'";
		 }
		if($location!=''){
		  	$industry_idQuery1=$this->db->query("select * from tbl_location where location_name like '%$location%'");
        	$industryidFetch=$industry_idQuery1->row(); 
           
		$queryy.=" and location_id like '$industryidFetch->id'";}
		if($fdate!='')
		{
			$queryy  = $queryy . "and maker_date >='$fdate' and maker_date <='$todate'";
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
 	<td><?php echo $line->maker_date;?></td>
	<td><?php echo $line->serial_code;?></td>
			<?php $productname=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
		$queryname=$productname->row();
        ?>
      
	     <td><?php echo $queryname->productname; ?></td>
		
	
	 <?php 	$industry_idQuery=$this->db->query("select * from tbl_location where id='$line->location_id'");
        	$industry_idFetch=$industry_idQuery->row(); ?>
	<td><?php echo $industry_idFetch->location_name; ?></td>
	<td><?php echo $line->quantity; ?></td>
    </tr>
	<?php } ?>     

	       

</table>
</body>
</html>
