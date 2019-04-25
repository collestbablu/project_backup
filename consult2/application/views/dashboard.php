<?php $tableName='tbl_bill_of_material_hdr';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php $this->load->view('title');?>
<link href="<?php echo base_url();?>assets/css/crm.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jsapi.js"></script>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/metisMenu.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/demo.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu-css/bootstrap.min.css">
</head>

<body>

<div class="wrapper"><!--header close-->
 
<?php $this->load->view('sidebar');?>

<div class="container-left"><!--left-menu close-->

</div><!--container-left close-->

<div id="b2" class="right-colum" style="width:95%">
<div class="right-colum-text">
<div class="table-row">
<div class="title">
<h1>
DASH BOARD LIST
</h1>
<!--
<div class="search-row-to">
<div class="search-row-l"><input type="text" readonly="readonly" placeholder="Search here..." required=""></div>
<div class="search-row-r"><button type="submit">Go</button>
</div>
</div><!--search-row-to close-->

</div>

<div class="row">
<div class="col-sm-12">
<h3>Production List</h3>
<table class="bordered" id="dataTables-example">
<thead>
<tr>
  <th>Lot No.</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
         <th>Machine Name</th>
         <th>Actual Hours</th>
         <th>Hours Taken</th>
		 <th>Machine Busy Till Date</th>
		 <th>Total Quantity</th>
       	 <th>Completed Quantity</th>
         <th>Required Quantity</th>
       	 
</tr>
</thead>
<tbody>

<?php

		  $queryy="select * from $tableName where status='A' order by bill_of_material_id_hdr desc limit 500 ";
		  
			  $result=$this->db->query($queryy);
 $i=1;
   foreach($result->result() as $line){


   ?>
  <tr class="record" data-row-id="<?php echo $line->wip_hdr_id; ?>">

  

   

                       <td><button type="button" class="btn btn-primary" onclick="return popitup('Item/production_details?&popup=True&id=<?php echo $line->serial_no;?>^Production')" ><?php echo  $line->serial_no;?></button></td>

					   <td><?php echo $pdate=$line->date; ?></td>
					  <td><?php echo $line->product_type;?></td>
                       <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
                       <?php $machineQuery=$this->db->query("select *from tbl_machine where Machine_id='$line->machine_name'");
	$getMachine=$machineQuery->row();?>
					   <td><?php echo $getMachine->machinename; ?></td>
<?php                       
                       $detailsQuery=$this->db->query("select SUM(hours) as hors,SUM(act_hour) as act_hrs from tbl_production_log where bom_id='$line->bill_of_material_id_hdr' "); 
$i=0;
$hr=0;
foreach($detailsQuery->result() as $getData)
{
$hr=$getData->hors;
$actH=$getData->act_hrs;
$i++;
}
?>
                       
                       <td><?php echo $act_val=round($actH); ?></td>
                     	<td><?php echo $hr; ?></td>
						<td style="color:#FF0000"><?php  
							echo $idate= date('Y-m-d H:i:s', strtotime($pdate. " +$act_val hours"));
						
					   ?></td>
                       <td><?php echo $line->quantity; ?></td>
					   <?php
$cntQty=$this->db->query("select SUM(quantity) as qty,SUM(rejection_qty) as rejqty from tbl_wip_log where lot_no='$line->serial_no'");
$cntfetch=$cntQty->row();



?>
					    <td><?php echo $cpmpl=$cntfetch->qty-$cntfetch->rejqty; ?></td>
                        <td><?php echo ($line->quantity)-$cpmpl; ?></td>
		</tr>
	<?php } ?>








</tbody>
</table>

</div>
</div><!--row close-->

<div class="row">
<div class="col-sm-6">
<h3>Moulding List</h3>
<table class="bordered" id="dataTables-example1">
<thead>
<tr>
</tr><tr>
<th>Lot No.</th>
<th>Date</th>
<th>Product Type</th>
<th>Product Name</th>
<th>Total Quantity</th>
<th>Completed Quantity</th>
</tr>
</thead>
<tbody>
<?php

		  $queryy="select * from $tableName where status='A' order by bill_of_material_id_hdr desc limit 5";
		  
			  $result=$this->db->query($queryy);
 $i=1;
   foreach($result->result() as $line){


   ?>
  <tr class="record" >

  

   

                       <td><button type="button" class="btn btn-primary" onclick="return popitup('Item/production_details?&popup=True&id=<?php echo $line->serial_no;?>^Moulding')" ><?php echo  $line->serial_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
					  <td><?php echo $line->product_type;?></td>
                       <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					   <td><?php echo $line->quantity; ?></td>
					   <?php
$cntQty=$this->db->query("select SUM(quantity) as qty,SUM(rejection_qty) as rejqty from tbl_wip_log where lot_no='$line->serial_no'");
$cntfetch=$cntQty->row();



?>
					    <td><?php echo $cntfetch->qty-$cntfetch->rejqty; ?></td>
		</tr>
	<?php } ?>
</tbody>
</table>
</div>

<div class="col-sm-6">
<h3>Defleshing List</h3>
<table class="bordered" id="dataTables-example1">
<thead>
<tr>
</tr><tr>
 <th>Lot No.</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
		 <th>Total Qty</th>
		 <th style="display:none">Completed Qty</th></tr>
</thead>
<tbody>




<?php

		  $queryy="select * from tbl_wip_hdr where status='A'  order by wip_hdr_id desc limit 5 ";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){
$sqlCheckQuery=$this->db->query("select *from tbl_defleshing_hdr where lot_no='$line->lot_no'");
	
	$cnt=$sqlCheckQuery->num_rows();
	//if($cnt>0){

   ?>

   <tr class="record" data-row-id="<?php echo $line->wip_hdr_id; ?>">

   
   <?php
   $sql =$this->db->query("select * from tbl_product_stock where Product_id ='".$line->product_name."'");
	$resultname = $sql->row();
	
	
   ?>

                       <td><button type="button" class="btn btn-primary" onclick="return popitup('Item/production_details?&popup=True&id=<?php echo $line->lot_no;?>^Defleshing')" ><?php echo  $line->lot_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
					  <td><?php echo  $resultname->Product_typeid;?></td>
                       <td><?php 
	
						echo $resultname->productname;
					   ?></td>
					   <td><?php echo $line->quantity; ?></td>
					    <td style="display:none"><?php echo $line->qty_made; ?></td>
					   
                       
                      
 </tr>
	<?php } //}?>
	
</tbody>
</table>
</div>
</div><!--row close-->

<div class="clear"></div>

<div class="row">
<div class="col-sm-6">
<h3>QA List</h3>
<table class="bordered" id="dataTables-example1">
<thead>
<tr>
</tr><tr>
 <th>Lot No.</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
		 <th>Total Qty</th>
</tr>
</thead>
<tbody>




<?php

		  $queryy="select * from tbl_defleshing_hdr where status='A'  order by wip_hdr_id desc limit 5 ";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){


   ?>

   <tr class="record" data-row-id="<?php echo $line->wip_hdr_id; ?>">

  

   
<?php

	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
?>
                       <td><button type="button" class="btn btn-primary" onclick="return popitup('Item/production_details?&popup=True&id=<?php echo $line->lot_no;?>^QA')" ><?php echo  $line->lot_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
					  <td><?php echo  $resultname->Product_typeid;?></td>
                       <td><?php
						echo $resultname->productname;
					   ?></td>
					   <td><?php echo $line->quantity; ?></td>
                       
                      
                        
</tr>
	<?php } ?>
</tbody>
</table>
</div>

<div class="col-sm-6">
<h3>Packing List</h3>
<table class="bordered" id="dataTables-example1">
<thead>
<tr>
</tr><tr>
<th>Lot No.</th>
        <th>Date</th>
		<th>Product Type</th>
        <th>Product Name</th>
		 <th>Quantity</th></tr>
</thead>
<tbody>

<?php

		  $queryy="select * from tbl_bill_of_material_hdr where status='A' and approval_status='Approved' order by bill_of_material_id_hdr desc limit 5 ";
		  
			  $result=$this->db->query($queryy);
 
   foreach($result->result() as $line){
$sqlCheckQuery=$this->db->query("select *from tbl_qa_hdr where lot_no='$line->serial_no'");
	
	$cnt=$sqlCheckQuery->num_rows();
	if($cnt>0){

?>
   <tr class="record" data-row-id="<?php echo $line->wip_hdr_id; ?>">

   

   

                       <td><button type="button" class="btn btn-primary" onclick="return popitup('Item/production_details?&popup=True&id=<?php echo $line->serial_no;?>^Packing')" ><?php echo  $line->serial_no;?></button></td>

					   <td><?php echo $line->date; ?></td>
					  <td><?php echo $line->product_type;?></td>
                       <td><?php 
	$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
	$resultname = $sql->row();
						echo $resultname->productname;
					   ?></td>
					   <?php
					   $qtyQuery=$this->db->query("select *from tbl_defleshing_hdr where lot_no='$line->serial_no'");
					   $getQty=$qtyQuery->row();
					   
					   ?>
					   <td><?php echo $getQty->quantity; ?></td>
                       
                      
                        
</tr>
	<?php } }?>

</tbody>
</table>
</div>
</div><!--row close-->



</div><!--title close-->

<div class="container-right-text" >

</div><!--two-colum-->


</div><!--two-colum-->
</div><!--paging-row close-->
<!--paging-row close-->
</div><!--container-right-text close-->
</div><!--container-right close-->
</div><!--container close-->

<div class="clear"></div><!--footer--row close-->
<?php $this->load->view("softwarefooter.php"); ?>




</div><!--wrapper close-->
<script language="javascript" type="text/javascript">

function popitup(url) {
newwindow=window.open(url,'name','height=400,width=1200');
if (window.focus) {newwindow.focus()}
return false;
}


</script>