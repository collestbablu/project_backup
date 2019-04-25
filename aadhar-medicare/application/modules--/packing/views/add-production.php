<?php
$this->load->view("header.php");
$tableName='tbl_contact_m';
$location='manage_contact';
		
		$userQuery = $this -> db
           -> select('*')
		   -> where('contact_id',$_GET['id'])
		   -> or_where('contact_id',$_GET['view'])
           -> get('tbl_contact_m');
		  $branchFetch = $userQuery->row();

$quryinv=$this->db->query("select *from tbl_sales_order_hdr");
$getInv=$quryinv->row();

?>

<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=42epwf1jarbwose89sqt3dztyfu7961g4cs5xoib4kordvbd"></script>
  <script>tinymce.init({ selector:'#tem' });</script>

	<div class="main-content">

		<?php if(@$_GET['popup'] == 'True') {} else {?>
		<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Production</a></li> 
				<li class="active"><strong><a href="#">Manage Master Cutting</a></strong></li> 
				<div class="pull-right">
				<a class="btn btn-sm" href="<?=base_url();?>production/manage_production">Manage Master Cutting </a>
				</div>
			</ol>
		<?php }?>
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
							<h4 class="panel-title"><strong>Add Master Cutting</strong></h4>
							
       
<div class="panel-body">
<form  method="POST"  enctype="multipart/form-data">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >
<thead>
<tr>
<th>Production Goods </th>
<th>
<div class="field">
	<select name="product_id"  required id="contact_id_copy" class="form-control ui fluid search dropdown email" onChange="document.getElementsByName('contactid')[0].value=this.value;"   <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>>
		<option value="" selected disabled>Select</option>
		<?php
		$contQuery=$this->db->query("select * from tbl_product_stock where status='A' and type='14'");
		foreach($contQuery->result() as $contRow)
		{
		?>
			<option value="<?php echo $contRow->Product_id; ?>" <?php if($_REQUEST['product_id']!=''){?> selected="selected" <?php }?>>
			<?php echo $contRow->productname; ?>
			</option>
			<?php } ?>
	</select>
</div>

</th>

<th>Qty</th>
<th>
<input type="number" step="any" style="width:100px;"  class="form-control" required name="qty" value="<?php echo $_REQUEST['qty'];?>" />
</th>

<th>Date</th>
<th>
<input type="date"  class="form-control"  required name="date" value="<?php echo $_REQUEST['date'];?>" />
</th>

<th>&nbsp;</th>
<th>
<input type="submit" class="btn btn-sm" name="search" value="Search"  />
</th>

</tr>
</thead>


</table>
</div>

</form>
<form id="f1" name="f1" method="POST" action="insertProduction" onSubmit="return checkKeyPressed(a)" enctype="multipart/form-data">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >
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

$productionQuery=$this->db->query("select *from tbl_template_hdr where product_id='$product_id'");
$getProduct=$productionQuery->row();

$productionDtlQuery=$this->db->query("select *from tbl_template_dtl where templatehdr='$getProduct->templateid'");
$i=1;
foreach($productionDtlQuery->result() as $getProduction){
	

$productQuery=$this->db->query("select *from tbl_product_stock where product_id='$getProduction->product_id'");
$getProduct=$productQuery->row();

$unitQuery=$this->db->query("select *from tbl_master_data where serial_number='$getProduct->usageunit'");
$getUnit=$unitQuery->row();


?>

<tr class="gradeA">
<th style="width:280px;">
<input type="text" name="prd" readonly="readonly" value="<?=$getProduct->productname;?>"   class="form-control"  id="prd" style=" width:230px;"   tabindex="5" >
</th>
<input type="hidden" name="finished_goods" value="<?=$_REQUEST['product_id']?>" />
<input type="hidden" name="date" value="<?=$_REQUEST['date']?>" />
<input type="hidden" name="hdr_qty" value="<?=$_REQUEST['qty']?>" />
<input type="hidden" name="product_id[]" value="<?=$getProduct->Product_id;?>" />
<th>
<input type="text" readonly="" id="usunit" style="width:70px;" value="<?=$getUnit->keyvalue;?>" class="form-control"> 
</th>
<th><input type="number" name="qn[]" id="qn" min="1" style="width:70px;" value="<?=$getProduction->quantity;?>"   class="form-control"></th>
<th><input type="number" id="qn" min="1" name="tot_qty[]" style="width:70px;" value="<?=$getProduction->quantity*$qty;?>"   class="form-control"></th>

</tr>

<?php 
$sum=$sum+$i;
$i++;
} }?>

<input type="hidden" name="rows" value="<?=$sum;?>" />
</tbody>
</table>
</div>



<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >


<tbody>
<tr class="gradeA">
<th>

<th>&nbsp;</th>
<th><input class="btn btn-sm" type="button" value="SAVE"   id="sv1" onclick="fsv(this)" >&nbsp;<a href="<?=base_url();?>production/manage_production" class="btn btn-secondary  btn-sm">Cancel</a></th></th>
</tr>
</tbody>
</table>
</div>
</form>
</div>

</div>
</div>
</div>
<script>

function fsv(v)
{
v.type="submit";
}

</script>
<?php
$this->load->view("footer.php");
?>