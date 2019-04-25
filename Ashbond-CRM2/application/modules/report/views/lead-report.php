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
<h4 class="panel-title">LEAD REPORT </h4>
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
<select name="sale_person_id"   class="form-control ui fluid search dropdown email" >
			<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_user_mst where comp_id != '1'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
		    <option value="<?php echo $fetchgroup->user_id; ?>"><?php echo $fetchgroup->user_name ; ?></option>
		    <?php } ?>
</select>
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
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/report/Report/searchLead');?>" class="form-control input-sm">
	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
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
 		<th>Lead Id</th>
		<th>Customer Name</th>   
		<th>Sales Person</th>
		<th>Contact Person</th>
		<th>Priority</th>
		<th>Expected Closure Date</th>
		<th>Source</th>
		<th>Stage</th>
		<th>Action</th>
</tr>
</thead>
<tbody id="getDataTable">
<?php
$yy=1;
//if(!empty($leadSearch)) {
foreach($result as $rows) {
?>
<tr class="gradeC record">
<th><?php echo $rows->lead_id; ?></th>
<th><?php 
$sql1 = $this->db->query("select * from tbl_contact_m where contact_id = '$rows->contact_id' ");
			$sql2 = $sql1->row();
			echo $sql2->first_name; ?>
</th>
<th><?php
$sql1 = $this->db->query("select * from tbl_user_mst where user_id = '$rows->sales_person_id' ");
			$sql2 = $sql1->row();
			echo $sql2->user_name; ?>
</th>
<th><?php echo $rows->contact_person; ?></th> 
<th><?php
$sql1 = $this->db->query("select * from tbl_master_data where serial_number = '$rows->priority' ");
			$sql2 = $sql1->row();
			echo $sql2->keyvalue;  ?>
</th>
<th><?php echo $rows->exptd_closer_date; ?></th>
<th><?php
$sql1 = $this->db->query("select * from tbl_master_data where serial_number = '$rows->source' ");
			$sql2 = $sql1->row();
			echo $sql2->keyvalue; ?>
</th>
<th><?php
$sql1 = $this->db->query("select * from tbl_master_data where serial_number = '$rows->lead_status' ");
			$sql2 = $sql1->row();
			echo $sql2->keyvalue; ?>
</th>
<th>
<button class="btn btn-default" onclick="viewaddActivity111('<?php echo $rows->lead_id;?>')" href='#viewaddActivity' type="button" data-toggle="modal" data-backdrop='static' data-keyboard='false'><i class="fa fa-eye"></i></button>
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

<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">			
<div id="viewaddActivity" class="modal fade modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div id="activitydata">

        </div>
    </div>	 
</div>
</form>

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
    filename = filename?filename+'.xls':'LeadReport_<?php echo date('d-m-Y');?>.xls';
    
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

function viewaddActivity111(v){
//alert(v);
//var xhttp = new XMLHttpRequest();
// xhttp.open("GET", "view_activity?ID="+v, false);
// xhttp.send();
// //alert(v);
// document.getElementById("activitydata").innerHTML = xhttp.responseText;
var ur = "<?=base_url('report/Report/view_activity');?>"
$.ajax({   
				  
					type: "GET",  
					url: ur,  
				    data: {"ID":v},  
					success: function(data)  
					{   
						document.getElementById("activitydata").innerHTML = data;
					}   
				});

}

</script>
