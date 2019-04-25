<?php
$tableName="tbl_bill_of_material_hdr";
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
<td align="center" valign="top" class="text"><span>MACHINE PERFORMANCE REPORT</span></td>
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
	<th>Sr. No.</th>  
	<th>Machine Name</th>   
<th>Available Hrs.</th>
<th>Breakdown Hrs.</th>
<th>Hrs. Use Iin Production(As per cycle time)</th>
<th>Machine Utilization</th>
<th>Operator Efficiency</th>
    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
<tbody>
<?php

@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_wip_hdr where status='A' ";

	 	
		  if($product_name!=''){
	  	 $queryy.=" and product_name  = '$product_name'";

		  }
		  
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and date >='$fdate1' and date <='$todate1' ";
		}		  
		 
		 $queryy  = $queryy . "group by product_name";
		 
		}
if($Search==''){
		  $queryy="select * from tbl_wip_hdr where status='A' group by product_name";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){

	

?>

   	<?php	$Query=$this->db->query("select * from tbl_product_stock where product_id='$line->product_name'");
						    $fetchQ=$Query->row();
	?>														

<tr>	<?php						
							// this query is for getting machine name 
							
							$Query=$this->db->query("select * from tbl_machine where Machine_id='$line->machine_id'");
						    $fetchQ=$Query->row();
							//
							
							
							
							
							
							?>
							<td><?php echo $i;?></td>
								<td><?php echo $fetchQ->machinename;?></td>
								<td><?php echo $line->hours;?></td> 
								
								<td><?php echo $line->breakdown_hour;?></td> 
								<td><?php echo $line->act_hour; ?></td> 
								<td><?php echo $line->act_hour/$line->hours*100;?></td> 
								<td><?php echo ($line->act_hour-$line->breakdown_hour)/$line->hours*100; ?></td> 
								

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