<?php
$tableName="tbl_product_stock_log";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to crm</title>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
</head>
<body onload="window.print() " >
<table align="center"  cellpadding="0" cellspacing="0" bordercolor="#000000">
<tr>
<td><table width="100%" border="0" class="text" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="top" class="text"><span>Product Stock Report Log</span></td>
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

<th>Product Code</th>

<th>Product Name</th>

<th>Purchase</th>

<th>Sale</th>

<th>Available</th>    
</thead>
<tbody>
<?php

				  @extract($_GET);
	

	
	if($Search!='')

	  {

	 


//select sum(qtyinstock) as sale  from tbl_product_stock_log where mode='delete'
		    $queryy="select productname,product_code,sum(qtyinstock) as purchase from tbl_product_stock_log where mode!='delete'";


if($productname!='')
{

$queryy.=" and productname like '%$productname%'";

}
	

		   if($product_code!='')



		  {



		  



		  		  	$queryy.=" and product_code like '%$product_code%'";



		  }

 if($Product_typeid!='')



		  {



		  



		  		  	$queryy.=" and Product_typeid = '$Product_typeid'";







		  }

  if($fdate!='')

{

	 $todate=explode("-",$_REQUEST['todate']);

$fdate=explode("-",$_REQUEST['fdate']);

    $todate1=$todate[0]."-".$todate[1]."-".$todate[2];

		$fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];

  $queryy  = $queryy . "and maker_date >='$fdate1' and maker_date <='$todate1'";

}

}

			$queryy.=" group by product_code";

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

  

   
    <td><?php echo $line->product_code;?></td>

<td><?php echo $line->productname; ?></td>

                       

					    <td><?php echo 	$line->purchase ?></td>

                        

                        

                        <td><?php 

						$re = $this->db->query("select sum(qtyinstock) as sale  from tbl_product_stock_log where mode='delete' and product_code='$line->product_code';");

						//$s=$re->row();

						echo $s[0];

						?></td>

                        

                        <td>

                        <?php echo $total=$line->purchase-$s[0];?>

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
