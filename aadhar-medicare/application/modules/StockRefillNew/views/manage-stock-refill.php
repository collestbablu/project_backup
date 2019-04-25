<?php
$this->load->view("header.php");

$entries = "";
if($this->input->get('entries')!=""){
  $entries = $this->input->get('entries');
}

?>
<div class="main-content">
<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a href="#">Stock Refill</a></li> 
	
	<li class="active"><strong><a href="#">Manage Stock Refill</a></strong></li> 
	<div class="pull-right">
	<li><a class="btn btn-sm" href="<?=base_url();?>StockRefillNew/add_product_qty">Add Stock Refill</a></li> 
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
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/StockRefillNew/manage_stock_refill');?>" class="form-control input-sm">
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

<table class="table table-striped table-bordered table-hover dataTables-example1" >

<thead>
<tr>
		<th>Stock Refill Id</th>
        <th>Date</th>
		<th>Remarks</th>
		<th>Action</th>
</tr>
</thead>

<tbody id="getDataTable">
<form method="get">
<tr>
	<td><input name="refill_id"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="date"  type="date"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="remarks"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>

<?php

//$query=("select * from tbl_refill_hdr where status='A' ");
//$seQu=$this->db->query($query);

$i=1;
foreach($result as $fetch)
//foreach($seQu->result() as $fetch)
{

?>

<tr class="gradeC record">
<th><?php echo $fetch->rflhdrid;  ?></th>
<th><?php echo $fetch->date;  ?></th>
<th><?php echo $fetch->remarks;  ?></th>
<th>

<button class="btn btn-default" type="button" data-toggle="modal" onClick="openpopup('<?=base_url();?>StockRefillNew/edit_refill',1400,600,'view',<?=$fetch->rflhdrid;?>)" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button>
<?php 
if($fetch->stock_status==Pending)
{
?>
<button class="btn btn-default modalEditItem" onClick="openpopup('<?=base_url();?>StockRefillNew/edit_refill',1400,600,'id',<?=$fetch->rflhdrid;?>)"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>
<?php
$pri_col='rflhdrid';
$table_name='tbl_refill_hdr';
?>
<button class="btn btn-default delbuttonstockrefill" id="<?php echo $fetch->rflhdrid."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<?php } else { ?>
<button class="btn btn-default" onClick="stockdelfun()"  type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="icon-pencil"></i></button>
<button class="btn btn-default" onClick="stockdelfun()" type="button"><i class="icon-trash"></i></button>
<?php }?>
</th>

</tr>
<?php $i++; }  ?>
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

<script>
function stockdelfun()
{
	alert("Product Has Been Stocked In");
}
</script>
</div>
</div>
</form>
</div>
</div>
</div>
<?php

$this->load->view("footer.php");
?>