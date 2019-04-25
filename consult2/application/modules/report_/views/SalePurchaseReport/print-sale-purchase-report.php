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
<td align="center" valign="top" class="text"><span>PRODUCTION PLANNING Report</span></td>
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
		<th>Item Name</th>   
<th>Quantity</th>
<th>Unit</th>
<th>Gross Weight</th>
<th>Net Weight</th>
<th>Runner Weight</th>
    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
<tbody>
<?php


@extract($_GET);

if(@$Search!=''){

	  $queryy="select * from tbl_bill_of_material_hdr where status='A'";

	 	 if($Product_typeid!=''){
		
	  	$queryy.=" and product_type like '%$Product_typeid%'";

		  }
		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and serial_no like '%$serial_no%'";

		  } 

		}
		if($Search==''){
		  $queryy="select * from tbl_bill_of_material_hdr where status='A'";
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

   	<?php	$sql1 = $this->db->query("select * from tbl_bill_of_material_dtl where bill_of_material_hdr_id='$line->bill_of_material_id_hdr'");
					   			foreach($sql1->result() as $fetch){
	?>														
<tr>	<?php						
							$Query=$this->db->query("select * from tbl_product_stock where product_id='$fetch->item_name'");
						    $fetchQ=$Query->row();?>
							
								<td><?php echo $fetchQ->productname;?></td>
								<td><?php echo $fetch->quentity;?></td> 
								<td><?php echo $fetch->unit;?></td> 
								<td><?php echo $fetch->gross_weight;?>KG</td> 
								<td><?php echo $fetch->net_weight;?>KG</td> 
								<td><?php echo $fetch->scrap_weight;?>KG</td> 
								

    </tr>

	<?php } } ?>

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