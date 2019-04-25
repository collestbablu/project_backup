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
<select name="t_name" class="form-control">
<option value="">--Select--</option>
<?php 
$query=$this->db->query("select * from tbl_contact_m where group_name='6'");	
foreach($query->result() as $tname)
{
?>
<option value="<?= $tname->contact_id; ?>"><?= $tname->first_name; ?></option>
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
		 <th>Product Type</th>
		 <th>Product Name </th>
		<th>Qty in Master cutting</th>
	    <th>Qty in Qc</th>
		<th>Qty in Packing</th>

</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($WhereQtySearch)) {
foreach($WhereQtySearch as $sales) {
?>
<tr class="gradeC record">
<th><?php  echo $yy++;?></th>
<th><?php 
$querymaster=$this->db->query("select * from tbl_master_data where serial_number='$sales->type'");	
	$masterrow=$querymaster->row();
 echo $masterrow->keyvalue; ?></th>
<th><?php 
echo $sales->productname;
?></th>

<th><?php 
//echo $sales->Product_id."<br>";
$sum=0;
$out=array();
$out1=array();
$queryfetch11=$this->db->query("select * from tbl_production_hdr where product_id='$sales->Product_id'");	
foreach($queryfetch11->result() as $fetchqrow11){
	$sum=$sum+$fetchqrow11->qty;
	//$qryFet=$this->db->query("select * from tbl_production_hdr where productionid='$fetchqrow11->productionhdr'");
	//$rowfet=$qryFet->row();
	array_push($out, "$fetchqrow11->product_id");
}

echo $sum;?></th>
<th><?php 
$implode=implode(', ', $out);
if($implode==''){
$data=$implode=0;
}
else
{
$data=$implode;
}
$qtySum=0;
$i=0;
$queryqc=$this->db->query("select * from tbl_tailor where finishProductId in ($data)");
foreach($queryqc->result() as $fetchqqc){
	//echo $explode[$i].",";
	//echo $fetchqqc->qty.",";
	$qtySum=$qtySum+$fetchqqc->qty;
}
echo $qtySum;
?></th>
<th><?php 
$qtyPacking=0;
$queryqc=$this->db->query("select * from tbl_qualitiy_check where finishProductId in ($data)");
foreach($queryqc->result() as $fetchqqc){
	//echo $explode[$i].",";
	//echo $fetchqqc->qty.",";
	$qtyPacking=$qtyPacking+$fetchqqc->qty;
}
echo $qtyPacking;
?></th>
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
