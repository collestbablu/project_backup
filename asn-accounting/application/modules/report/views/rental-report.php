<?php
$this->load->view("header.php");
?>
	<!-- Main content -->
	<div class="main-content">
	
<?php
$this->load->view("reportheader");
?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title">RENTAL REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchRental">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Rental Name</label> 
<div class="col-sm-3"> 
<input type="text" name="r_name" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Location</label> 
<div class="col-sm-3"> 
<input type="text" name="loc" class="form-control" value="" />
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">From Date</label> 
<div class="col-sm-3"> 
<input type="date" name="f_date" class="form-control" value="" /> 
</div>
<label class="col-sm-2 control-label">To Date</label> 
<div class="col-sm-3"> 
<input type="date" name="t_date" class="form-control" value="" /> 
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Search By</label> 
<div class="col-sm-3"> 
<select name="range" class="form-control" >
<option value="">--Select Range--</option>
<option value="7">Weekly</option>
<option value="30">Monthly</option>
<option value="90">Quarterly</option>
<option value="365">Yearly</option>
</select>
</div>
<label class="col-sm-2 control-label">Total TDS</label> 
<div class="col-sm-3"> 
<input type="text" name="tds_total" id="tds_total" class="form-control" value=""  readonly=""/> 
</div>
<label class="col-sm-2 control-label"><button type="submit" name="Show" class="btn btn-sm" value="Show">Show</button></label>  
</div>
</form>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example">
<thead>
<tr>
	
 		<th>Date </th>
        <th>Rentale Name</th>
        <th>Location</th>
        <th>Amount</th>
		<th>TDS%</th>        
        <th>TDS Amount</th>
		<th>GST%</th>
        <th>GST Amount</th>
		<th>Rent Amount</th>
        <th>Payment Mode</th>		
</tr>
</thead>
<tbody>
<?php
$yy=1;
$sum=0;
if(!empty($searchRental)) {
foreach($searchRental as $fetch_list) {
?>
<tr class="gradeC record">
<th><?=$fetch_list->date;?></th>
<?php
$contactQuery=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->rentale_id'");
$getContact=$contactQuery->row();
?>

<th><?=$getContact->first_name;?></th>
<?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->loc_id'");
$getPayment=$paymentQuery->row();
?>
<th><?=$getPayment->keyvalue;?></th>
<th><?=$fetch_list->amount;?> </th>
<th><?=$fetch_list->tdsper;?> </th>
<th><?=$fetch_list->tds_amount;?></th>
<th><?=$fetch_list->gstper;?></th>
<th><?=$fetch_list->gst_amount;?></th>
<th><?=$fetch_list->rent_amount;?></th>

<?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->payment_mode'");
$getPayment=$paymentQuery->row();
?>

<th><?=$getPayment->keyvalue;?></th>
	
</tr>
<?php 
$sum = $sum + $fetch_list->tds_amount;
} } ?>
<input type="hidden" name="tds_total" id="tds_total1" class="form-control" value="<?php echo $sum;?>" readonly /></th> 
</tbody>
</table>
<script>
var id=document.getElementById("tds_total1").value;
document.getElementById("tds_total").value = id;
</script>

</div>
</div>
</div>
</div>
</div>
<?php
$this->load->view("footer.php");
?>