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
<h4 class="panel-title">CONNECTION LIST REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchBooking">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">CD No.</label> 
<div class="col-sm-3"> 
<input type="text" name="c_no" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Vendor Name</label> 
<div class="col-sm-3"> 
<select name="c_name"  class="form-control"  >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='5'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->contact_id;?>"><?=$fetch_protype->first_name;?></option>

<?php }?>
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
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Search By</label> 
<div class="col-sm-3"> 
<select name="range" class="form-control" >
       <option value="">--Select Duration--</option>
       <option value="1">This Week</option>
       <option value="2">This Month</option>
       <option value="3">This Quarter</option></option>
       <option value="4">This Year</option>
       <option value="5">Previous Week</option>
       <option value="6">Previous Months</option>
       <option value="7">Previous Quarter</option>
       <option value="8">Previous Year</option>
</select>
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Grand Total</label> 
<div class="col-sm-3"> 
<input type="text" name="g_total" id="g_total" class="form-control" value=""  readonly=""/> 
</div>
<label class="col-sm-2 control-label">Total Weight</label> 
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
		<th>CD No.</th>
		<th>Date Of Booking</th>
        <th>Exp. Reach Date	</th>
        <th>Vendor Name</th>
		<th>Mode</th>
		<th>Rate</th>
		<th>Grand Total</th>
      	<th>Vendor Weight</th>
		<th>Total Weight</th>
		<th>Actual Weight</th>
		<th>Difference Weight</th>		
</tr>
</thead>
<tbody>
<?php
$yy=1;
$sum=0;
if(!empty($bookingSearch)) {
foreach($bookingSearch as $sales) {
?>
<tr class="gradeC record">
<th><?=$sales->cd_no;?></th>

<th><?=$sales->date_of_booking;?></th>
<th><?=$sales->exp_reach_date;?></th>
<th><?php 
		$sqlgroup=$this->db->query("select * from tbl_contact_m where contact_id='$sales->vendor_id'");
		$res1 = $sqlgroup->row();
		echo $res1->first_name;?></th>
<th><?=$sales->mode;?></th>
<th><?php 
	$rate=$this->db->query("select * from tbl_bookong_order_dtl where bookinghdr ='$sales->bookingrid'");
	$dtlrate=$rate->row();
	echo $dtlrate->rate; ?></th>
<th><?=$sales->grand_total;?></th>
<th><?=$sales->vendor_weight;?></th>
<th><?=$sales->total_weight;?></th>
<th><?=$sales->actual_weight;?></th>
<th><?php echo $tweight= $sales->vendor_weight-$sales->total_weight; ?></th>

</tr>
<?php 
$sum2 = $sum2 + $sales->grand_total;
$sum = $sum + $sales->total_weight;
} } ?>
<input type="hidden" name="tds_total" id="tds_total1" class="form-control" value="<?php echo $sum;?>" readonly /></th> 
<input type="hidden" name="g_total2" id="g_total2" class="form-control" value="<?php echo $sum2;?>" readonly /></th> 
</tbody>
</table>
<script>

var id=document.getElementById("tds_total1").value;
document.getElementById("tds_total").value = id;

var id=document.getElementById("g_total2").value;
document.getElementById("g_total").value = id;

</script>

</div>
</div>
</div>
</div>
</div>
<?php
$this->load->view("footer.php");
?>