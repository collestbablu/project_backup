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
<h4 class="panel-title">INVOICE REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchInvoice">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Invoice No.</label> 
<div class="col-sm-3"> 
<input type="text" name="inv_no" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Customer Name</label> 
<div class="col-sm-3"> 
<input type="text" name="cust_name" class="form-control" value="" />
</div>
</div>
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">From Date</label> 
<div class="col-sm-3"> 
<input type="date" name="f_date" class="form-control" value="" /> 
</div>
<label class="col-sm-2 control-label">To Date</label> 
<div class="col-sm-3"> 
<input type="date" name="t_date" class="form-control" value="" /> 
</div>
</div>
<div class="form-group panel-body-to"> 
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
<label class="col-sm-2 control-label">Grand Total</label> 
<div class="col-sm-3"> 
<input type="text" name="g_total" id="g_total" class="form-control" value="" readonly=""/>
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

  	<th>Invoice No.</th>
    <th>Date</th>
    <th>Customer Name</th>
    <th>Grand Total</th>
	
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($invoiceSearch)) {
foreach($invoiceSearch as $fetch_list) {
?>
<tr class="gradeC record">
<th><?=$fetch_list->due_date;?></th>
<th><?=$fetch_list->invoice_date;?> </th>
<th><?php
$paymentQuery=$this->db->query("select * from tbl_contact_m  where contact_id='$fetch_list->vendor_id'");
$getPayment=$paymentQuery->row();
echo $getPayment->first_name; ?>
</th>
<th><?=$fetch_list->grand_total;?></th>
</tr>
<?php 
$sum = $sum + $fetch_list->grand_total;
} } ?>
<input type="hidden" name="g_total2" id="g_total2" class="form-control" value="<?php echo $sum;?>" readonly /> 
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
var id=document.getElementById("g_total2").value;
document.getElementById("g_total").value = id;
//alert(id);
</script>
<?php
$this->load->view("footer.php");
?>
