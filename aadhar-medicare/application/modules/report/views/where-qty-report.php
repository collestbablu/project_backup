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
<h4 class="panel-title">STOCK IN STAGE REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="get" >
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Product Type</label> 
<div class="col-sm-3"> 
<select name="ptype" class="form-control">
<option value="">--Select--</option>
<?php 
$query=$this->db->query("select * from tbl_master_data where param_id='17'");	
foreach($query->result() as $tname)
{
?>
<option value="<?= $tname->serial_number; ?>"><?= $tname->keyvalue; ?></option>
<?php } ?>
</select>
</div>
<label class="col-sm-2 control-label">Product Name</label> 
<div class="col-sm-3"> 
<input type="text" name="pname" class="form-control" value="" /> 
</div>
<label class="col-sm-2 control-label"><button type="submit" name="filter" value="filter" class="btn btn-sm">Search</button></label>
</form>
</div>
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
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/report/Report/searchWhereQty');?>" class="form-control input-sm">
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
	   <th>Sl No.</th>
		 <th>Product Type</th>
		 <th>Product Name </th>
		<th>Qty in Master cutting</th>
	    <th>Quality Checked Qty</th>
		<th>Packed Qty</th>
        <th>Rejection Qty</th>

</tr>
</thead>
<tbody  id="getDataTable">
<?php
$yy=1;
//if(!empty($WhereQtySearch)) {
foreach($result as $sales) {
?>
<tr class="gradeC record">
<th><?php  echo $yy++;?></th>
<th><?php 
$querymaster=$this->db->query("select * from tbl_master_data where serial_number='$sales->type'");	
	$masterrow=$querymaster->row();
 echo $masterrow->keyvalue; ?></th>
<?php 
$size=$this->db->query("select * from tbl_master_data where serial_number='$sales->size'");
$psize=$size->row();

?>
<th><?php if($psize->keyvalue !=''){echo $sales->productname .'   ( '.$psize->keyvalue .')' ; } else { echo $sales->productname; } ?></th>

<th><?php 
//echo $sales->Product_id."<br>";
//$sum=0;
$out=array();
$rejectsum=0;
$queryfetch11=$this->db->query("select * from tbl_tailor where finishProductId='$sales->Product_id'");	
foreach($queryfetch11->result() as $fetchqrow11){
	//$sum=$sum+$fetchqrow11->qty;
	//$qryFet=$this->db->query("select * from tbl_production_hdr where productionid='$fetchqrow11->productionhdr'");
	//$rowfet=$qryFet->row();
	$rejectsum+=$fetchqrow11->rejct_qty;
	array_push($out, "$fetchqrow11->tailor_id");
}

//echo $sum; 
$pqtysum=0;
$qryFet=$this->db->query("select * from tbl_production_hdr where product_id='$sales->Product_id'");
//$rowfet=$qryFet->row();
$sum=0;

foreach($qryFet->result() as $rowfet)
{
$pqtysum=$pqtysum + $rowfet->qty;

$tqty=$this->db->query("select * from tbl_tailor where finishProductId='$sales->Product_id'");	
	foreach($tqty->result() as $tqtysum){
		
		$sum+=$tqtysum->qty;
}
}
echo $pqtysum - $sum;
?></th>
<th><?php 
$implode=implode(', ', $out);
if($implode==''){
$data=$implode=0;
}
else
{
$data=$implode;
}
$qtySum=0;
$rejqtySum=0;
$out1=array();
$i=0;
$queryqc=$this->db->query("select * from tbl_qualitiy_check where tailor_id in ($data)");
foreach($queryqc->result() as $fetchqqc){
	//echo $explode[$i].",";
	//echo $fetchqqc->qc_id.",";
	array_push($out1, "$fetchqqc->qc_id");
	$qtySum=$qtySum+$fetchqqc->qty;
	$rejqtySum=$rejqtySum+$fetchqqc->reject_qty;
}
$qtyPacking=0;
$implode1=implode(', ', $out1);
if($implode1==''){
$data1=$implode1=0;
}
else
{
$data1=$implode1;
}
$queryqc=$this->db->query("select * from tbl_packing where qc_id in ($data1)");
foreach($queryqc->result() as $fetchqqc){
	//echo $explode[$i].",";
	//echo $fetchqqc->qty.",";
	$qtyPacking=$qtyPacking+$fetchqqc->qty;
}

echo $actu=$qtySum-$qtyPacking-$rejqtySum;

?></th>
<th><?php 
echo $qtyPacking;
?></th>
<th><?php 
//echo $rejectsum;
echo $rejqtySum+$rejectsum; ?></th>
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
