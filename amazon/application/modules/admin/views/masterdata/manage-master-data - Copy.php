<?php
$this->load->view("header.php");
$this->load->view("javascriptPage.php");
require_once(APPPATH.'modules/admin/controllers/masterdata.php');
$objj=new Masterdata();
$CI =& get_instance();

$list='';

$list=$objj->masterdata_list();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_master_data';

?>

<!-- Main content -->
<div class="main-content">
<div class="panel panel-default">

<!-- Breadcrumb -->
<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a href="#">Admin Setup</a></li> 
	<li><a href="#">Master Data</a></li>
	<li class="active"><strong><a href="#">Manage Master Data</a></strong></li> 
<div class="pull-right">
	<button type="button" class="btn btn-sm btn-black btn-outline" data-toggle="modal" data-target="#modal-0"><i class="fa fa-plus" aria-hidden="true"></i>Add Master Data</button>
	<button type="button" class="btn btn-sm btn-black btn-outline delete_all" ><i class="fa fa-trash-o"></i>Delete</button>
</div>
</ol>

<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title">Add Product</h4>
<!-- 	<ul class="panel-tool-options"> 
<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
<li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
</ul> -->
</div>

<div class="panel-body" style="padding-bottom:0px;">
<!-- <div class="row">
<div class="col-sm-5">
<label>Show <select name="" aria-controls="" class="">
<option value="10">10</option>
<option value="25">25</option>
<option value="50">50</option>
<option value="100">100</option>
</select> entries
</label>
<p>Showing 1 to 10 of 57 entries</p>
</div>

<div class="col-sm-7">
<div class="pull-right">
<label>Search: &nbsp;&nbsp;<input type="" class="form-control input-sm" placeholder="" aria-controls="" style="float:right; width:auto;"></label>&nbsp;&nbsp;
<button type="button" class="btn btn-sm btn-black btn-outline">Copy</button>
<button type="button" class="btn btn-sm btn-black btn-outline">Excel</button>
<button type="button" class="btn btn-sm btn-black btn-outline">PDF</button>
<button type="button" class="btn btn-sm btn-black btn-outline">Column visibility</button>
</div>
</div>
</div> -->
</div>

<div class="panel-body">
<div class="table-responsive">
<form class="form-horizontal" method="post" action="<?=base_url();?>admin/masterdata/insert_master_data">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
	<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	<th>Value Name</th>
	<th>Added value</th>
	<th>Description</th>
	<th>Action</th>
</tr>
</thead>

<tbody>
<?php
$i=1;
foreach($result as $fetch_list)
{
?>

<tr class="gradeX">
<td class="size-60 text-center"><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->serial_number; ?>" value="<?php echo $fetch_list->serial_number;?>" /></td>
<?php 
$compQuery = $this -> db
-> select('*')
-> where('param_id',$fetch_list->param_id)
-> get('tbl_master_data_mst');
$compRow = $compQuery->row();
?>

<td><?=$compRow->keyname;?></td>
<td><?=$fetch_list->keyvalue;?></td>
<td><?=$fetch_list->description;?></td>
<td>
<button class="btn btn-xs btn-black" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="fa fa-eye"></i> </button>
<button class="btn btn-xs btn-black" type="button" data-toggle="modal" data-target="#modal-<?php echo $i; ?>"> <i class="icon-pencil"></i> </button>
<?php if($delete!=''){
$pri_col='serial_number';
$table_name='tbl_master_data';
?>
<button class="btn btn-xs btn-black delbutton" id="<?=$fetch_list->serial_number."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<?php } ?>

</td>
</tr>

<div id="modal-<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Master Data</h4>
</div>
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Value Name:</label> 
<div class="col-sm-4"> 				

<input type="hidden" name="serial_number[]" value="<?php echo $fetch_list->serial_number; ?>" />
<select name="param_id[]" class="form-control" requried>
<option value="">----Select----</option>
<?php 
$comp_sql = $this->db->query("select * FROM tbl_master_data_mst where status='A'");

foreach ($comp_sql->result() as $comp_fetch){
?>
<option value="<?php echo $comp_fetch->param_id;?>"<?php if($comp_fetch->param_id==$fetch_list->param_id){?>selected<?php }?>><?php echo @$comp_fetch->keyname;?></option>
<?php } ?>
</select>
</div> 

<label class="col-sm-2 control-label">*Key Value</label> 
<div class="col-sm-4"> 
<input name="keyvalue[]"  type="text" value="<?=$fetch_list->keyvalue;?>" class="form-control" required> 
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="description[]"><?=$fetch_list->description;?></textarea>
</div>  
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm btn-black btn-outline" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-sm btn-black btn-outline" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $i++;} ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_master_data">  
<input type="text" style="display:none;" id="pri_col" value="serial_number">
		
</table>
</form>
</div>
</div>
</div>

<form class="form-horizontal" method="post" action="<?=base_url();?>admin/masterdata/insert_master_data">	
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Master Data</h4>
</div>
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Value Name:</label> 
<div class="col-sm-4"> 				

<input type="hidden" name="serial_number" value="" />
<select name="param_id" class="form-control" requried>
<option value="">----Select----</option>
<?php 
$comp_sql = $this->db->query("select * FROM tbl_master_data_mst where status='A'");

foreach ($comp_sql->result() as $comp_fetch){
?>
<option value="<?php echo @$comp_fetch->param_id;?>"><?php echo @$comp_fetch->keyname;?></option>
<?php } ?>
</select>
</div> 

<label class="col-sm-2 control-label">*Key Value</label> 
<div class="col-sm-4"> 
<input name="keyvalue"  type="text" value="" class="form-control" required> 
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Description:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="description"></textarea>
</div>  
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm btn-black btn-outline" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-sm btn-black btn-outline" data-dismiss="modal">Cancel</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>
</div>
</div>
<?php
$this->load->view("footer.php");
?>