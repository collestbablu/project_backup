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


$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}


?>
<!-- Main content -->
<div class="main-content">
			
<ol class="breadcrumb breadcrumb-2"> 
	<?php 
	if($add!='')
	{ ?>
	<li><a class="btn btn-success" href="<?=base_url();?>admin/masterdata/add_master_data">Add Master Data</a></li> 
	<?php }?>	
	<li>
	  <a type="button" class="btn btn-danger delete_all">Delete Selected</a>
    </li>
</ol>
<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	<li><a href="#">Admin Setup</a></li> 
	<li><a href="#">Master Data</a></li>
	<li class="active"><strong><a href="#">Manage Master Data</a></strong></li> 
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h4 class="panel-title"><strong>Manage Master Data</strong></h4>
				<ul class="panel-tool-options"> 
					<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
				</ul>
			</div>

<br />
<div class="row">
<div class="col-sm-12" id="listingData">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<a class="dt-button buttons-excel buttons-html5" style="display:none;" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
<button class="dt-button buttons-excel buttons-html5" onclick="exportTableToExcel('tblData')">Excel</button>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show
<select name="DataTables_Table_0_length" url="<?=base_url();?>admin/masterdata/manage_master_data" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
	<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
	<option value="1000" <?=$entries=='1000'?'selected':'';?>>1000</option>
</select>
entries</label>
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -8px;margin-left: 12px;float: right;">Showing <?=$dataConfig['page']+1;?> to 
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

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
 		<th>Value Name</th>
		<th>Name</th>
		<th>Description</th>
        <th>Action</th>
</tr>
</thead>

<tbody id="getDataTable" >

<form method="get">
<tr>
	<td>&nbsp;</td>
	<td><input name="value"  type="text"  class="form-control"  value="" /></td>
	<td><input name="name"  type="text"  class="form-control"  value="" /></td>
	<td><input name="desc"  type="text"  class="form-control"  value="" /></td>
	<td><button type="submit" class="btn btn-success" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>

<?php
 // for($i=0,$j=1;$i<count($list);$i++,$j++)
foreach($result as $fetch_list) {
 
?>

<tr class="gradeC record" data-row-id="<?php echo $fetch_list->serial_number; ?>">
<td><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->serial_number; ?>" value="<?php $fetch_list->serial_number; ?>" /></td>

<?php 
$compQuery = $this -> db
           -> select('*')
           -> where('param_id',$fetch_list->param_id)
           -> get('tbl_master_data_mst');
		  $compRow = $compQuery->row();
?> 	  	
		
<th><?=$compRow->keyname;?></th>
<th><?=$fetch_list->keyvalue;?></th>
<th><?=$fetch_list->description;?></th>
<th>
<?php if($view!=''){ ?>
<a href="#" onClick="openpopup('add_master_data',1200,500,'view',<?=$fetch_list->serial_number;?>)"><i class="glyphicon glyphicon-zoom-in"></i></a>
&nbsp;&nbsp;&nbsp;
<?php } if($edit!=''){ ?>
<a href="#" onClick="openpopup('add_master_data',1200,500,'id',<?=$fetch_list->serial_number;?>)"><i class="glyphicon glyphicon-pencil"></i>
<?php } if($delete!=''){
$pri_col='serial_number';
$table_name='tbl_master_data';
?>
	&nbsp;&nbsp;&nbsp;
	<a href="#" id="<?php echo $fetch_list->serial_number."^".$table_name."^".$pri_col ; ?>" class="delbutton icon"><i class="glyphicon glyphicon-remove"></i></a> 
<?php } ?>
</th>
</tr>
<?php } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_master_data">  
<input type="text" style="display:none;" id="pri_col" value="serial_number">
</table>
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
</div>
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
    filename = filename?filename+'.xls':'MasterDataList_<?php echo date('d-m-Y');?>.xls';
    
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