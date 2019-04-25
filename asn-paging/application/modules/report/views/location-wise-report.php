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
<h4 class="panel-title">LOCATION WISE REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="totalsearchStock">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Product Name</label> 
<div class="col-sm-3"> 
<input type="text" name="p_name" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Product Code</label> 
<div class="col-sm-3"> 
<input type="text" name="p_code" class="form-control" value="" /> 
</div>
<label class="col-sm-2 control-label"><button type="submit" name="Show" class="btn btn-info" value="Show">Show</button></label>  
</div>
</form>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
 		<th>Serial No.</th>
        <th>Product Name</th>
		<th>Product Code</th>   
		<th>Category</th>
		<th>Unit</th>
		<th>Unit Price Purchase</th>
		<th>Unit Price Sale</th>
		<th>Location</th>
		<th>Color</th>
		<th>Size</th>
		<th>Qty In Stock</th>
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($totalSearchStock)) {
foreach($totalSearchStock as $rows) {
?>
<tr class="gradeC record">
<th><?php echo $yy++; ?></th>
<th><?php 

	$sql1 = $this->db->query("select * from tbl_product_stock where product_id='".$rows->product_id."' ");
			$sql2 = $sql1->row();
			echo $sql2->productname; ?></th>
<th><?php echo $sql2->sku_no; ?></th>
<th><?php 

	$sql1 = $this->db->query("select * from  tbl_prodcatg_mst where prodcatg_id='".$sql2->category."' ");
			$sql3 = $sql1->row();
			echo $sql3->prodcatg_name; ?></th>
<th><?php 
	
		$sql1 = $this->db->query("select * from  tbl_master_data where serial_number='".$sql2->usageunit."' ");
			$sql3 = $sql1->row();
			echo $sql3->keyvalue; ?></th>	
<th><?php echo $sql2->unitprice_purchase;?></th>	
<th><?php echo $sql2->unitprice_sale;?></th>
<th>
<?php 

	$sql1 = $this->db->query("select * from  tbl_location where id='".$rows->location_id."' ");
			$sql3 = $sql1->row();
			echo $sql3->location_name; ?>
			</th>
<th>
<?php 
	
	$sql1 = $this->db->query("select * from  tbl_master_data where serial_number='".$rows->color."' ");
			$sql3 = $sql1->row();
			echo $sql3->keyvalue; ?></th>
<th><?php 

		/* $sql1 = $this->db->query("select * from  tbl_master_data where serial_number='".$rows->size."' ");
			$sql3 = $sql1->row();
			echo $sql3->keyvalue; */
			echo $rows->size;
			?></th>
<th><?php echo $rows->quantity; ?></th>
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