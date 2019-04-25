<?php
$this->load->view("header.php");	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$table_name_1='tbl_product_stock';
$pri_id='Product_id';
$field_name='productname';

$entries = "";
if($this->input->get('entries')!=""){
  $entries = $this->input->get('entries');
}


?>
<!-- Main content -->
<div class="main-content">

<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a href="#">Template</a></li> 
	<li class="active"><strong><a href="#">Manage Template</a></strong></li> 
	<div class="pull-right">
	<?php 
	if($add!='')
	{ ?>
	<li><a class="btn btn-sm" href="<?=base_url();?>template/add_template">Add Template</a></li> 
	<?php }?>
	</div>
</ol>
			
<div class="row">
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
  <a class="dt-button buttons-excel buttons-html5" style="display:none" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/template/manage_template');?>" class="form-control input-sm">
	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
</select>
entries</label>

<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -5px;margin-left: 12px;float: right;">
	Showing <?=$dataConfig['page']+1;?> to 
	<?php
	$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
	echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
	?> of <?php echo $dataConfig['total'];?> entries
</div>
</div>
<div id="DataTables_Table_0_filter" class="dataTables_filter">
<label>Search:
<input type="text" class="form-control input-sm" id="searchTerm"  onkeyup="doSearch()" placeholder="What you looking for?">
</label>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
	<div class="panel-body">
		<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example1" >
<thead>
<tr>
	   <th>Templte Id</th>
        <th>Date</th>
        <th>Production Goods </th>
         <th>Action</th>
</tr>
</thead>

<tbody id="getDataTable">
<form method="get">
<tr>
	<td><input name="temp_id"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="date"  type="date"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="goods"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>

<?php
$i=1;
	foreach($result as $sales)
  {
  ?>

<tr class="gradeC record">
<th><?=$sales->templateid;?></th>

<th><?=$sales->date;?></th>
<?php
$id=$sales->product_id;

//echo $obj->getManagePageData($table_name_1,$pri_id,$id,$field_name);
?>
<?php 
$fetchType=$this->db->query("select * from tbl_product_stock where Product_id='$sales->product_id'");
$fetch=$fetchType->row();
$size=$this->db->query("select *from tbl_master_data where serial_number='$fetch->size'");
$psize=$size->row();
if($psize->keyvalue !='')
{
?>
<th><?php echo $fetch->productname .'   ( '.$psize->keyvalue .')' ; } else { ?></th>
<th><?php echo $fetch->productname; }?></th>

<th class="bs-example">
<?php if($view!=''){ ?>

<button class="btn btn-default" type="button" data-toggle="modal" onClick="openpopup('<?=base_url();?>template/edit_template',1400,600,'view',<?=$sales->templateid;?>)" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" onClick="openpopup('<?=base_url();?>template/edit_template',1400,600,'id',<?=$sales->templateid;?>)"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>

<?php }
$pri_col='templateid';
$table_name='tbl_template_hdr';
?>
<button class="btn btn-default delbuttonTemplate" id="<?php echo $sales->templateid."^".$table_name."^".$pri_col."^".$sales->product_id ; ?>" type="button" ><i class="icon-trash"></i></button>		
<?php
  ?></th>
</tr>
<?php } ?>
</tbody>
</table>
<div class="row">
       <div class="col-md-12 text-right">
    	  <div class="col-md-6 text-left"> 
    		<!-- <h6>Showing 1 to 10 of <?php echo $totalrow; ?> entries</h6> -->
    	  </div>
    	  <div class="col-md-6"> 
             <?=$pagination; ?>
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
</div>
<?php

$this->load->view("footer.php");
?>