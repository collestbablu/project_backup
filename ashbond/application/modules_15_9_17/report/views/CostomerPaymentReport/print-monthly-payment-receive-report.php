<?php
$tableName="tbl_invoice_payment";
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
<td align="center" valign="top" class="text"><span>Payment Received Report</span></td>
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
	
   <th width="13%">Customer Name</th>
	<th width="24%"> Amount</th>
	<th>Received Amount</th>
	<th width="28%"> Opening Balance </th>
    </tr>
</thead>
<tbody>
<?php
	  @extract($_GET);
	 if($Search!='')
	{
		$queryy="select * from $tableName where status='paymentReceived'";
		
		 if($productname!=''){
	       	
	//echo $productname;die;
										
	   $queryy = $queryy. " and contact_id = $productname ";
	   }
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy.=" and maker_date >='$fdate1' and maker_date <='$todate1'";
		}
		
		  $queryy  = $queryy . " GROUP BY contact_id";
	}
	
	if($Search=='')
	{
		
		 $queryy="select * from $tableName where status='paymentReceived' GROUP BY contact_id";
		
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
   	
	
	<td >
	<?php 
		$sql = $this->db->query("select * from tbl_contact_m where group_name ='4' and contact_id='$line->contact_id'");
		$linecategory=$sql->row();
			echo $linecategory->first_name;
		
	?>
	
	</td>
  
	<td><?php
	$b1=$this->db->query("select sum(receive_billing_mount) as sum1 from $tableName where contact_id ='".$line->contact_id."' and status='invoice' ") ;
 $b2 = $b1->row();
 echo $b = $b2->sum1;
	
	?></td>
    	

  <td><?php 
  
   $a1=$this->db->query("select sum(receive_billing_mount) as sum1 from $tableName where contact_id ='".$line->contact_id."' and status='paymentReceived'");
	 $a2=$a1->row();
	echo $a = $a2->sum1;
	
  ?></td>

	<td><?php echo  $b-$a;?></td>

    </tr>
<?php
$i++;
 } ?>
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
