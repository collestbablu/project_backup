<?php
$tableName="tbl_wip_hdr";
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
<div class="table-responsive-">  

<table width="100%" border="0" class="text" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="top" class="text"><span>DEFLESHING LIST Report</span></td>
</tr>
 
<tr>
<td align="left" valign="top">
<table class="table table-striped table-bordered table-hover" border="2%" id="dataTables-example">

<thead>
  <tr>
 <th>Date</th><th>Finish Goods</th><th>Unit</th><th>Shift</th><th>Supervisor</th><th>Operator</th><th>Hours</th><th>Act Hours</th><th>Total Qty</th><th>Completed</th><th>Rejection</th>
 
</thead>
<tbody>
<?php
	  @extract($_GET);
	  $tt=0;
	if(@$Search!=''){

	  $queryy="select * from tbl_wip_hdr where status='A'";

	 	 if($Product_typeid!=''){
		
	  	$queryy.=" and product_type like '%$Product_typeid%'";

		  }
		  if($product_name!=''){
	  	$queryy.=" and product_name  like '%$product_name%'";

		  }
			  
		  if($serial_no!=''){
	  	$queryy.=" and lot_no like '%$serial_no%'";

		  } 

		}
	if($Search==''){
		  $queryy="select * from tbl_wip_hdr where status='A'";
}	
		  @$result=$this->db->query($queryy);
   $i=$start;
    $j=1;
   foreach(@$result->result() as $liness){
   $i++;
   if($i%2!=0){
   	$color='#ECE9D8';
   }else{
   	$color='#F1FEFD';
   }
   


   @extract($line);


 if($Search!='')
	 {
	$wipLogQuery=$this->db->query("select *from tbl_defleshing_log where bom_id='$liness->wip_hdr_id'");
	}
	else
	{
	$wipLogQuery=$this->db->query("select *from tbl_defleshing_log where bom_id='$liness->wip_hdr_id' ");
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
	5/4/2017
	</td>
	<td>
	<?php echo $getproduct->productname;?>
	</td>
	<td><?php echo $getproduct->productname;?></td>	
	
	<td>
	<?php echo $getproduct->productname;?>
	</td>
	<td>
	<?php echo $getproduct->productname;?>
	</td>
	<td>
	<?php
	 $dataID=$line->operator;
	//print_r($dataID);
	$operatorQuery=$this->db->query("select *from tbl_contact_m where  contact_id in ($dataID)");
	foreach ($operatorQuery->result() as $getOperator){
	?>
	<?php echo $getproduct->productname;?>
	<?php }?>
	</td>
	<td><?php echo $getproduct->productname;?></td>
	<td><?php echo $getproduct->productname;?></td>
	<td><?php echo $getproduct->productname;?></td>
	<td><?php echo $getproduct->productname;?></td>
	<td><?php echo $getproduct->productname;?></td>
	</tr>
<?php 
$regSum=$regSum+$reg;
$CompSum=$CompSum+$compl;
$RunnerSum=$RunnerSum+$runner;
$HourSum=$HourSum+$hour;
$ActSum=$ActSum+$actHour;

} }?>

 <tr style="border-bottom:#fff solid 1px">
<th>&nbsp;</th><th>&nbsp;</th><th>Total Qty</th><th><?php echo $liness->quantity; ?></th><th>Completed Qty</th><th><?=$CompSum;?></th><th>Rejected Qty</th><th><?=$regSum;?></th><th>Hours Taken</th><th><?=$HourSum;?></th><th>&nbsp;</th>
</tr> 
 
</tr>
</tbody>
</table>

</tr>






</table>

</div>
</body>
</html>
