<?php
$this->load->view("header.php");
$id=$_GET['id'];

	$query=$this->db->query("select * from tbl_production_hdr where productionid='$id' ");	
	$fetchq=$query->row();


?>
<form >
<!-- Main content -->
	<div class="main-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title"><strong>View Master Cutting</strong></h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" <?php if($_GET['view']!=''){?> oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' <?php }?> >
<tbody>
<tr class="gradeA">
<th>Raw Material</th>

<th>Usages Unit</th>

<th>Quantity</th>
<th>Total Quantity</th>
</tr>
<?php
@extract($_POST);

if($search!='')
{

$productionDtlQuery=$this->db->query("select *from tbl_production_dtl where productionhdr='$getProduct->templateid'");
}
else
{
$productionDtlQuery=$this->db->query("select *from tbl_production_dtl where productionhdr='".$_GET['id']."' or productionhdr='".$_GET['view']."'");
	
}
$i=1;
foreach($productionDtlQuery->result() as $getProduction){
	

$productQuery=$this->db->query("select *from tbl_product_stock where product_id='$getProduction->product_id'");
$getProduct=$productQuery->row();

$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getProduct->usageunit'");
$getUnit=$unitQuery->row();


?>

<tr class="gradeA">
<th style="width:280px;">
<input type="text" name="prd" value="<?=$getProduct->productname;?>"   class="form-control"  style=" width:230px;"  tabindex="5" >
</th>
<input type="hidden" name="product_idd[]" value="<?=$getProduct->Product_id;?>" />
<th>
<input type="text" readonly="" id="usunit" value="<?=$getUnit->keyvalue;?>" style="width:70px;" class="form-control"> 
</th>
<th><input type="number" value="<?=$getProduction->quantity;?>" id="qn" min="1" style="width:70px;" name="qn"   class="form-control"></th>

<th><input type="number" name="tot_qty" id="qn" min="1" style="width:100px;" value="<?=$getProduction->tot_qty;?>"   class="form-control"></th>
</tr>
<?php  } ?>
</tbody>
</table>
</div>



<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" <?php if($_GET['view']!=''){?> oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' <?php }?> >


<tbody>

<tr class="gradeA">
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th><a onclick="popupclose(this.value)" class="btn btn-secondary  btn-sm">Cancel</a></th>
</tr>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
</form>
<?php
$this->load->view("footer.php");
?>