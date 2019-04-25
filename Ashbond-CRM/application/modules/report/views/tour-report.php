<?php
$this->load->view("header.php");

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}

?>
<!-- Main content -->
<div class="main-content">
	
<?php
$this->load->view("reportheader");
?>	
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<h4 class="panel-title">TOUR REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<!--<div class="panel-body panel-center">-->
<div class="panel-body" style="    background: #dedede;    padding: 20px 0px;    margin-bottom: 25px;">
<form class="form-horizontal" method="get">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Customer</label> 
<div class="col-sm-3"> 
<select name="contact_id"   class="form-control ui fluid search dropdown email" >
			<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
		    <option value="<?php echo $fetchgroup->contact_id; ?>"><?php echo $fetchgroup->first_name ; ?></option>
		    <?php } ?>
</select>
</div>
<label class="col-sm-2 control-label">Sales Person</label> 
<div class="col-sm-3"> 
<select name="sales_person_id"   class="form-control ui fluid search dropdown email" >
			<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_user_mst where comp_id != '1'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
		    <option value="<?php echo $fetchgroup->user_id; ?>"><?php echo $fetchgroup->user_name ; ?></option>
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
<br />
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
<label>&nbsp;&nbsp; Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/report/Report/searchTourReport').'?contact_id='.$_GET['contact_id'].'&sales_person_id='.$_GET['sales_person_id'].'&f_date='.$_GET['f_date'].'&t_date='.$_GET['t_date'].'&filter='.$_GET['filter'];?>" class="form-control input-sm">
	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
	<option value="<?=$dataConfig['total'];?>" <?=$entries==$dataConfig['total']?'selected':'';?>>ALL</option>
</select>
Entries</label>

<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -8px;margin-left: 12px;float: right;">
	Showing <?=$dataConfig['page']+1;?> to 
	<?php
	$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
	echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
	?> of <?php echo $dataConfig['total'];?> Entries
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
<br />

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead style="background: beige;">
<tr>
 		<th><div style="width:60px;">TourId</div></th>
		<th><div style="width:130px;">Customer Name</div></th>
        <th><div style="width:80px;">Sales Person</div></th>
		<th><div style="width:80px;">Priority</div></th>
		<th><div style="width:80px;">Source</div></th>
		<th><div style="width:90px;">Stage</div></th>
		<th><div style="width:80px;">Date</div></th>
		<th><div style="width:100px;">State</div></th>
</tr>
</thead>
<tbody id="getDataTable">
<?php
$yy=1;
//if(!empty($searchTour)) {
foreach($result as $fetch_list) {
?>
<tr class="gradeC record">
<th><?=$fetch_list->tour_id;?></th>

<th><?php
	$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4' and contact_id='$fetch_list->contact_id' ");
	$res1 = $sqlgroup->row();
	echo $res1->first_name;	?>
</th>
<th><?php
	$sqlgroup=$this->db->query("select * from tbl_user_mst where user_id = '$fetch_list->sales_person_id' ");
	$fetchQ=$sqlgroup->row();
	echo $fetchQ->user_name;?>
</th>
<th><?php 
	$sqlproit=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->priority'");
	$res1111 = $sqlproit->row();
	echo $res1111->keyvalue; ?>
</th>
<th>
<?php 
	$sqlproit22=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->source'");
	$res111122 = $sqlproit22->row();
	echo $res111122->keyvalue; ?>
</th>
<th><?php 
	$sqlstatus=$this->db->query("select * from tbl_master_data where serial_number='$fetch_list->lead_status'");
	$fecthStatus = $sqlstatus->row();
	echo $fecthStatus->keyvalue; ?>
</th>

<th><?=$fetch_list->date;?></th>

<th><?php
	$stateQquery=$this->db->query("select * from tbl_state_m where status='A' and stateid='$fetch_list->state;'");
	$fetchQ=$stateQquery->row();
	echo $fetchQ->stateName;?>
</th>

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
    filename = filename?filename+'.xls':'TourReport_<?php echo date('d-m-Y');?>.xls';
    
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