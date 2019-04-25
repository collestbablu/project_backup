<?php
$tableName="tbl_invoice_hdr";
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
<td align="center" valign="top" class="text"><span>Invoice Report</span></td>
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
 <th>Invoice No</th>
		<th>Customer Name</th>
        <th>Invoice Date</th>
		<th>SERVICE TAX</th>
		<!--<th>Balance</th>-->
        <th>Grand Total</th>
</thead>
<tbody>
<?php
	  @extract($_GET);
	  $tt=0;
	if(@$Search!=''){

 		$queryy="select * from $tableName where status='Invoice done'";
		    if($invoice_no!=''){
		  		  	$queryy.=" and invoiceid like '%$invoice_no%'";

		  }
	if($fdate!='')
		{
			$todate=explode("/",$_REQUEST['todate']);
			$fdate=explode("/",$_REQUEST['fdate']);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
 
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



   ?>
 <tr>
  
                    <td><?php echo $line->invoiceid;?></td>
					  <td><?php
					  
					   $contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->contactid'");
					   $contactFetch=$contactQuery->row();
					    echo $contactFetch->first_name." ".$contactFetch->last_name;
					   
					  ?></td>
					   <td><?php echo $line->invoice_date; ?></td>
					    <td><?php echo 			   
			     			number_format((float)$line->service_tax, 2, '.', '');
			   			?></td>
					   
                          <!--<td><?php //echo number_format((float)$line->balance_total, 2, '.', '');
						 ?></td>-->
						  <td><?php echo
						 $gg = number_format((float)$line->grand_total, 2, '.', '');
						 $tt = $tt +$gg;
						 ?></td>
             </td></tr>
<?php } ?>
</tr>
<tr>
<td colspan = "4" align="right">Grand Total:-</td>
<td><?php echo number_format((float) $tt, 2, '.', '');; ?></td>

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
