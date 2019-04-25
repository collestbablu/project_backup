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
<h4 class="panel-title">BRANCH DELIVERY REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchBranchDelivery">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Branch</label> 
<div class="col-sm-3"> 
<select name="branch" class="form-control">
<option value="">--Select--</option>
<?php 
$brnch=$this->db->query("select * from tbl_master_data where param_id='18'");
foreach($brnch->result() as $daata){
?>
<option value="<?= $daata->serial_number;?>"><?= $daata->keyvalue;?></option>
<?php } ?>
</select>
</div>
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
<label class="col-sm-2 control-label"><button type="submit" name="Show" class="btn btn-sm" value="Show">Show</button></label>  
</div>
</form>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
 	   <th> Date </th>
       <th>Branch</th>
		<th>Volume Weight</th>
        <th>Total</th>
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($branchdeliverySearch)) {
foreach($branchdeliverySearch as $rows) {
?>
<tr class="gradeC record">
<th><?=$rows->date;?></th>
<?php
$contactQuery=$this->db->query("select * from tbl_master_data where serial_number='$rows->branch'");
$getContact=$contactQuery->row();
?>

<th><?=$getContact->keyvalue;?></th>
<th><?=$rows->vol_wt;?></th>
<th><?=$rows->total;?></th>
</tr>
<?php } } ?>
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