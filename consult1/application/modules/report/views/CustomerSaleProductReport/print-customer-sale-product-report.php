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
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/menu-css/bootstrap.min.css">
</head>
<body onload="window.print() " >
<div class="container">
<div class="row">
<div class="col-md-12">
<h4>MOULDING LIST Report</h4>
<table class="table table-striped table-bordered table-hover" border="2%" id="dataTables-example">

<thead>
<tr>
<th>Lot. No</th>
<th>Date</th>
<th>Product Type</th>
<th>Product Name</th>
<th>Quantity</th> 
</thead>
<tbody>
<?php
@extract($_GET);
$tt=0;
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
@$result=$this->db->query($queryy);
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
<td><?php echo  $line->serial_no;?></td>

<td><?php echo $line->date; ?></td>
<td><?php echo $line->product_type;?></td>
<td><?php 
$sql =$this->db->query("select * from tbl_product_stock where sku_no ='".$line->product_name."'");
$resultname = $sql->row();
echo $resultname->productname;
?></td>
<td><?php echo $line->quantity; ?></td>


</tr>
<?php  } ?>

</tr>
</tbody>
</table>
</div>

<div class="col-md-12">
<h4>Raw Material</h4>
<table class="table table-striped table-bordered table-hover" border="2%" id="dataTables-example">
<thead>
<tr>
<th>Item Name</th>   
<th>Quantity</th>
<th>Unit</th>
<th>Gross Weight</th>
<th>Net Weight</th>
<th>Runner Weight</th>

</thead>
<tbody>
<?php
@extract($_GET);
$tt=0;
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
@$result=$this->db->query($queryy);
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

</tr>
</tbody>
</table></td>
</div>
</div>

<div class="row">
<h4>Work In Progress</h4>
<div class="col-md-12">
<table class="table table-striped table-bordered table-hover" border="2%" id="dataTables-example">

<thead>
<tr>
<th>Date</th>
<th>Finish Goods</th>
<th>Unit</th>
<th>Machine Name</th>
<th>Shift</th> 
<th>Supervisor</th> 
<th>Operator</th> 

<th>Hours</th> 
<th>Act Hours</th> 
<th>Total Qty</th> 
<th>Completed</th> 
<th>Runner Weight</th> 
<th>Lumps</th> 
<th>Rejection</th> 
<th>Stage</th> 
</thead>
<tbody>
<?php
@extract($_GET);
$tt=0;
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
foreach(@$result->result() as $bom){


if($bom=='')
{
$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='$bom->bill_of_material_id_hdr' and shift='$shift'");
}
else
{
$wipLogQuery=$this->db->query("select *from tbl_wip_log where bom_id='$bom->bill_of_material_id_hdr' ");
}
foreach($wipLogQuery->result() as $line){


$machineQuery=$this->db->query("select *from tbl_machine where Machine_id='$line->machine_id'");
$getMachine=$machineQuery->row();

$productQuery=$this->db->query("select *from tbl_product_stock where Product_id='$line->p_id'");
$getproduct=$productQuery->row();
$supervisorQuery=$this->db->query("select *from tbl_contact_m where contact_id='$line->supervisor'");
$getSupervisor=$supervisorQuery->row();


$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getproduct->usageunit'");
$getunit=$unitQuery->row();



?>
						
<tr>

<td>
<input value="<?php echo $line->date; ?>" />

</td>
<td>
<input type="text" name="gross_weight[]"  readonly value="<?php echo $getproduct->productname;?>">
</td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $getunit->keyvalue; ?>"></td>	
<td><input type="text" name="net_weight[]" readonly value="<?php echo $getMachine->machinename; ?>"></td>
<td>
<input type="text" name=""readonly="" value="<?php echo $line->shift; ?>">
</td>
<td>
<input type="text" name="gross_weight[]"  readonly value="<?php echo $getSupervisor->first_name;?>">
</td>
<td>
<?php
$dataID=$line->operator;
//print_r($dataID);
$operatorQuery=$this->db->query("select *from tbl_contact_m where  contact_id in ($dataID)");
foreach ($operatorQuery->result() as $getOperator){
?>
<input type="text" name="gross_weight[]"  readonly value="<?php echo $getOperator->first_name;?>">
<?php }?>
</td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $hour=$line->hours; ?>"></td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $actHour=$line->act_hour; ?>"></td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $bom->quantity; ?>"></td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $compl=$line->quantity-$line->rejection_qty." ".$getunit->keyvalue; ?>"></td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $runner=$line->scrap; ?> &nbsp;KG"></td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $line->lumbs; ?>"></td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $reg=$line->rejection_qty." ".$getunit->keyvalue; ?>"></td>
<td><input type="text" name="net_weight[]" readonly value="<?php echo $line->stage; ?>"></td>

</tr>
<?php 
$regSum=$regSum+$reg;
$CompSum=$CompSum+$compl;
$RunnerSum=$RunnerSum+$runner;
$HourSum=$HourSum+$hour;
$ActSum=$ActSum+$actHour;

} } ?>

<tr>
<th>&nbsp;</th><th>&nbsp;</th><th>Total Qty</th><th><?php echo $bom->quantity; ?></th><th>Completed Qty</th><th><?=$CompSum;?></th><th>Rejected Qty</th><th><?=$regSum;?></th><th>Total Runner</th><th><?=$RunnerSum/100?></th><th>Hours Taken</th><th><?=$HourSum;?></th><th>Act Hours</th><th><?=$ActSum; ?></th><th>&nbsp;</th>
</tr> 
</tbody>
</table>
</div>
</div>



</div>

</body>
</html>
