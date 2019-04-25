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
<h4 class="panel-title">SALARY REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchSalary">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Employee Name</label> 
<div class="col-sm-3"> 
<input type="text" name="emp" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Location</label> 
<div class="col-sm-3"> 
<select name="loc" class="form-control">
<option value="">--Select--</option>
<?php 
$loc=$this->db->query("select * from tbl_master_data where param_id='21'");
foreach($loc->result() as $locdata)
{
?>
<option value="<?=$locdata->serial_number;?>"><?=$locdata->keyvalue;?></option>
<?php }?>
</select>
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
<label class="col-sm-2 control-label">Total Net To Pay</label> 
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

  		<th>Date </th>
        <th>Name of Employee</th>
        <th>Department</th>
		<th>Location</th>
        <th>Basic Salary</th>
		<th>HR</th>
        <th>Conveyance</th>
        <th>EPF</th>
        <th>EPF Total</th>
        <th>TDS Amount</th>
        <th>Working Days</th>
        <th>Advance</th>
        <th>Deduction</th>
        <th >Net to Pay</th>
		<th >Payment Mode</th>		
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($salarySearch)) {
foreach($salarySearch as $fetch_list) {
?>
<tr class="gradeC record">
<th><?=$fetch_list->maker_date;?></th>
<th><?php
$paymentQuery=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->contact_id'");
$getPayment=$paymentQuery->row();
echo $getPayment->first_name;?></th>
<th><?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->department'");
$getPayment=$paymentQuery->row();
echo $getPayment->keyvalue;?> </th>
<th><?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->loc_id'");
$getPayment=$paymentQuery->row();
echo $getPayment->keyvalue;?></th>
<th><?=$fetch_list->basic_salary;?></th>
<th><?=$fetch_list->hra;?></th>
<th><?=$fetch_list->conveyance;?></th>
<th><?=$fetch_list->epf;?></th>
<th><?=$fetch_list->epf_amount;?></th>
<th><?=$fetch_list->tds_amount;?></th>
<th><?=$fetch_list->work_days;?></th>
<th><?=$fetch_list->advance;?></th>
<th><?=$fetch_list->deduction;?></th>
<th><?=$fetch_list->net_pay;?></th>
<th><?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->payment_mode'");
$getPayment=$paymentQuery->row();
echo $getPayment->keyvalue;?></th>
</tr>
<?php 
$sum = $sum + $fetch_list->net_pay;
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
