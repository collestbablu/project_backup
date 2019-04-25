<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_purchase_order_hdr';

?>
	 <!-- Main content -->
	 <div class="main-content">
			
			<ol class="breadcrumb breadcrumb-2"> 
				
				<?php 
				if($add!='')
				{ ?>
				<li><a class="btn btn-success" href="<?=base_url();?>purchaseorder/purchaseorder/add_purchase_order">Add Purchase Order</a></li> 
				<?php }?>
				 
			</ol>
			
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Purchase Order</a></li> 
				
				<li class="active"><strong><a href="#">Manage Purchase Order</a></strong></li> 
			</ol>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>Sales Invoice</strong></h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
	   <th>Purchase Order Id.</th>
		<th>Type</th>
        <th>Date</th>
        <th>Vendor Name</th>
		<th style="display:none">Due Date</th>
		<th style="display:none">Status</th>
      	<th>Grand Total</th>
        <th>Image</th>
         <th>Action</th>
</tr>
</thead>

<tbody>
<?php
$i=1;
	foreach($result as $sales)
  {
  ?>

<tr class="gradeC record">
<th><?=$sales->purchaseorderid;?></th>
<th><?=$sales->invoice_type;?></th>
<th>
<a href="<?=base_url();?>purchaseorder/purchaseorder/purchase_order_details?id=<?=$sales->purchaseorderid;?>&&contact_id=<?=$sales->vendor_id;?>">
<?=$sales->invoice_date;?>
</a></th>
<th><?php 
		$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$sales->vendor_id'");
		$res1 = $sqlgroup->row();
		echo $res1->first_name;?></th>
<th style="display:none" >
<?php 
$idt=$sales->invoice_date;
$date = new DateTime("$idt");
$fdate=$date->format("Y-m-d");
$dt=$sales->due_date;
echo $idate= date('Y-m-d', strtotime($fdate. " + $dt days"));

?>
</th>

<th style="display:none"><?php 
$cdate = date("Y-m-d");
$idate= date('Y-m-d', strtotime($fdate. " + $dt days"));
$theRequestMadeDateTime = strtotime($idate);
$theCurrentDateTime = strtotime($cdate);
$theDifferenceInSeconds = 600 - ($theCurrentDateTime - $theRequestMadeDateTime);
$minutesLeft = (floor ($theDifferenceInSeconds / (60*60*24)));
if($cdate<$idate)
{
?>
<a href="<?=base_url();?>salesorder/SalesOrder/invoice_details?id=<?=$sales->purchaseorderid;?>&&contact_id=<?=$compRow->contact_id;?>">
<samp style="color:#2c96dd">
<?php
echo $minutesLeft." days due";
?>
</samp>
</a>
<?php
}
else
{
?>
<a href="<?=base_url();?>salesorder/SalesOrder/invoice_details?id=<?=$sales->purchaseorderid;?>&&contact_id=<?=$compRow->contact_id;?>">
<samp style="color:#ef6f08">
<?php
echo abs($minutesLeft)." days over due";
}
?>
</samp></a></th>
<th><?=$sales->grand_total;?></th>
<th>
<?php
if($sales->image!=''){

?>

<a href="<?=base_url();?>assets/image_data/<?=$sales->image;?>" target="_blank"><img src="<?=base_url();?>assets/image_data/<?=$sales->image;?>" height="100" width="100" /></a>
<?php } else{?>
<img src="<?=base_url();?>assets/images/no_image.png" height="100" width="100" />
<?php }?>

</th>
<th>
<a href="#" onClick="openpopup('<?=base_url();?>purchaseorder/purchaseorder/edit_purchase_order',1400,600,'view',<?=$sales->purchaseorderid;?>)"><i class="glyphicon glyphicon-zoom-in"></i>
</a>&nbsp;&nbsp;&nbsp;<a href="#" onClick="openpopup('<?=base_url();?>purchaseorder/purchaseorder/edit_purchase_order',1400,600,'id',<?=$sales->purchaseorderid;?>)"><i class="glyphicon glyphicon-pencil"></i>
<?php
$pri_col='purchaseorderid';
$table_name='tbl_purchase_order_hdr';
	?>
	&nbsp;&nbsp;&nbsp;<a href="#" id="<?php echo $sales->purchaseorderid."^".$table_name."^".$pri_col ; ?>" class="delbuttonPurchase icon"><i class="glyphicon glyphicon-remove"></i></a> 

</th>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php

$this->load->view("footer.php");
?>