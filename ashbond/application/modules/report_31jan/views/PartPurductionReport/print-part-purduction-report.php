<?php
$tableName="tbl_purchase_order_hdr";
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
<td align="center" valign="top" class="text"><span>PURCHASE ORDER REPORT</span></td>
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
		<th>P.O NO.</th>  
		<th>P.O Date</th>   
		<th>Vendor</th>
		<th>S.O NO.</th>
		<th>DOD OF P.O</th>
		<th>DOD OF S.O</th>
		<th>S.O Value</th>
		<th>P.O Value</th>
		<th>Remarks</th>
    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
<tbody>
<?php

@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_purchase_order_hdr where status='A' ";

	 	
		  if($po_no!=''){
	  	 	$queryy.=" and refno = '$po_no'";

		  }
		  
		  if($customer_name!=''){
	  	 	$queryy.=" and vendor_id = '$customer_name'";

		  }
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and delivery_date >='$fdate1' and delivery_date <='$todate1' ";
		}		  
		 
		 
		}
if($Search==''){
		  $queryy="select * from tbl_purchase_order_hdr where status='A'";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){

	

?>

<tr>	

							<td><?php echo $line->refno;?></td>
								<td style="width: 8%;"><?php echo $line->delivery_date;?></td>
								<td><?php 
								 $contQuery=$this->db->query("select * from tbl_contact_m where status='A' and contact_id='$line->vendor_id'");
					 			 $contRow=$contQuery->row();
								
								echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name; ?></td> 
								
								<td><?php
								 $saleQuery=$this->db->query("select * from tbl_sales_ordernew_hdr where case_id='$line->case_id'");
					 			 $saleRow=$saleQuery->row();
								
								 echo $saleRow->ponew_no;?></td> 
								<td><?php echo $line->vendor_dod; ?></td> 
								<td><?php echo $saleRow->ponew_date; ?></td> 
								<td style="width: 8%;"><?php echo $saleRow->grand_total; ?></td> 
								<td style="width: 8%;"><?php echo $line->grand_total; ?></td> 
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