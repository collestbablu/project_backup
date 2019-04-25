<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/Account.php');
$objj=new Account();
$CI =& get_instance();

$list='';

$list=$objj->docket_list();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_contact_m';

?>
	 <!-- Main content -->
	 <div class="main-content">
			
			<ol class="breadcrumb breadcrumb-2"> 
				
				<li><a class="btn btn-success" href="<?=base_url();?>master/Account/add_docket">Add Docket</a></li> 
			<li>
				<a type="button" class="btn btn-danger delete_all">Delete Selected</a>
			</li>	
			</ol>
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Master</a></li> 
				<li><a href="#">Docket</a></li> 
				<li class="active"><strong><a href="#">Manage Docket</a></strong></li> 
			</ol>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>Manage Docket</strong></h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
		
        <div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th> Sr. No.</th>
		<th>Date</th>
        <th>Docket No.</th>
		<th>Consignor</th>
		<th>Consignee</th>
		<th>Origin</th>
		<th>Destination</th>
		<th>No. Of Packg.</th>
		<th>Mode of Pay</th>
		<th>EDD</th>
        <th>Status</th>
        <th>Choose Status</th>
		 <th>Shipment Delivered On</th>
         <th>Time</th>
         <th>Remarks</th>
         <th>Action</th>
         <th style="display:none"></th>
</tr>
</thead>

<tbody>
<?php
  for($i=0,$j=1;$i<count($list);$i++,$j++)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $list[$i]['13']; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $list[$i]['13']; ?>" value="<?php echo $list[$i]['13'];?>" /></th>
<th><?php echo $j;?></th>
<th><?=$list[$i]['1'];?></th>
<th><?=$list[$i]['2'];?></th>
<th><?=$list[$i]['3'];?></th>
<th><?=$list[$i]['4'];?></th>
<th><?=$list[$i]['5'];?></th>
<th><?=$list[$i]['6'];?></th>
<th><?=$list[$i]['7'];?></th>
<th><?=$list[$i]['8'];?></th>
<th><?=$list[$i]['9'];?></th>
<th><?=$list[$i]['12'];?></th>
<th style="display:none"  id="docketid<?php echo $i; ?>"><?=$list[$i]['13'];?></th>
<th><select name="booked_status" id="booked_status<?php echo $i; ?>" >
<option value="">---select--</option>

<option value="Intransit">Intransit</option>
<option value="OFD">OFD</option>
<option value="Delivered">Delivered</option>
<option value="Not Delivered Return">Not Delivered Return</option>
</select>
</th>
<th><input type="date" name="shipment_delivered_on" id="shipment_delivered_on<?php echo $i; ?>" style="width:120px;" /></th>
<th><input type="text" name="shipment_delivered_on_time" id="shipment_delivered_on_time<?php echo $i; ?>"  style="width:60px;" /></th>
<th>
<input type="text" name="remarks" style="width:150px;" id="remarks<?php echo $i; ?>" />
&nbsp;<input type="button" id="<?php echo $i; ?>" value="Update" onclick="mainshut(this.id)" />
</th>
<th style="width:200px;">
<a href="#" onClick="openpopup('update_docket',1200,500,'view',<?=$list[$i]['13'];?>)"><i class="glyphicon glyphicon-zoom-in"></i></a>&nbsp;&nbsp;&nbsp;<a href="#" onClick="openpopup('update_docket',1200,500,'id',<?=$list[$i]['13'];?>)"><i class="glyphicon glyphicon-pencil"></i>
<?php
$pri_col='id';
$table_name='tbl_docket_entry';
$pri_col_dtl='docket_dtl_id';
$table_name_dtl='tbl_docket_entry_dtl';
	?>
	&nbsp;&nbsp;&nbsp;<a href="#" id="<?php echo $list[$i]['13']."^".$table_name."^".$pri_col."^".$pri_col_dtl."^".$table_name_dtl ; ?>" class="delbutton icon"><i class="glyphicon glyphicon-remove"></i></a> 
	<a href="<?=base_url();?>master/Account/print_docket?id=<?=$list[$i]['13'];?>" target="_blank">Print</a>
</th>
</tr>
<?php } ?>
</tbody>
<input type="text" style="display:none;" id="table_name^table_name_dtl" value="tbl_docket_entry^tbl_docket_entry_dtl">  
<input type="text" style="display:none;" id="pri_col^pri_col_dtl" value="id^docket_dtl_id">
</table>

</div>
</div>
</div>
</div>


<?php

$this->load->view("footer.php");
?>
<script>
function mainshut(d)
{
	
var regex = /(\d+)/g;
nn= d.match(regex)
id=nn;
//alert(id);


var shipment_delivered_on=document.getElementById("shipment_delivered_on"+id).value;
var shipment_delivered_on_time=document.getElementById("shipment_delivered_on_time"+id).value;
var remarks=document.getElementById("remarks"+id).value;

var cont=document.getElementById("booked_status"+id).value;

var did=document.getElementById("docketid"+id).innerHTML;
var pro=cont+"^"+did+"^"+shipment_delivered_on+"^"+shipment_delivered_on_time+"^"+remarks;

 window.location.href="delivery_mail?comm="+pro;

}

</script>
