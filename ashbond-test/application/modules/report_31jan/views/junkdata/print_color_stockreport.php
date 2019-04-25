<?php
$tableName="tbl_product_stock";
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
		<th>Serial No:</th>
		<th>Product Code</th>
        <th>Product Name</th>
        <th>Usage Unit</th>
		<th>Color</th>
        <th>Quantity</th>
		<th>Quantity In Stock</th>
    </tr>
	<!--<th>Unit In Stock</th>-->
</thead>
<tbody>
<?php


@extract($_GET);

if(@$Search!=''){

	  $queryy="select * from tbl_product_stock where status='A'";

		    if($productname!=''){
	  	$queryy.=" and productname like '%$productname%'";

		  }

	   if($product_code!='')
		  {
		$proQ1=$this->db->query("select * from tbl_product_serial where serial_code like '%$product_code%'");
		$fProQ1=$proQ1->row();
		$pro=$fProQ1->product_id;
	  	$queryy.=" and Product_id='$pro'";

		  }

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

  

<tr>
<td><?php echo $srn++;?></td>
<td><?php
		$proQ=$this->db->query("select * from tbl_product_serial where product_id='$line->Product_id'");
		$fProQ=$proQ->row();
 echo $fProQ->serial_code;?></td>
<td><?php echo $line->productname;?></td>
<?php
		$proQ1=$this->db->query("select * from tbl_master_data where serial_number='$line->usageunit'");
		$fProQ12=$proQ1->row();
 $fProQ->serial_code;?>
<td><?php echo $fProQ12->keyvalue;?></td>
 
 
<td><?php 

$array=$line->color;      // explode function is used to print the color name



 $g= explode(",", $array);
 
 //print_r($g);die;
 
 for($m=0;$m<count($g);$m++)
 {
 
 
 //echo $m;
 //echo "select * from tbl_master_data where serial_number='$g[$m]'";
 $proQ1=$this->db->query("select * from tbl_master_data where serial_number='$g[$m]'");
		$fProQ12=$proQ1->row();
 echo $fProQ12-> keyvalue. " | " ;
 
 
 } ?></td>



<td>
<?php  


 $g= explode(",", $array);
 
// print_r($g);die;
 
	 for($m=0;$m<count($g);$m++)
 {
//echo  "select sum(quantity) as nat from tbl_product_serial_log where product_id='$line->Product_id' and color='$g[$m]'";
$proQ123=$this->db->query("select sum(quantity) as nat from tbl_product_serial_log where product_id='$line->Product_id' and color='$g[$m]'");
	$fProQ122=$proQ123->row();
 echo $fProQ122->nat. " | " ;
 
  } ?>
 

</td>
<td>

<?php

$proQ123=$this->db->query("select sum(quantity) as qstock from tbl_product_serial_log where product_id='$line->Product_id'");   //added quantity stock
	$fProQ122=$proQ123->row();
 echo $fProQ122->qstock;
 
   ?>

</td>


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