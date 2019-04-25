<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/Item.php');
$objj=new Item();
$CI =& get_instance();
$entries = "";
if($this->input->get('entries')!=""){
  $entries = $this->input->get('entries');
}

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
<input type="text" class="form-control" name="sku_no" value="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo $branchFetch->sku_no;}else{ echo $productId;} ?>" readonly> 
</div> 
<label class="col-sm-2 control-label">*Bar Code Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $branchFetch->productname; ?>" class="form-control" <?php if($_GET['view']!='') {?> readonly="" <?php }?> required> 
</div> 
</div>

<!--============================================================-->
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Type:</label> 
<div class="col-sm-4"> 
<select name="type" required class="form-control" onChange="showviatype(this.value)">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=17");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div>
<div id="viatype" style="display:none">
<label class="col-sm-2 control-label">Via:</label> 
<div class="col-sm-4"> 
<select name="via_type"  class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=19");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
</div>

</div>
<!--===========================================================-->

<div class="form-group"> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category" required class="form-control ui fluid search dropdown email">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id!='121'");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select>
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
<label class="col-sm-2 control-label">Size:</label> 
<div class="col-sm-4"> 
<select name="size"  class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=18");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select> 
</div>

<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" value="<?php echo $fetch_list->unitprice_sale; ?>" class="form-control" required>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" value="<?php echo $fetch_list->unitprice_purchase; ?>" class="form-control" required>
</div> 

<label class="col-sm-2 control-label">Minimum Reorder Level:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="min_re_order_level" value="<?php echo $fetch_list->min_re_order_level; ?>" class="form-control">
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

<a href="#/" class="btn btn-secondary btn-sm delete_all"><i class="fa fa-trash-o"></i> Delete All</a>
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
<div class="col-sm-12" id="listingData">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<a class="dt-button buttons-excel buttons-html5" style="display:none;" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>

</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" url="<?=base_url();?>master/Item/manage_item" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
</select>
entries</label>
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -5px;margin-left: 12px;float: right;">Showing <?=$dataConfig['page']+1;?> to 
<?php
$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
?> of <?=$dataConfig['total'];?> entries
</div>
</div>

<div id="DataTables_Table_0_filter" class="dataTables_filter">
<label>Search:
<input type="text" id="searchTerm"  class="search_box form-control input-sm" onkeyup="doSearch()"  placeholder="What you looking for?">
</label>
</div>
</div>

</div>
</div>

<div class="row">
	<div class="col-lg-12">
			<div class="panel-body">
				<div class="table-responsive">
					
<table class="table table-striped table-bordered table-hover dataTables-example-" id="getDataTable"  >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	   <th>Product Code </th>
       <th>Product Type </th>
		<th>Category</th>
        <th>Bar Code Name</th>
		<th>Usages Unit</th>
        <th>Sales Price</th>
		<th>Purchase Price</th>
		 <th style="width: 115px;">Action</th>
</tr>
</thead>

<tbody >
<form method="get">
<tr>
	<td>&nbsp;</td>
	<td><input name="sku_no"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="type"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="category"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="productname"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="usages_unit"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="purchase_price" type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="sale_price" type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>


<?php  
$i=1;
  foreach($result as $fetch_list)
  {
  ?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->Product_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->Product_id; ?>" value="<?php echo $fetch_list->Product_id;?>" /></th>
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
 
<?php 
$size=$this->db->query("select *from tbl_master_data where serial_number='$fetch_list->size'");
$psize=$size->row();
if($psize->keyvalue !='')
{
?>
<th><?php echo $fetch_list->productname .'   ( '.$psize->keyvalue .')' ; } else { ?></th>
<th><?php echo $fetch_list->productname; } ?></th>

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

<th class="bs-example">
<?php if($view!=''){ ?>

<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal-<?php echo $i;?>" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" data-a="<?php echo $fetch_list->Product_id;?>" href='#editItem' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='Product_id';
$table_name='tbl_product_stock';
?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->Product_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>		
<?php
  ?>
 
</th>
</tr>

<form1 class="form-horizontal" method="post" action=""  enctype="multipart/form-data">

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
<input type="text" class="form-control" name="sku_no[]" value="<?php echo $fetch_list->sku_no; ?>" readonly> 
</div> 
<label class="col-sm-2 control-label">*Bar Code Name:</label> 
<div class="col-sm-4"> 
<input name="item_name[]"  type="text" value="<?php echo $fetch_list->productname; ?>" readonly class="form-control" required> 
</div> 
</div>
<div class="form-group"> 

<label class="col-sm-2 control-label">*Product Type:</label> 
<div class="col-sm-4"> 
<select name="type" required class="form-control" disabled="disabled" >
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=17");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->type){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
<div  <?php if($fetch_list->type==14){}else{?> style="display:none"<?php }?>>
<label class="col-sm-2 control-label">Via:</label> 
<div class="col-sm-4"> 
<select name="via_type" required class="form-control" disabled="disabled">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=19");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->via_type){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>

</div>
</div>

</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category[]" class="form-control ui fluid search dropdown email1" disabled="disabled">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id!='121'");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if($fetchgroup->prodcatg_id==$fetch_list->category){?>selected<?php }?>><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select>
</div>
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4" > 
<select name="unit[]" class="form-control" disabled="disabled">
					<option value="">----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>" <?php if($fetchunit->serial_number==$fetch_list->usageunit){ ?> selected <?php }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>
</div>

 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Size:</label> 
<div class="col-sm-4" id="regid"> 
<select name="size[]"  class="form-control" disabled="disabled">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=18");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_list->size==$fetch_protype->serial_number){?> selected="selected"<?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div>

<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale[]" value="<?php echo $fetch_list->unitprice_sale; ?>" readonly="" class="form-control" required>
</div> 


</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase[]" value="<?php echo $fetch_list->unitprice_purchase; ?>" readonly="" class="form-control" required>
</div> 

<label class="col-sm-2 control-label">Minimum Reorder Level:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="min_re_order_level[]" value="<?php echo $fetch_list->min_re_order_level; ?>" readonly="" class="form-control" required>
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

</form1>

</div>


<div class="row">
<div class="col-md-12 text-right">
<div class="col-md-6 text-left"> 
<!-- <h6>Showing 1 to 10 of <?php echo $totalrow; ?> entries</h6> -->

</div>
<div class="col-md-6"> 
<?php echo $pagination; ?>
</div>

<div class="popover fade right in displayclass" role="tooltip" id="popover" style=" background-color: #ffffff;border-color: #212B4F;"><!-- <div class="arrow" style="top: 50%;"></div>  -->
<div class="popover-content" id="showParent"></div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<form class="form-horizontal" role="form" method="post" action="update_item" enctype="multipart/form-data">			
<div id="editItem" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-contentitem">

        </div>
    </div>	 
</div>
</form>
<script>
    $('.modalEditItem').click(function(){
        var ID=$(this).attr('data-a');
	    $.ajax({url:"updateItem?ID="+ID,cache:true,success:function(result){
            $(".modal-contentitem").html(result);
        }});
    });
	
	
function showviatype(v)
{
//alert(v);
	if(v==14){
		document.getElementById("viatype").style.display="Block";
	}else{
		document.getElementById("viatype").style.display="none";
	}
}

function showviatype11(v)
{
//alert(v);
	if(v==14){
		document.getElementById("viatypeeee").style.display="Block";

	}else{
		document.getElementById("viatypeeee").style.display="none";
		document.getElementById("via_type").value='';

	}
}
</script>	
<?php

$this->load->view("footer.php");
?>