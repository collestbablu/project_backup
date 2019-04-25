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
<h4 class="panel-title">Sale Order Report</h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal panel-body-to" method="post" action="searchSalesOrder">
<div class="form-group"> 
<label class="col-sm-2 control-label">Sale Order No</label> 
<div class="col-sm-3"> 
<input type="text" name="p_no" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Customer Name</label> 
<div class="col-sm-3"> 
<select name="v_name"  class="form-control">
    <option value="">--select--</option>
        <?php 
		$sql = $this->db->query("select * from tbl_contact_m where group_name='4' and status='A' order by first_name asc");
		foreach($sql->result() as $sqlline){ ?>
			<option value="<?php echo $sqlline->contact_id;?>"><?php echo $sqlline->first_name;?></option>
        
        <?php } ?>
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
<label class="col-sm-2 control-label">Grand Total</label> 
<div class="col-sm-3"> 
<input type="text" name="g_total" class="form-control" value="" /> 
</div>
<label class="col-sm-2 control-label"></label> 

<label class="col-sm-2 control-label"><button type="submit" name="Show" class="btn btn-info" value="Show">Show</button></label> 
</div>
</form>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
 		<th>Sale Order No</th>
        <th>Customer Name</th>
		<th>sale Order Date</th>   
		<th>Service Tax</th>
		<th>Grand Total</th>
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($saleOrderSearch)) {
foreach($saleOrderSearch as $rows) {
?>
<tr class="gradeC record">
<th><?php echo $rows->salesid; ?></th>
<th><?php
$proQ1=$this->db->query("select * from tbl_contact_m where contact_id='$rows->vendor_id'");
		$fProQ12=$proQ1->row();
 echo $fProQ12->first_name; ?></th>
<th><?php echo $rows->invoice_date; ?></th>
<th><?php echo $rows->service_charge_total; ?></th>
<th><?php echo $rows->grand_total; ?></th>	
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