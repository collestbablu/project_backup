<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dropdown-customer/semantic.js"></script>
<link type="text/css" href="<?php echo base_url();?>assets/dropdown-customer/semantic.css" rel="stylesheet" />
<?php
$this->load->view("header.php");

?>

	 <!-- Main content -->
	 <div class="main-content">
<form class="form-horizontal" role="form" method="post" action="insert_item" enctype="multipart/form-data">			
			<ol class="breadcrumb breadcrumb-2"> 
<li><a href="index.html"><i class="fa fa-home"></i>Dashboard</a></li> 
<li><a href="form-basic.html">Master</a></li> 
<li class="active"><strong>Add Product</strong></li>
<div class="pull-right">
<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modal-0">Add Product</button>
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Product</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Code:</label> 
<div class="col-sm-4"> 
	<?php 
					$query=$this->db->query("select * from tbl_product_stock order by Product_id desc");
					$fetchR=$query->row();
					
					$productId=$fetchR->Product_id+1;
	?>
			
<input type="hidden"  name="Product_id" value="<?php echo $branchFetch->Product_id; ?>" />
<input type="text" class="form-control" name="sku_no" value="" > 
</div> 
<label class="col-sm-2 control-label">*Industry Type:</label> 
<div class="col-sm-4"> 
<select name="industry" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=20");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Type:</label> 
<div class="col-sm-4"> 
<select name="type" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=17");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category" required class="form-control" onchange="changing(this.value)">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id!='121'");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select>
</div>  
</div>

<!--============================================================-->
<div class="form-group">
<label class="col-sm-2 control-label">*Sub Category:</label> 
<div class="col-sm-4"> 
<div id="subcategory">
<select name="subcategory" class="form-control">
						<option value="">----Select----</option>
					<?php 
						$sqlgroup11=$this->db->query("select * from tbl_prodcatg_m where status='B'");
						foreach ($sqlgroup11->result() as $fetchgroup11){						
					?>					
    <option value="<?php echo $fetchgroup11->product_Catid; ?>"><?php echo $fetchgroup11->categoryName ; ?></option>

    <?php } ?></select>
</div>  
</div>
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $branchFetch->productname; ?>" class="form-control" required> 
</div>
</div>
<!--===========================================================-->

<div class="form-group">
<label class="col-sm-2 control-label">Color:</label> 
<div class="col-sm-4"> 
<select name="color[]"  class="form-control ui fluid search dropdown email" multiple="multiple">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=19");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select> 
</div> 
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4"> 
		  <select name="unit" required class="form-control">
					<option value="" >----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>"><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>
</div> 
</div>
<div class="form-group">
<label class="col-sm-2 control-label">*HSN Code:</label> 
<div class="col-sm-4"> 
<input name="hsn_code"  type="text" value="<?php echo $branchFetch->productname; ?>" class="form-control" required> 
</div>
<label class="col-sm-2 control-label">*GST Tax:</label> 
<div class="col-sm-4"> 
<input name="gst_tax"  type="text" value="<?php echo $branchFetch->productname; ?>" class="form-control" required> 
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" value="<?php echo $fetch_list->unitprice_sale; ?>" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" value="<?php echo $fetch_list->unitprice_purchase; ?>" class="form-control" required>
</div> 
</div>


<div class="form-group" style="display:none"> 
<label class="col-sm-2 control-label">Image:</label> 
<div class="col-sm-4"> 
<input type="file" name="image_name" accept="image/*" onchange="loadFile(event)" /><img src="<?php echo base_url()?>assets/images/no_image.png" height="38" width="50" />
</div> 
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<a href="#/" class="btn btn-secondary btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
</div>
</ol>
</form>	
<?php
            if($this->session->flashdata('flash_msg')!='')
{
            ?>
<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php }?>		
			<div class="row">
				<div class="col-lg-12">
						<div class="panel-body">
							<div class="table-responsive">
			<form class="form-horizontal" method="post" action="update_item"  enctype="multipart/form-data">					
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	   <th>Product Code </th>
       <th>Product Type </th>
		<th>Category</th>
        <th>Product Name</th>
		<th>Usages Unit</th>
        <th>Sales Price</th>
		<th>Purchase Price</th>
		  <th style="display:none">Image</th>
		 <th>Action</th>
</tr>
</thead>

<tbody>
<?php  
$i=1;
  foreach($result as $fetch_list)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->Product_id; ?>">
<th>
<?php
										//$productId= $fetch_list->Product_id;

										//$checkProduct=$productId;
  // if($checkProduct=='1')
//{
?><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->Product_id; ?>" value="<?php echo $fetch_list->Product_id;?>" />
<?php //} else{
	?>

 	
<?php //}?>
</th>
<?php
$queryType=$this->db->query("select *from tbl_master_data where serial_number='$fetch_list->type'");
$getType=$queryType->row();


?>

<th><?=$fetch_list->sku_no;?></th>
<th><?=$getType->keyvalue;?></th>
<th>
<?php 
 $compQuery = $this -> db
           -> select('*')
           -> where('prodcatg_id',$fetch_list->category)
           -> get('tbl_prodcatg_mst');
		  $compRow = $compQuery->row();

echo $compRow->prodcatg_name;
?>

 </th>
<th><?=$fetch_list->productname;?></th>
<th><?php
$compQuery1 = $this -> db
           -> select('*')
           -> where('serial_number',$fetch_list->usageunit)
           -> get('tbl_master_data');
		  $keyvalue1 = $compQuery1->row();
echo $keyvalue1->keyvalue;		  

?></th>
<th><?=$fetch_list->unitprice_sale;?></th>
<th><?=$fetch_list->unitprice_purchase;?></th>
<th style="display:none;"><?php if($fetch_list->product_image!=''){?><img src="<?php echo base_url().'assets/image_data/'.$fetch_list->product_image;?>" height="38" width="50" /> <?php } else {?><img src="<?php echo base_url()?>assets/images/no_image.png" height="38" width="50" /><?php }?> </th>
<th class="bs-example">
<?php if($view!=''){ ?>

<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i;?>" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" data-a="<?php echo $fetch_list->Product_id;?>" onclick="editItem(<?=$fetch_list->Product_id;?>)" href='#editItem' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='Product_id';
$table_name='tbl_product_stock';
?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->Product_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>		
<?php
  ?>
 
</th>
</tr>
<div id="modal-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">VIew Product</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Code:</label> 
<div class="col-sm-4"> 
	<?php 
					$query=$this->db->query("select * from tbl_product_stock order by Product_id desc");
					$fetchR=$query->row();
					
					$productId=$fetchR->Product_id+1;
	?>
			
<input type="hidden"  name="Product_id" value="<?php echo $fetch_list->Product_id;?>" readonly="" />
<input type="text" class="form-control" name="sku_no" value="<?php echo $fetch_list->sku_no;?>" readonly=""> 
</div> 
<label class="col-sm-2 control-label">*Industry Type:</label> 
<div class="col-sm-4"> 
<select name="industry" required class="form-control" disabled="disabled">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=20");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"<?php if($fetch_protype->serial_number==$fetch_list->industry){?>selected<?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Type:</label> 
<div class="col-sm-4"> 
<select name="type" required class="form-control" disabled="disabled">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=17");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"<?php if($fetch_protype->serial_number==$fetch_list->type){?>selected<?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category" required class="form-control" onchange="changing(this.value)" disabled="disabled">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id!='121'");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if($fetchgroup->prodcatg_id==$fetch_list->category){?>selected<?php }?>><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select>
</div>  
</div>

<!--============================================================-->
<div class="form-group">
<label class="col-sm-2 control-label">*Sub Category:</label> 
<div class="col-sm-4"> 
<div id="subcategory">
<select name="subcategory" class="form-control" disabled="disabled">
						<option value="">----Select----</option>
					<?php 
						$sqlgroup11=$this->db->query("select * from tbl_prodcatg_m where catg_id='$fetch_list->category'");
						foreach ($sqlgroup11->result() as $fetchgroup11){						
					?>					
    <option value="<?php echo $fetchgroup11->product_Catid; ?>"<?php if($fetchgroup11->product_Catid==$fetch_list->subcategory){?>selected<?php }?>><?php echo $fetchgroup11->categoryName ; ?></option>

    <?php } ?></select>
</div>  
</div>
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $fetch_list->productname; ?>" readonly="" class="form-control" required> 
</div>
</div>
<!--===========================================================-->

<div class="form-group">
<label class="col-sm-2 control-label">Color:</label> 
<div class="col-sm-4"> 
<select name="color[]"  class="form-control ui fluid search dropdown email" multiple="multiple" disabled="disabled">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=19");
						foreach ($sqlprotype->result() as $fetch_protype){
						$explode=explode(",",$fetch_list->color);
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"<?php for ($j=0;$j<=count($fetch_list->color);$j++){  $ex=$explode[$j]; if($fetch_protype->serial_number==$ex){ ?> selected <?php } }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select> 
</div> 
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4"> 
		  <select name="unit" required class="form-control" disabled="disabled">
					<option value="" >----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>"<?php if($fetchunit->serial_number==$fetch_list->usageunit){?>selected<?php }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>
</div> 
</div>
<div class="form-group">
<label class="col-sm-2 control-label">*HSN Code:</label> 
<div class="col-sm-4"> 
<input name="hsn_code"  type="text" value="<?php echo $fetch_list->hsn_code; ?>" class="form-control" readonly="" required> 
</div>
<label class="col-sm-2 control-label">*GST Tax:</label> 
<div class="col-sm-4"> 
<input name="gst_tax"  type="text" value="<?php echo $fetch_list->gst_tax; ?>" class="form-control" readonly="" required> 
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" value="<?php echo $fetch_list->unitprice_sale; ?>" readonly="" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" value="<?php echo $fetch_list->unitprice_purchase; ?>" readonly="" class="form-control" required>
</div> 
</div>

<div class="form-group" style="display:none"> 
<label class="col-sm-2 control-label">Image:</label> 
<div class="col-sm-4"> 
<input type="file" name="image_name" accept="image/*" onchange="loadFile(event)" /><img src="<?php echo base_url()?>assets/images/no_image.png" height="38" width="50" />
</div> 
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_product_stock">  
<input type="text" style="display:none;" id="pri_col" value="Product_id">
</table>
<?php
$limit=10;
//$sql = "SELECT count(Product_id) FROM tbl_product_stock";
$result = $this->db->query("SELECT * FROM tbl_product_stock");
$total_rows = $result->num_rows();

 
// DETERMINE NUMBER OF PAGES
if ($total_rows > $limit) {
    $number_of_pages = ceil($total_rows / $limit);
} else {
    $pages = 1;
    $number_of_pages = 1;
}
?>
 <?php
    // SHOW PAGE NUMBERS
    if ($page) {
        echo "<a href='index.php?page=1'>First</a> ";
    }
    for ($i=1;$i<=$number_of_pages;$i++) {
		?>
        
        <a href='<?=base_url();?>master/Item/manage_item?page=<?=$i;?>'><?=$i;?></a>
    <?php
    }    
    if (($page + 1) != $number_of_pages) {
        echo "<a href='master/Item/manage_item?page=$number_of_pages'>Last</a> ";
    }
    ?>
</form>
</div>
</div>
</div>
</div>
</div>
<form class="form-horizontal" role="form" method="post" action="update_item" enctype="multipart/form-data">			
<div id="editItem" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contentitem" id="contentitem">

        </div>
    </div>	 
</div>
</form>
<script>

function editItem(v){
//alert(v);
var pro=v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "updateItem?ID="+pro, false);
  xhttp.send();
  document.getElementById("contentitem").innerHTML = xhttp.responseText;
}


function changing(v){
//alert(v);
var pro=v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "changesubcatg?ID="+pro, false);
  xhttp.send();
  //alert(xhttp.responseText);
  document.getElementById("subcategory").innerHTML = xhttp.responseText;
  document.getElementById("subcategory11").innerHTML = xhttp.responseText;
}

</script>	
<?php

$this->load->view("footer.php");
?>