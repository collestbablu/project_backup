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
				<li><a href="#">QC</a></li> 
				<li class="active"><strong><a href="#">Qc List</a></strong></li> 
				<div class="pull-right">
				<a class="btn btn-sm" href="<?=base_url();?>qc/manage_qc">Manage QC </a>
				</div>
			</ol>
		<?php }?>
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
							<h4 class="panel-title"><strong>Add QC</strong></h4>
							
       
<div class="panel-body">
<form  method="POST"  enctype="multipart/form-data">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >
<thead>
<tr>
<th>Production Goods </th>
<th>
<div class="field">
<input type="hidden"  name="product_id" id='select_id'  value=""  />
<input type="hidden"  name="tableName" id='tableName'  value="tbl_product_stock"  />
<input type="hidden"  name="fieldName" id='fieldName'  value="productname"  />
<input type="hidden"  name="priId" id='priId'  value="Product_id"  />

	<input   required id="search_id" class="form-control" onkeyup="searchData();" style="width:200px;"  <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>>
    <img   src="<?php echo base_url();?>/assets/images/search11.png"  onclick="showall()"/>
		<div id="prdsrch" style="color:black;padding-left:0px; width:30%; height:110px; max-height:110px;overflow-x:auto;overflow-y:auto;padding-bottom:5px;padding-top:0px; position:absolute;">
<?php
//include("getproduct.php");
$this->load->view('search_data');

?>
</div>
</div>

</th>

<th>Qty</th>
<th>
<input type="number" onclick="clear_data();" step="any" id="qn" style="width:100px;"  class="form-control" required name="qty" value="<?php echo $_REQUEST['qty'];?>" />
</th>

<th>Date</th>
<th>
<input type="date"  class="form-control"  required name="date" value="<?php echo $_REQUEST['date'];?>" />
</th>

<th>&nbsp;</th>
<th>
<input type="submit" class="btn btn-sm" name="search" value="ADD"  />
</th>

</tr>
</thead>


</table>
</div>

</form>
<form id="f1" name="f1" method="POST" action="insert_qc" onSubmit="return checkKeyPressed(a)" enctype="multipart/form-data">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >
<tbody>

<tr class="gradeA">
<th>Packing Material</th>
<th>Usages Unit</th>

<th>Quantity</th>
<th>Total Quantity</th>
</tr>
<?php
@extract($_POST);

if($search!='')
{
//echo $product_id;
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
<input type="hidden" name="finishProduct" value="<?=$_REQUEST['product_id']?>" />
<input type="hidden" name="date" value="<?=$_REQUEST['date']?>" />
<input type="hidden" name="qty" value="<?=$_REQUEST['qty']?>" />
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
<th><input class="btn btn-sm" type="button" value="SAVE"   id="sv1" onclick="fsv(this)" >&nbsp;<a href="<?=base_url();?>qc/manage_qc" class="btn btn-secondary  btn-sm">Cancel</a></th></th>
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



<script>
function showall()

 {

 //var productcatid=document.getElementById("Productctg_id").value;
 //alert(productcatid);
 
	 var w = 400;

        var h = 200;

        var left = Number((screen.width/2)-(w/2));

        var tops = Number((screen.height/2)-(h/2));
   var myWindow = window.open('all_product_function?&popup=True', "myWindow", "width=1000, height=600,top=10, left=100");
  
   }

</script>