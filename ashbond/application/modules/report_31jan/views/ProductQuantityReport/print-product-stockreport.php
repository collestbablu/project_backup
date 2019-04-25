<?php
$tableName="tbl_new_invoice";
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
<link rel="stylesheet" href="<?php //echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
</head>
<body onload="window.print() " >



<table align="center"  cellpadding="0" cellspacing="0" bordercolor="#000000">
<tr>
<td><table width="100%" border="0" class="text" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="top" class="text"><span>Sale Records</span></td>
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
<th>Sl. No.</th>   
<th>Invoice No. & Date</th>
<th>S.O. No. & Date</th>
<th>Customer</th>
<th>Description</th>
<th>Basic Amount</th>
<th>GST</th>
<th>Total Amount</th>
<th>Payment Details</th>
</tr>
</thead>
	<?php
	@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where choose_status='A'";
		if($contact_id!=''){
						
							$queryy.="and contact_id='$contact_id'";
			 		}
		
		
		if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and n_date >='$fdate1' and n_date <='$todate1'";
		}
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where choose_status='A'";
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
   
							
								<td style="width:7%"><?php echo $i;?></td>
								<td><?php echo $line->invoice_no." & ".$line->n_date;?></td> 
								<td><?php echo $line->so_no." & ".$line->so_date;?></td> 
								<td><?php 
										 $contQuery=$this->db->query("select * from tbl_contact_m where contact_id='$line->contact_id'");
										 $contRow=$contQuery->row();
								echo $contRow->first_name.' '.$contRow->middle_name.' '.$contRow->last_name;?></td> 
								 <td><?php 
								
								$cateQuery=$this->db->query("select * from tbl_new_case where case_id='$line->case_id'");
								$categoryRow=$cateQuery->row();
								
								echo $categoryRow->category_name;?></td>
								<td><?php echo $line->basic_amt;?></td>
								<td><?php echo $line->tax;?></td>
								<td><?php echo $line->total_amt;?></td>
								<td><?php echo $line->payment_status;?></td> 
								

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
