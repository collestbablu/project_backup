<?php
$tableName="tbl_product_stock";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to CRM</title>
<link href="<?php echo base_url();?>/assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
<script src="<?php echo base_url();?>/assets/js/menu-js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/menu-js/metisMenu.min.js"></script>

<script>

    $(function () {



        $('#menu').metisMenu();



        $('#menu2').metisMenu({

            toggle: false

        });



         $('#menu3').metisMenu({

            doubleTapToGo: true

        });

    });

</script>
<script>
function popupclose(){
window.close();
}
</script>
</head>
<body>
<div class="wrapper"><!--header close-->
<div class="clear"></div>
<div class="container"> 
<?php $this->load->view('sidebar'); ?>
<div class="container-left"><!--left-menu close-->
</div><!--container-left close-->
<div id="b2" class="right-colum">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>Sale Purchase Report </h1> 
<div class="actions">
<div class="blogroll">
</div>
</div><!--actions close-->
<div class="search-row-to">
</div><!--search-row-to close-->
<div class="clear"></div>
</div><!--title close-->

<div class="container-right-text">
<div id="container">
<div>
<div class="table-row">

<form method="get">
<table class="bordered">
<thead>
<tr>
<th colspan="4"><b>Search Sale Purchase Report </b></th>        
</tr>
</thead>
<td width="19%" class="text-r">Product Name:</td>
<td width="33%"><input type="text" name="productname" value="<?php if($_REQUEST['productname']!=''){echo $_REQUEST['productname'];}  ?>" /></td>
<td width="19%" class="text-r">Product Code:</td>
<td width="29%"><input type="text" name="product_code" value="<?php if($_REQUEST['product_code']!=''){echo $_REQUEST['product_code'];}  ?>"/></td></tr>  
<tr>
 <td class="text-r">&nbsp;</td>
	<td>&nbsp;</td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>

<a href="print_sale_purchase_report<?php echo $_SERVER['REQUEST_URI'];?>" target="_blank" class="submit"><strong>Print</strong></a>&nbsp; | <a href="export_csv_sale_purchase_report<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>

<div class="table-row">
<table class="bordered"id="dataTables-example">
    <thead>
    <tr>
		<th>Serial No:</th>
		<th>Product Code</th>
        <th>Category</th>
        <th>Product Name</th>
        <th>Usage Unit</th>
		<th>Unit Price Purchase</th>
        <th>Unit Price Sale</th>
        <th>Total Purchase Qty.</th>
        <th>Total Sale Qty.</th>
		<th>Total Quantity</th>
    </tr>
    </thead>
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

?>

<tr>
<td><?php echo $srn++;?></td>
<td><?php echo $line->sku_no;?></td>
<td><?php 
	$sql1 = $this->db->query("select * from tbl_prodcatg_mst where prodcatg_id='".$line->category."' ");
			$sql2 = $sql1->row();
			echo $sql2->prodcatg_name;
		?>
</td>
<td><?php echo $line->productname;?></td>
<?php
		$proQ1=$this->db->query("select * from tbl_master_data where serial_number='$line->usageunit'");
		$fProQ12=$proQ1->row();
 $fProQ->serial_code;?>
<td><?php echo $fProQ12->keyvalue;?></td>
<td><?php echo $line->unitprice_purchase;?></td>
<td><?php echo $line->unitprice_sale;?></td>
<td><?php 
	$sqlqnty = $this->db->query("select sum(quantity) as qty from tbl_product_serial_log where product_id = '".$line->Product_id."'");
	$sqlqnty1 = $sqlqnty->row();
 echo $a = $toal_sale = $sqlqnty1->qty;
 
 $sqlqnty1 = $this->db->query("select sum(qty) as qty from tbl_invoice_dtl where productid = '".$line->Product_id."'");
	$sqlqnty12 = $sqlqnty1->row();
 
 ?></td>
<td><?php echo $b = $sqlqnty12->qty;?></td>
<td><?php echo $a-$b; ?></td>
</tr>
<?php } ?>
</table>
</form>
<div class="clear"></div>
</div><!--table-row close-->
</div><!--div close-->
</div><!--container close-->
</div><!--paging-right close-->
</div><!--paging-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->
<div class="clear"></div><!--footer--row close-->
</div><!--wrapper close-->

    <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>/assets/js/sb-admin.js"></script>
    <script>

    $(document).ready(function() {

        $('#dataTables-example').dataTable();

    });

    </script>

</body>
</html>