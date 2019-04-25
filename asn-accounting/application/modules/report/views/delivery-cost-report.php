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
<h4 class="panel-title">DELIVERY COST REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchDeliveryCost">
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
 	   <th><div style="width:100px;">Delivery Date</div></th>
   		<th><div style="width:100px;">Vendor Name</div></th>
		<th><div style="width:110px;">Total Vol. Weight</div></th>
         <th>Cost</th>
		<th>Conveyance</th>
        <th>Total</th>	
	   	<th><div style="width:80px;">No. Of Box</div></th>
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
<th><?php
$contactQuery=$this->db->query("select *from tbl_contact_m  where contact_id='$rows->contact_id'");
$getContact=$contactQuery->row();
echo $getContact->first_name;?></th>
<th><?=$rows->total_vol_weight;?></th>
<th><?=$rows->cost;?></th>
<th><?=$rows->conveyance;?></th>
<th><?=$rows->total;?></th>
<th><?=$rows->no_of_box;?> </th>
<th><?=$rows->name_of_person;?></th>
</tr><?php

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
<th>Total Vol. Weight =</th>
<th><input type="text" name="vol_total" id="vol_total" class="form-control" style="width:100px;" value=""  readonly=""/></th>
<th></th>
<th>Total =</th>
<th><input type="text" name="total" id="total" class="form-control" value="" style="width:100px;"  readonly=""/> </th>
<th>Total Delivery Cost =</th>
<th><input type="text" name="cst_total" id="cst_total" class="form-control" value="" style="width:100px;"  readonly=""/></th>
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