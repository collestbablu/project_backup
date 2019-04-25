<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/Item.php');
$objj=new Item();
$CI =& get_instance();

$list='';

$list=$objj->item_list();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_product_stock';

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}


?>
<!-- Main content -->
<div class="main-content">
<form class="form-horizontal" role="form" method="post" action="<?=base_url();?>master/Item/insert_item" enctype="multipart/form-data">	
<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a href="#">Master</a></li> 
	<li class="active"><strong><a href="#">Manage Product</a></strong></li> 
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
<label class="col-sm-2 control-label">*Item/Part No.:</label> 
<div class="col-sm-4"> 		
<input type="hidden"  name="Product_id" value="<?php echo $branchFetch->Product_id; ?>" />
<input type="text" class="form-control" name="sku_no" value="<?php echo $branchFetch->sku_no;?>"> 
</div> 
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $branchFetch->productname; ?>" class="form-control" <?php if($_GET['view']!='') {?> readonly="" <?php }?> required> 
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category" required  class="form-control ui fluid search dropdown email">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_name != 'Category' ");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select>
</div> 
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4" id="regid"> 
<select name="unit" id="contact_id_copy1" required class="form-control"  <?php if(@$_GET['view']!=''){ ?> disabled="disabled" <?php }?>>
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
<div class="form-group"> 

<label class="col-sm-2 control-label">*Description:</label> 
<div class="col-sm-4" id="regid"> 
<td><textarea type="text" required name="description" class="form-control"/><?php  echo $row->description;?></textarea>
</div> 
<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="unitprice_sale" min="1" step="any" value="<?php echo $branchFetch->unitprice_sale; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
</div>


<div class="form-group"> 

<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="unitprice_purchase" min="1" step="any" value="<?php echo $branchFetch->unitprice_purchase; ?>" <?php if($_GET['view']!='') {?> readonly="" <?php }?> class="form-control" required>
</div> 
<label class="col-sm-2 control-label">HSN Code:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="hsn_code" value="<?php echo $branchFetch->hsn_code; ?>" class="form-control" >
</div> 
</div>


<div class="form-group"> 
 
<label class="col-sm-2 control-label">GST Tax:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="gst_tax" min="1" step="any" value="<?php echo $branchFetch->gst_tax; ?>" class="form-control">
</div> 
<label class="col-sm-2 control-label">Image:</label> 
<div class="col-sm-4" id="regid"> 
<input type="file" name="image_name" accept="image/*" onchange="loadFile(event)" /><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ ?> <img id="output" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$branchFetch->product_image; }?>"  width = "100" height = "100"/><?php } else { ?><img id="output" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$branchFetch->product_image; }?>"  width = "100" height = "100"/><?php }?>
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

<a href="#/" class="btn btn-secondary btn-sm delete_all"><i class="fa fa-trash-o"></i>Delete All</a>
			</ol>
</form>
<?php
            if($this->session->flashdata('flash_msg')!='')
{
            ?>
<div class="alert alert-success alert-dismissible" role="alert" id="success-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Well done! &nbsp;<?php echo $this->session->flashdata('flash_msg');?></strong> 
</div>	
<?php }?>	

<div class="row">
<div class="col-sm-12" id="listingData">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<button class="dt-button buttons-excel buttons-html5" onclick="exportTableToExcel('tblData')">Excel</button>
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
<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
</select>
Entries</label>
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="margin-top: -8px;margin-left: 12px;float: right;">Showing <?=$dataConfig['page']+1;?> to 
<?php
$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
?> of <?=$dataConfig['total'];?> Entries
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
<br />

<div class="row">
<div class="col-lg-12">
<div class="panel-body">
<div class="table-responsive">
<form1 class="form-horizontal" method="post" action="<?=base_url();?>master/Item/update_item">
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead style="background: beige;">
<tr>
<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
<th><div style="width:135px;">Part No</div></th>
<th><div style="width:70px;">Hsn Code</div></th>
<th><div style="width:160px;">Product Name</div></th>
<th><div style="width:155px;">Description</div></th>
<th><div style="width:200px;">Category</div></th>
<th><div style="width:60px;">Unit</div></th>
<th><div style="width:100px;">Purchase Price</div></th>
<th><div style="width:70px;">Gst Tax</div></th>
<th><div style="width:70px;">Sales Price</div></th>
<th>Image</th>
<th><div style="width:100px;">Action</div></th>
</tr>
</thead>

<tbody id="getDataTable" >
<form method="get">
<tr>
	<td>&nbsp;</td>
	<td><input name="sku_no"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="hsn_code"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="productname"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="description"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="category"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="usageunit"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="unitprice_purchase"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="gst_tax"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="unitprice_sale" type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td>&nbsp;  </td>
	<td><button type="submit" class="btn btn-secondary btn-sm" name="filter" value="filter"><span>FILTER</span></button></td>
</tr>
</form>


<?php
$i=1;
foreach($result as $fetch_list)
{
?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->Product_id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->Product_id; ?>" value="<?php echo $fetch_list->Product_id;?>" /></th>
<th><?=$fetch_list->sku_no;?></th>
<th><?=$fetch_list->hsn_code;?></th>
<th><?=$fetch_list->productname;?></th>
<th><?=$fetch_list->description;?></th>
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

<th><?php
$compQuery1 = $this -> db
           -> select('*')
           -> where('serial_number',$fetch_list->usageunit)
           -> get('tbl_master_data');
		  $keyvalue1 = $compQuery1->row();
echo $keyvalue1->keyvalue;		  

?></th>
<th><?=$fetch_list->unitprice_purchase;?></th>
<th><?=$fetch_list->gst_tax;?></th>
<th><?=$fetch_list->unitprice_sale;?></th>
<th><?php if($fetch_list->product_image!=''){?><img src="<?php echo base_url().'assets/image_data/'.$fetch_list->product_image;?>" height="100" width="100" /> <?php } else {?><img src="<?php echo base_url()?>assets/images/no_image.png" height="50" width="50" /><?php }?> </th>
<th>
<button class="btn btn-default" style="display:none1;" type="button" data-toggle="modal" data-target="#modal<?php echo $i; ?>"> <i class="fa fa-eye"></i></button>

<button class="btn btn-default modalEditItem" onclick="itemedit('<?php echo $fetch_list->Product_id;?>')" href='#editItem' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php 
$pri_col='Product_id';
$table_name='tbl_product_stock';
?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->Product_id."^".$table_name."^".$pri_col;?>" type="button"><i class="icon-trash"></i></button> 
</th>
</tr>
<div id="modal<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Product</h4>
</div>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Item/Part No.:</label> 
<div class="col-sm-4"> 	
<input type="text"  name="sku_no" class="form-control" readonly="" value="<?php echo $fetch_list->sku_no; ?>" />

</div> 
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $fetch_list->productname; ?>" readonly="" class="form-control" > 
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category" required  class="form-control ui fluid search dropdown email" disabled="disabled">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if($fetchgroup->prodcatg_id==$fetch_list->category){?>selected<?php }?>><?php echo $fetchgroup->prodcatg_name; ?></option>

    <?php } ?></select>
</div> 
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4" id="regid"> 
<select name="unit" id="contact_id_copy1" required class="form-control" disabled="disabled" >
					<option value="" selected disabled>----Select Unit----</option>
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

<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4" id="regid"> 
<textarea type="text" name="description" class="form-control" readonly="readonly"/><?php  echo $fetch_list->description;?></textarea></div> 
<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" readonly="" value="<?php echo $fetch_list->unitprice_sale; ?>" class="form-control" required>
</div> 
</div>

<div class="form-group"> 

<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" readonly="" value="<?php echo $fetch_list->unitprice_purchase; ?>" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">HSN Code:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="hsn_code"  value="<?php echo $fetch_list->hsn_code; ?>" readonly="" class="form-control">
</div> 
</div>


<div class="form-group"> 

<label class="col-sm-2 control-label">GST Tax:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="gst_tax" value="<?php echo $fetch_list->gst_tax; ?>" readonly="" class="form-control">
</div> 
<label class="col-sm-2 control-label">Image:</label> 
<div class="col-sm-4" id="regid"> 
<input type="file" name="image_name" accept="image/*" onchange="loadFile(event)" /><?php if(@$_GET['id']!='' || @$_GET['view']!=''){ ?> <img id="output" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$fetch_list->product_image; }?>"  width = "100" height = "100"/><?php } else { ?><img id="output" src="<?php if(@$_GET['id']!='' || @$_GET['view']!=''){ echo base_url().'assets/image_data/'.$fetch_list->product_image; }?>"  width = "100" height = "100"/><?php }?>
</div>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++;} ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_product_stock">  
<input type="text" style="display:none;" id="pri_col" value="Product_id">
</table>
</form1>

<div class="row">
 <div class="col-md-12 text-right">
   <div class="col-md-6 text-left"> 
   </div>
   <div class="col-md-6"> 
	<?php echo $pagination; ?>
   </div>
   <div class="popover fade right in displayclass" role="tooltip" id="popover" style=" background-color: #ffffff;border-color: #212B4F;">
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
        <div id="contentitem">

        </div>
    </div>	 
</div>
</form>
<script>
function itemedit(v){
//alert(v);
//var customerandloc=document.getElementById("customer_id").value;     

//var pro=v+'^'+customerandloc;
var xhttp = new XMLHttpRequest();
 xhttp.open("GET", "updateitem?ID="+v, false);
 xhttp.send();
 document.getElementById("contentitem").innerHTML = xhttp.responseText;
} 

</script>	
<?php
$this->load->view("footer.php");
?>

<script>

function exportTableToExcel(tableID, filename = ''){
 
 	//alert();
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'ProductList_<?php echo date('d-m-Y'); ?>.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{

        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>