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
<h4 class="panel-title">EXPENSE REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchExpense">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Person Name</label> 
<div class="col-sm-3"> 
<select name="pers_name"  class="form-control" >						
<option value="">--Select--</option>					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='7' ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->contact_id){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>
</div>
<label class="col-sm-2 control-label">Expense Account</label> 
<div class="col-sm-3"> 
<select name="exp_account" class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_contact_m where group_name='5'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->contact_id;?>"><?=$getPaymentMode->first_name;?></option>

<?php }?>
</select>
</div>
</div>

<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Expense Type</label> 
<div class="col-sm-3"> 
<select name="exp_type" class="form-control" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id='20'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->serial_number;?>"><?=$fetch_protype->keyvalue;?></option>

<?php }?>
</select>
</div>
<label class="col-sm-2 control-label">Paid To</label> 
<div class="col-sm-3"> 
<select name="paidto" class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_contact_m ");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->contact_id;?>"><?=$getPaymentMode->first_name;?></option>

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
<option value="">--Select Range--</option>
<option value="7">Weekly</option>
<option value="30">Monthly</option>
<option value="90">Quarterly</option>
<option value="365">Yearly</option>
</select>
</div>
<label class="col-sm-2 control-label">Total Amt</label> 
<div class="col-sm-3"> 
<input type="text" name="amt_total" id="amt_total" class="form-control" value=""  readonly=""/> 
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
		
	    <th>Date </th>
        <th>Person Name</th>		
        <th>Expense Account</th>
        <th>Expense Type</th>
		<th>Goods Des.</th>
        <th>Amount</th>		
	    <th>Payment Mode</th>
		<th>Paid To</th>
		
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($expenseSearch)) {
foreach($expenseSearch as $fetch_list) {
?>
<tr class="gradeC record">

<th><?=$fetch_list->date;?></th>

<th><?php
$pname=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->contact_id'");
$getname=$pname->row();
echo $getname->first_name;?> </th>

<th><?php
$exac=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->exp_account'");
$exactname=$exac->row();
echo $exactname->first_name;?></th>

<th><?php
$contactQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->exp_type'");
$getContact=$contactQuery->row();
echo $getContact->keyvalue;?></th>

<th><?=$fetch_list->goods_name;?></th>
<th><?=$fetch_list->amount;?></th>

<th><?php
$paymentQuery=$this->db->query("select *from tbl_master_data  where serial_number='$fetch_list->payment_mode'");
$getPayment=$paymentQuery->row();
echo $getPayment->keyvalue;?></th>

<th><?php
$Query1=$this->db->query("select *from tbl_contact_m  where contact_id='$fetch_list->paidTo'");
$get1=$Query1->row();
echo $get1->first_name;?> </th>
	
</tr>
<?php 
$sum = $sum + $fetch_list->amount;
} } ?>
<input type="hidden" name="total_amt" id="total_amt" class="form-control" value="<?php echo $sum;?>" readonly />
</tbody>
</table>
<script>
var id=document.getElementById("total_amt").value;
document.getElementById("amt_total").value = id;
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