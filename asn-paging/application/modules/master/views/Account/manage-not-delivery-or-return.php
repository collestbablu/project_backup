<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/Account.php');
$objj=new Account();
$CI =& get_instance();

$list='';

$list=$objj->docket_list_not_deliver_return();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_contact_m';

?>
	 <!-- Main content -->
	 <div class="main-content">
			
			<ol class="breadcrumb breadcrumb-2"> 
				
		
			</ol>
			<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Docket Entry</a></li> 
				<li><a href="#">Docket Not Delivery/Return</a></li> 
				 
			</ol>
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>Docket Not Delivery/Return</strong></h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
		<form action="update_not_return" method="post">					<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr><input type="submit" name="upadte" value="Update" class="btn btn-success" />
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
         <th>Action</th>
		
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
<th style="width:200px;">
<a href="#" onClick="openpopup('update_docket',1200,500,'view',<?=$list[$i]['13'];?>)"><i class="glyphicon glyphicon-zoom-in"></i></a>&nbsp;&nbsp;&nbsp;<a 
	<a href="<?=base_url();?>master/Account/print_docket?id=<?=$list[$i]['13'];?>" target="_blank">Print</a>
</th>
</tr>
<?php }?>
</tbody>
<input type="text" style="display:none;" id="table_name^table_name_dtl" value="tbl_docket_entry^tbl_docket_entry_dtl">  
<input type="text" style="display:none;" id="pri_col^pri_col_dtl" value="id^docket_dtl_id">
</table>
</form>
</div>
</div>
</div>
</div>
</div>
<?php

$this->load->view("footer.php");
?>