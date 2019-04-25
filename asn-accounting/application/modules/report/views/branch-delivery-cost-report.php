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
<h4 class="panel-title">BRANCH DELIVERY COST REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchBranchDeliveryCost">
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
		<th>Volume Weight</th>
		<th>Total Vol. Weight</th>
        <th>Total</th>
	       <th>Branch</th>
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($branchdeliverycostSearch)) {
foreach($branchdeliverycostSearch as $rows) {
?>
<tr class="gradeC record">
<th><?=$rows->date;?></th>
<?php
$contactQuery=$this->db->query("select * from tbl_master_data where serial_number='$rows->branch'");
$getContact=$contactQuery->row();
?>
<th><?=$rows->vol_wt;?></th>
<th><?=$rows->total_vol_weight; ?></th>
<th><?=$rows->total;?></th>
<th><?=$getContact->keyvalue;?></th>
</tr>
<?php

$sum1 = $sum1 + $rows->total;
$sum2 = $sum2 + $rows->total_vol_weight;
$sum3 = $sum1 / $sum2;
}  }   ?>
 
 <input type="hidden" name="total2" id="total2" class="form-control" value="<?php echo $sum1;?>" readonly />
 <input type="hidden" name="vol_total2" id="vol_total2" class="form-control" value="<?php echo $sum2;?>" readonly />
 <input type="hidden" name="cst_total2" id="cst_total2" class="form-control" value="<?php echo $sum3;?>" readonly />
 
</tbody>
<tbody>
<th></th>
<th></th>
<th>Total Vol. Weight =<input type="text" name="vol_total" id="vol_total" class="form-control" style="width:100px;" value=""  readonly=""/></th>
<th>Total =<input type="text" name="total" id="total" class="form-control" style="width:100px;" value=""  readonly=""/> </th>
<th>Total Branch Delivery Cost =<input type="text" name="cst_total" id="cst_total" class="form-control" style="width:100px;" value=""  readonly=""/></th>
</tbody>
</table>
<script>
var id1=document.getElementById("total2").value;
document.getElementById("total").value = id1;
//alert(id);
var id2=document.getElementById("vol_total2").value;
document.getElementById("vol_total").value = id2;
//alert(id);
var id3=document.getElementById("cst_total2").value;
var id4=parseFloat(id3).toFixed(2);
document.getElementById("cst_total").value = id4;
//alert(id);

</script>
</div>
</div>
</div>
</div>
</div>
<?php
$this->load->view("footer.php");
?>