<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_sales_order_hdr';

?>
	 <!-- Main content -->
	 <div class="main-content">			
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Invoice</a></li> 
				
				<li class="active"><strong><a href="#">Manage Invoice</a></strong></li> 
				<div class="pull-right">
				<a class="btn btn-sm" href="<?=base_url();?>invoice/invoice/add_invoice">Add Invoice</a>
				</div>
			</ol>
<?php
            if($this->session->flashdata('flash_msg')!='')
{
            ?>
<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php }?>
			<div class="row">
				<div class="col-lg-12">
					
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
	   <th>Invoice No.</th>
	   
		<th>Date</th>
        <th>Customer Name</th>
		<th style="display:none">Due Date</th>
		<th>Status</th>
      	<th>Grand Total</th>
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
<th><?=$sales->due_date;?></th>

<th><?=$sales->invoice_date;?></th>
<th><?php 
		$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$sales->vendor_id'");
		$res1 = $sqlgroup->row();
		echo $res1->first_name;?></th>
<th >
<?php 
$idt=$sales->invoice_date;
$date = new DateTime("$idt");
$fdate=$date->format("Y-m-d");
$dt=$sales->due_date;
if($dt!=''){
echo $idate= date('Y-m-d', strtotime($fdate. " + $dt days"));
}else{
echo $fdate;
}
?>
</th>

<th style="display:none"><?php 
$cdate = date("Y-m-d");
if($dt!=''){
$idate= date('Y-m-d', strtotime($fdate. " + $dt days"));
}else{
$idate=$fdate;
}
$theRequestMadeDateTime = strtotime($idate);
$theCurrentDateTime = strtotime($cdate);
$theDifferenceInSeconds = 600 - ($theCurrentDateTime - $theRequestMadeDateTime);
$minutesLeft = (floor ($theDifferenceInSeconds / (60*60*24)));
if($cdate<$idate)
{
?>
<a href="<?=base_url();?>invoice/invoice/invoice_details?id=<?=$sales->invoiceid;?>&&contact_id=<?=$res1->contact_id;?>">
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
<a href="<?=base_url();?>invoice/invoice/invoice_details?id=<?=$sales->invoiceid;?>&&contact_id=<?=$res1->contact_id;?>">
<samp style="color:#ef6f08">
<?php
echo abs($minutesLeft)." days over due";
}
?>
</samp></a></th>
<th><?=$sales->grand_total;?></th>
<th>
<button class="btn btn-default" onClick="openpopup('<?=base_url();?>invoice/invoice/edit_invoice_order_1',1400,600,'view',<?=$sales->invoiceid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="fa fa-eye"></i> </button>
<button class="btn btn-default" onClick="openpopup('<?=base_url();?>invoice/invoice/edit_invoice_order_1',1400,600,'id',<?=$sales->invoiceid;?>)" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-pencil"></i></button>
<?php
$pri_col='invoiceid';
$table_name='tbl_invoice_hdr';
	?>

	<button class="btn btn-default delbuttonInvoice" id="<?=$sales->invoiceid."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
	

<?php
if($sales->invoice_status=='GST')
{
?>
<a style="display:none" href="<?=base_url();?>invoice/invoice/print_invoice?id=<?=$sales->invoiceid;?>" class="btn btn-default" target="blank"><i class="glyphicon glyphicon-print"></i></a>
<?php } else {?>
<a style="display:none" href="<?=base_url();?>invoice/invoice/case_memo?id=<?=$sales->invoiceid;?>" class="btn btn-default" target="blank"><i class="glyphicon glyphicon-print"></i>
<?php }?>
<?php
$pri_col='invoiceid';
$table_name='tbl_invoice_hdr';
	?>


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