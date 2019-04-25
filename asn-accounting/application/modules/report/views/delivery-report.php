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
<h4 class="panel-title">DELIVERY REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchDelivery">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Vendor Name</label> 
<div class="col-sm-3"> 
<input type="text" name="v_name" class="form-control" value="" />
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
 	   <th>Delivery Date </th>
       <th>Vendor Name</th>
		<th>No. Of Box</th>
        <th>Cost</th>
		<th>Conveyance</th>
        <th>Total</th>
		<th>Volume Weight</th>
		  <th >Name Of Person</th>
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($deliverySearch)) {
foreach($deliverySearch as $rows) {
?>
<tr class="gradeC record">
<th><?=$rows->date;?></th>
<?php
$contactQuery=$this->db->query("select *from tbl_contact_m  where contact_id='$rows->contact_id'");
$getContact=$contactQuery->row();
?>

<th><?=$getContact->first_name;?></th>
<th><?=$rows->no_of_box;?> </th>
<th><?=$rows->cost;?></th>
<th><?=$rows->conveyance;?></th>
<th><?=$rows->total;?></th>
<th><?=$rows->vol_wt;?></th>
<th><?=$rows->name_of_person;?></th>
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