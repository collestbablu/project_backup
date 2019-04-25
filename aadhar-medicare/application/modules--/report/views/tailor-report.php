<?php
$this->load->view("header.php");
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$table_name_1='tbl_product_stock';
$pri_id='Product_id';
$field_name='productname';
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
<h4 class="panel-title">TAILOR REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchTailor">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Tailor Name</label> 
<div class="col-sm-3"> 
<input type="text" name="t_name" class="form-control" value="" /> 
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
	   <th>Sl No.</th>
        <th>Tailor Name </th>
		 <th>Product Name </th>
    	<th>Qty</th>
	    <th>Date</th>
		<th>Status</th>

</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($tailorSearch)) {
foreach($tailorSearch as $sales) {
?>
<tr class="gradeC record">
<th><?php  echo $yy++ ?></th>
<th>
<?php
$query=$this->db->query("select * from tbl_contact_m where contact_id='$sales->customer_name'");	
$fetchq=$query->row();
 echo $fetchq->first_name;
 ?>
</th>
<th><?php 
$queryfetch11=$this->db->query("select * from tbl_production_hdr where productionid='$sales->production_id'");	
	$fetchqrow11=$queryfetch11->row();
$queryfetch=$this->db->query("select * from tbl_product_stock where Product_id='$fetchqrow11->product_id'");	
	$fetchqrow=$queryfetch->row();
	echo $fetchqrow->productname;
?>
</th>
<th><?=$sales->qty;?></th>
<th><?=$sales->date;?></th>
<th><?=$sales->production_status;?></th>
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
