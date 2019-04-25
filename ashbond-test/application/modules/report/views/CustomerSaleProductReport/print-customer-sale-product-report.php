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
<td align="center" valign="top" class="text"><span>SALE ORDER</span></td>
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
		<th>Sale Order No.</th>
		<th>Sale Order Date</th>
		<th>Customer</th>
		<th>Description</th>
		<th>Amount</th>
		<th>GST</th>
		<th>Total Amount</th>
    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
<tbody>
<?php


@extract($_GET);

if(@$Search!=''){

	  $queryy="select * from tbl_sales_ordernew_hdr where status='A'";

	 	 if($contact_id!=''){
		
	  	$queryy.=" and vendor_id ='$contact_id'";

		  }
		 
		 if($fdate!='')
		{
		
			$todate=explode("-",$todate);
			
			$fdate=explode("-",$fdate);

			$todate1=$todate[0]."-".$todate[1]."-".$todate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy  = $queryy . "and delivery_date >='$fdate1' and delivery_date <='$todate1'";
		}
		 
		}
		if($Search==''){
		 		  $queryy="select * from tbl_sales_ordernew_hdr where status='A'";

}		


		  $result=$this->db->query($queryy);

		   $i=$start;

    $j=1;

    $srn=1;
   foreach(@$result->result() as $line){

	$i++;

  if($i%2!=0){

   	$color='#ECE9D8';

   }else{

   	$color='#F1FEFD';

   }



   @extract($line);




   ?>

   													
<tr>	<?php						
							$Query=$this->db->query("select * from tbl_contact_m where contact_id='$line->vendor_id'");
						    $fetchQ=$Query->row();?>
							
								<td><?php echo $i;?></td>
								<td><?php echo $line->ponew_no;?></td> 
								<td><?php echo $line->delivery_date;?></td> 
								<td><?php echo $fetchQ->first_name;?></td> 
								<td><?php 
								$cateQuery=$this->db->query("select * from tbl_new_case where case_id='$line->case_id'");
								$categoryRow=$cateQuery->row();
								
								echo $categoryRow->category_name;
								
								?></td> 
								<td><?php //echo $line->scrap_weight;?></td>
								<td><?php //echo $line->scrap_weight;?></td>
								<td><?php echo $line->grand_total;?></td> 
								

    </tr>

	<?php  } ?>

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