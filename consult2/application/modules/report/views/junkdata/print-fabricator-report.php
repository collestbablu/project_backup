<?php
$tableName="tbl_production_dtl";
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
<!--<link rel="stylesheet" href="<?php //echo base_url();?>/assets/css/menu-css/bootstrap.min.css">-->
</head>
<body onload="window.print() " >



<table align="center"  cellpadding="0" cellspacing="0" bordercolor="#000000">
<tr>
<td><table width="100%" border="0" class="text" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="top" class="text"><span>Product Color Stock Report</span></td>
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
	<th>Date</th>
	<th>Invoice Code</th>
	<th>Fabricator Name</th>
	<th>Product Code</th>
   <th>Product Name</th>
    <th>Quantity</th>
    <th>Completed Quantity</th>
    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
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
		if($casno!=''){
		$ss =array();
	
		  	$industry_idQuery1=$this->db->query("select * from tbl_production_hdr where caseno like'%$casno%'");
        	foreach($industry_idQuery1->result() as $industryidFetch){
			
			
		
			$ss[]=$industryidFetch->invoiceid;
			$aa=implode(',',$ss);
		
			} 
     if($aa!=''){
		$queryy.=" and invoice_id in ($aa)";
	 }else{
		$queryy.=" and invoice_id in (NULL)";
		}
		}
		if($fdate!='')
		{
			$queryy  = $queryy . "and maker_date >='$fdate' and maker_date <='$todate'";
		}
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where status='A'";
	
	}
	
?>
 <!--Report Genration  part ended--> 
	
<?php 	
	
	$results=$this->db->query($queryy);
	//echo $queryy;
	$i=$start;
	$j=1;
	foreach($results->result() as $line){
	$i++;
    if($i%2!=0){
	$color='#ECE9D8';
	}else{
   	$color='#F1FEFD';
   }
   
   ?>
   
<!--Report output part Start-->    
   <tr>
   
   
   
   
 	<td><?php echo $line->maker_date;?></td>
	<td><?php echo $line->invoice_dtl_id;?></td>
	<td><?php 
					  	
						  $Query1=$this->db->query("select * from tbl_production_hdr where invoiceid='$line->invoice_id'"); 
						  $fetchQ1=$Query1->row();		
					  //echo "select * from tbl_contact_m where contact_id='".$line->fabricator."'";die; 
					  	  $Query=$this->db->query("select * from tbl_contact_m where contact_id='$fetchQ1->fabricator'"); 
						$fetchQ=$Query->row();
					    echo $fetchQ->first_name; ?></td>
	
	<td><?php echo $line->product_id; ?></td>
	
<td><?php 
					   			 $QueryP=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
						$fetchQP=$QueryP->row();
					   		   echo $fetchQP->productname; ?></td>
		
		<td><?php echo $line->qnty;?></td>	
		<td><?php echo $line->quantity_ready;?></td>	
	
	 </tr>
	<?php } ?> 
	
 <!--Report output part Ended--> 	
	
	
	    
</table>
</td>
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