<?php
$this->load->view("header.php");
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$table_name_1='tbl_product_stock';
$pri_id='Product_id';
$field_name='productname';

$this->load->view("reportheader");

$entries = "";
if($this->input->get('entries')!=""){
  $entries = $this->input->get('entries');
}

?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title">QC REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="get">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">QC Id</label> 
<div class="col-sm-3"> 
<input type="text" name="qc_id" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Tailor Name</label> 
<div class="col-sm-3"> 
<select name="t_name" class="form-control">
<option value="">--Select--</option>
<?php
$tname=$this->db->query("select * from tbl_contact_m where group_name='6'");
foreach($tname->result() as $tailor)
{
?>
<option value="<?=$tailor->contact_id;?>"><?=$tailor->first_name;?></option>
<?php } ?>
</select>

</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">From Date</label> 
<div class="col-sm-3"> 
<input type="date" name="f_date" class="form-control" value="" /> 
</div>
<label class="col-sm-2 control-label">To Date</label> 
<div class="col-sm-3"> 
<input type="date" name="t_date" class="form-control" value="" /> 
</div>
<label class="col-sm-2 control-label"><button type="submit" name="filter" value="filter" class="btn btn-sm">Search</button></label>
</div>
</form>
</div>

<div class="row">
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
	<button class="dt-button buttons-excel buttons-html5" onclick="exportTableToExcel('tblData')">Excel</button>
  <a class="dt-button buttons-excel buttons-html5" style="display:none" tabindex="0" aria-controls="DataTables_Table_0" onclick="exportTableToExcel('tblData')"><span>Excel</span></a>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/report/Report/searchQualityCheck');?>" class="form-control input-sm">
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

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead>
<tr>
	   <th>QC Id</th>
	   <th>Production Id</th>		
        <th>Product Name </th>
        <th>Tailor Name </th>
        <th>Qty</th>
        <th>Date</th>
		<th>Action</th>


</tr>
</thead>
<tbody id="getDataTable">
<?php
$yy=1;
//if(!empty($qcSearch)) {
foreach($result as $sales) {
?>
<tr class="gradeC record">
<th>
<?php 
//$sql1 = $this->db->query("select * from tbl_qualitiy_check where qc_id = '$sales->qc_id' ");
			//$sql2 = $sql1->row();	
		//echo $sql2->qc_id;
		echo $sales->qc_id;
		?>
</th>

<th>
<?php 
$sql1 = $this->db->query("select * from tbl_tailor where tailor_id = '$sales->tailor_id' ");
			$sql2 = $sql1->row();	
			if($sql2->production_id){
				echo $sql2->production_id;
			}else{
				echo "Product Imported";	
			}
		?>
</th>
<?php 
$queryfetch=$this->db->query("select * from tbl_product_stock where Product_id='$sales->finishProductId'");	
	$fetchqrow=$queryfetch->row();
	//echo $fetchqrow->productname;
	$size=$this->db->query("select *from tbl_master_data where serial_number='$fetchqrow->size'");
$psize=$size->row();
if($psize->keyvalue !='')
{
?>
<th><?php echo $fetchqrow->productname .'   ( '.$psize->keyvalue .')' ; } else { ?></th>
<th><?php echo $fetchqrow->productname; } ?></th>

<th>
<?php
if($sales->customer_name!=''){
$query=$this->db->query("select * from tbl_contact_m where contact_id='$sales->customer_name'");	
$fetchq=$query->row();
 echo $fetchq->first_name;
}else{
	echo "Product Imported";	
}
 ?></th>
<th><?=$sales->qty;?></th>
<th><?=$sales->date;?></th>
<th><button class="btn btn-default" type="button" data-toggle="modal" onClick="openpopup('<?=base_url();?>report/Report/view_qc',50,20,'ID',<?=$sales->qc_id;?>)" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i> </button></th>
</tr>
<?php } //} ?>
</tbody>
</table>
<div class="row">
       <div class="col-md-12 text-right">
    	  <div class="col-md-6 text-left"> 
    	  </div>
    	  <div class="col-md-6"> 
             <?=$pagination; ?>
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
    filename = filename?filename+'.xls':'excel_data.xls';
    
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