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
<td align="center" valign="top" class="text"><span>PART PRODUCTION REPORT</span></td>
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
	<th>Part Name</th>   
<th>Moulding</th>
<th>Defeleshing Quantity</th>
<th>Inspection</th>
<th>Packing</th>

    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
<tbody>
<?php

@extract($_GET);

if(@$Search!=''){

	   $queryy="select * from tbl_production_log where status='A' ";

	 	
		  if($product_name!=''){
	  	 $queryy.=" and p_id  = '$product_name'";

		  }
		  
		 
		  
		  
	if($fdate!='')
		{
			$todate=explode("/",$todate);
			$fdate=explode("/",$fdate);
			$todate1=$todate[0].$todate[1].$todate[2];
			$fdate1=$fdate[0].$fdate[1].$fdate[2];
			$queryy  = $queryy . "and date >='$fdate1' and date <='$todate1' ";
		}		  
		 
		 $queryy  = $queryy . "group by p_id";
		 
		}
if($Search==''){
		  $queryy="select * from tbl_production_log where status='A' group by p_id";
}		

		  $result=$this->db->query($queryy);

		   $i=1;

   
   foreach(@$result->result() as $line){

	

?>

<tr>	<?php						
							$Query=$this->db->query("select * from tbl_product_stock where product_id='$line->p_id'");
						    $fetchQ=$Query->row();
							
							
							$Query1=$this->db->query("select SUM(quantity) as Msum from tbl_production_log where p_id='$line->p_id' and stage='Moulding'");
						    $fetchQ1=$Query1->row();
							
							$Query2=$this->db->query("select SUM(quantity) as Dsum from tbl_production_log where p_id='$line->p_id' and stage='Defleshing'");
						    $fetchQ2=$Query2->row();
							$Query3=$this->db->query("select SUM(quantity) as Psum from tbl_production_log where p_id='$line->p_id' and stage='Packing'");
						    $fetchQ3=$Query3->row();
							
							$Query4=$this->db->query("select SUM(quantity) as Qsum from tbl_production_log where p_id='$line->p_id' and stage='QA'");
						    $fetchQ4=$Query4->row();
							
							?>
<tr>	<td><?php echo $i;?></td>
								<td><?php echo $fetchQ->productname;?></td>
								<td><?php echo $fetchQ1->Msum;;?></td> 
								
								<td><?php echo $fetchQ2->Dsum; ?></td> 
								<td><?php echo $fetchQ4->Qsum; ?></td> 
								<td><?php echo $fetchQ3->Psum; ?></td> 
								

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