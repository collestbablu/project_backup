<body>
<?php
$this->load->view("header.php");
$tableName='tbl_product_stock';
$location='manage_item';
		
		$userQuery = $this -> db
           -> select('*')
		   -> where('Product_id',$_GET['id'])
		   -> or_where('Product_id',$_GET['view'])
           -> get('tbl_product_stock');
		  $branchFetch = $userQuery->row();

?>
	<!-- Main content -->
	<div class="main-content">
		
		<?php if(@$_GET['popup'] == 'True') {} else {?>
		<ol class="breadcrumb breadcrumb-2"> 
			
			<li><a class="btn btn-success" href="<?=base_url();?>master/Item/manage_item">Manage Product</a></li> 
			
		</ol>
		<ol class="breadcrumb breadcrumb-2"> 
				<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
				<li><a href="#">Master</a></li> 
				<li><a href="#">Product</a></li> 
				<li class="active"><strong><a href="#">Add Product</a></strong></li> 
			</ol>
		<?php }?>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<?php if($_GET['id']!=''){ ?>
		<h4 class="panel-title">Update Product</h4>
		<?php }elseif($_GET['view']!=''){ ?>
		<h4 class="panel-title">View Product</h4>
		<?php }else{ ?> 
		<h4 class="panel-title"><strong>Add Product</strong></h4>
		<?php } ?>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="insert_item" enctype="multipart/form-data">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Code:</label> 
<div class="col-sm-4"> 
	<?php 
					$query=$this->db->query("select * from tbl_product_stock order by Product_id desc");
					$fetchR=$query->row();
					
					$productId=$fetchR->Product_id+1;
	?>
			
<input type="hidden"  name="Product_id" value="<?php echo $branchFetch->Product_id; ?>" />
<input type="text" class="form-control" name="sku_no" value="<?php echo $branchFetch->Product_id; ?>" readonly> 
</div> 
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $branchFetch->productname; ?>" class="form-control" <?php if($_GET['view']!='') {?> readonly="" <?php }?> required> 
</div> 
</div>
<div class="form-group"> 
<div class="field">
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4">
  <select name="category[]" id="contact_id_copy" class="form-control ui fluid search dropdown email" multiple="multiple" required <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?> >
    <option value="">----Select ----</option>
    <?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where main_prodcatg_id='121'");
						foreach ($sqlgroup->result() as $fetchgroup){
						
					?>
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchgroup->prodcatg_id==$branchFetch->category){ ?> selected <?php } }?>><?php echo $fetchgroup->prodcatg_name ; ?></option>
    <?php } ?>
  </select>
  <a onClick="openpopup('<?=base_url();?>master/ProductCategory/add_itemctg',900,630,'mid','121')"><img src="<?php echo base_url();?>/assets/images/addcontact.png" style="display:none" width="25px" height="25px"/></a> </div> 
</div>
<div class="field">
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4" id="regid"> 
<select name="unit[]" id="contact_id_copy1" required class="form-control ui fluid search dropdown email" multiple="multiple" <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>>
					<option value="" selected disabled>----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>" <?php if(@$_GET['id']!='' || @$_GET['view']!=''){ if($fetchunit->serial_number==$branchFetch->usageunit){ ?> selected <?php } }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>
</div> 
</div>
</div>
<div class="form-group">   
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="unitprice_purchase" min="1" step="any" value="<?php echo $branchFetch->unitprice_purchase; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div>  
<label class="col-sm-2 control-label">*Sales Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="unitprice_sale" min="1" step="any" value="<?php echo $branchFetch->unitprice_sale; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Hsn Code:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="hsn_code" min="1" step="any" value="<?php echo $branchFetch->hsn_code; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div>  
<label class="col-sm-2 control-label">*GST Tax:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="gst_tax" value="<?php echo $branchFetch->gst_tax; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
</div>
<div class="form-group">
<label class="col-sm-2 control-label">*Minimum Reorder Level:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="min_re_level" min="1" step="any" value="<?php echo $branchFetch->min_re_level;?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div>  
<label class="col-sm-2 control-label">Peice Per Unit:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="p_p_unit" min="1" step="any" value="<?php echo $branchFetch->p_p_unit;?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control">
</div>  
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Image:</label> 
<div class="col-sm-4" id="regid"> 
<input type="file" name="image_name" accept="image/*" onChange="loadFile(event)" /><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ ?> <img id="output" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$branchFetch->product_image; }?>"  width = "100" height = "100"/><?php } else { ?><img id="output" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$branchFetch->product_image; }?>"  width = "100" height = "100"/><?php }?>
</div> 
</div>
<div class="form-group">
<div class="col-sm-4 col-sm-offset-2">
<?php if(@$_GET['popup'] == 'True') {
if($_GET['id']!=''){
?>
<input type="submit" class="btn btn-primary" value="Save">
<?php } ?>
<a href="" onClick="popupclose(this.value)"  title="Cancel" class="btn btn-blue"> Cancel</a>

	   	 <?php }else {  ?>
		 
		<input type="submit" class="btn btn-primary" value="Save">
       <a href="<?=base_url();?>master/Item/manage_item" class="btn btn-blue">Cancel</a>

       <?php } ?>

</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php
$this->load->view("footer.php");

?>
</body>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

function abc(val)
{

if(val=='new')
{
  newwindow=window.open('<?=base_url();?>SalesOrder/all_product_function?&popup=True&id='+val,'name','height=500,width=1200');
if (window.focus) {newwindow.focus()}
return false;

 // openpopup('<?=base_url();?>SalesOrder/all_product_function',1200,500,'view',<?=$sales[$i]['1'];?>)
  //alert();
}
}
</script>
