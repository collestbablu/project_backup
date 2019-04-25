<?php 
$tableName="tbl_product_serial";
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

<!--left-menu-js-close-->

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
<h1>Product Quantity Report </h1> 
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
<th colspan="4"><b>Search Product Stock Report </b></th>        
</tr>
</thead>
<tr>
<td width="19%" class="text-r">
Product Name:</td>
 <td width="33%"><input type="text" name="productname" value="<?php if($_REQUEST['productname']!=''){echo $_REQUEST['productname'];}  ?>" /></td>
<td width="19%" class="text-r">
Location:</td>
<td width="29%"><input type="text" name="location" value="<?php if($_REQUEST['location']!=''){echo $_REQUEST['location'];}  ?>"/></td></tr>        
<tr>
 <td class="text-r">From Date:</td>
	<td><input type="date" name="fdate"  size="22" class="rounded" value="<?php if($_REQUEST['fdate']!=''){echo $_REQUEST['fdate'];}  ?>" /> </td>
    <td class="text-r">To Date:</td>
	<td><input type="date" name="todate"  size="22" class="rounded" value="<?php if($_REQUEST['todate']!=''){echo $_REQUEST['todate'];}  ?>" /> </td>
</tr>
<tr>
    <td class="text-r"></td>
	<td></td>
    <td class="text-r">&nbsp;</td>
	<td><input type="submit" name="Search" value="Search" class="submit" /> </td>
</tr>
</table>
<a href="print_product_quantity<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Print</strong></a>&nbsp;  <a href="export_csv_product_quantity<?php echo $_SERVER['REQUEST_URI'];?>" class="submit"><strong>Export</strong></a>
<div class="table-row">
<table class="bordered"id="dataTables-example">
    <thead>
<tr>
 	<th>Date</th>
	<th>Product Code</th>
   <th>Product Name</th>
    
    <th>Location</th>
    <th>Quantity</th>
</tr>
</thead>
	<?php
	@extract($_GET);
	if($Search!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($productname!='') {
		$productname1=$this->db->query("select * from tbl_product_stock where productname like '%$productname%'");
		$fetchproductname1=$productname1->row();
		@extract($fetchproductname1);
		$queryy.="and product_id like '$fetchproductname1->Product_id'";
		 }
		if($location!=''){
		  	$industry_idQuery1=$this->db->query("select * from tbl_location where location_name like '%$location%'");
        	$industryidFetch=$industry_idQuery1->row(); 
           
		$queryy.=" and location_id like '$industryidFetch->id'";}
		if($fdate!='')
		{
			$queryy  = $queryy . "and maker_date >='$fdate' and maker_date <='$todate'";
		}
	}
	
	if($Search=='')
	{
		$queryy="select * from $tableName where status='A'";
	
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
   
   ?>
   <tr>
 	<td><?php echo $line->maker_date;?></td>
	<td><?php echo $line->serial_code;?></td>
			<?php $productname=$this->db->query("select * from tbl_product_stock where Product_id='$line->product_id'");
		$queryname=$productname->row();
        ?>
    
	     <td><?php echo $queryname->productname; ?></td>
		
	
	 <?php 	$industry_idQuery=$this->db->query("select * from tbl_location where id='$line->location_id'");
        	$industry_idFetch=$industry_idQuery->row(); ?>
	<td><?php echo $industry_idFetch->location_name; ?></td>
	
	
	<?php $productname=$this->db->query("select * from tbl_product_serial_log where Product_id='$line->product_id'");
		$queryname=$productname->row();
        ?>
    
	     <td><?php echo $queryname->quantity; ?></td>
	
	
	<!--<td><?php echo $line->quantity; ?></td>-->
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

