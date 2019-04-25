<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/Account.php');
$objj=new Account();
$CI =& get_instance();

$list='';

$list=$objj->docket_list_deliver();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_contact_m';

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}


?>
 <!-- Main content -->
 <div class="main-content">
	 
<ol class="breadcrumb breadcrumb-2"> 
</ol>
<ol class="breadcrumb breadcrumb-2"> 
	<li><a href="<?=base_url();?>master/Item/dashboar"><i class="fa fa-home"></i>Dashboard</a></li> 
	
	<li><a href="#">Docket</a></li> 
	<li class="active"><strong><a href="#">Docket Delivery</a></strong></li> 
</ol>
			
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h4 class="panel-title"><strong>Docket Delivery</strong></h4>
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
<select name="DataTables_Table_0_length" url="<?=base_url();?>master/Account/manage_delivery" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
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
<form action="delivery_status" method="post">					
<input type="submit" name="update" class="btn btn-danger" value="Delete" />
<br />
<br />
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead>
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th><div style="width:50px;">Sr. No.</div></th>
		<th><div style="width:100px;">Date</div></th>
        <th><div style="width:80px;">Docket No.</div></th>
		<th><div style="width:100px;">Consignor</div></th>
		<th><div style="width:100px;">Consignee</div></th>
		<th><div style="width:100px;">Origin</div></th>
		<th><div style="width:100px;">Destination</div></th>
		<th><div style="width:100px;">No. Of Packg.</div></th>
		<th><div style="width:100px;">Mode of Pay</div></th>
		<th><div style="width:100px;">EDD</div></th>
        <th><div style="width:100px;">Shipment Delivered On</div></th>
        <th><div style="width:100px;">Shipment Delivered Time</div></th>
        <th><div style="width:100px;">Remarks</div></th>
        <th><div style="width:100px;">Status</div></th>
        <th style="display:none"></th>
        <th><div style="width:100px;">Action</div></th>
</tr>
</thead>
</form>

<tbody id="getDataTable" >
<form method="get">
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><input name="date" type="date" class="form-control" value=""></td>
	<td><input name="docket_no" type="text" class="form-control" value=""></td>
	<td><input name="consignor" type="text" class="form-control" value=""></td>
	<td><input name="consignee" type="text" class="form-control" value=""></td>
	<td><input name="origin" type="text" class="form-control" value=""></td>
	<td><input name="destination" type="text" class="form-control" value=""></td>
	<td><input name="no_of_pkg" type="text" class="form-control" value=""></td>
	<td><input name="mode_of_pay" type="text" class="form-control" value=""></td>
	<td><input name="edd" type="date" class="form-control" value=""></td>
	<td><input name="shipment_delivered_date" type="date" class="form-control" value=""></td>
	<td><input name="shipment_delivered_time" type="time" class="form-control" value=""></td>
	<td><input name="remarks" type="text" class="form-control" value=""></td>
	<td>&nbsp;</td>
	<td><button type="submit" class="btn btn-success" name="filter" value="filter"><span>Search</span></button></td>
</tr>
</form>

<?php

$z=1;
  //for($i=0,$j=1;$i<count($list);$i++,$j++)
  foreach($result as $row)  {


$compQuery = $this -> db
           -> select('*')
           -> where('serial_number',$row->destination)
           -> get('tbl_master_data');
          $compRow = $compQuery->row();
          
          $compQueryyy = $this -> db
           -> select('*')
           -> where('serial_number',$row->origin)
           -> get('tbl_master_data');
          $compRowww = $compQueryyy->row();
          
          $compQuery1 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignor)
           -> get('tbl_contact_m');
          $compRow1 = $compQuery1->row();
          
          $compQuery11 = $this -> db
           -> select('*')
           -> where('contact_id',$row->consignee)
           -> get('tbl_contact_m');
          $compRow11 = $compQuery11->row();
		  
?>

<tr class="gradeC record" data-row-id="<?php echo $row->id; ?>">
<th><input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $row->id; ?>" value="<?php echo $row->id;?>" /></th>
<th><?php echo $z++;?></th>
<th><?=$row->booking_date;?></th>
<th><?=$row->docket_no;?></th>
<th><?=$compRow1->first_name;?></th>
<th><?=$compRow11->first_name;?></th>
<th><?=$compRowww->keyvalue;?></th>
<th><?=$compRow->keyvalue;?></th>
<th><?=$row->no_of_package;?></th>
<th><?=$row->mode_of_payment;?></th>
<th><?=$row->edd;?></th>
<th><?=$row->shipment_delivered_on;?></th>
<th><?=$row->shipment_delivered_on_time;?></th>
<th><?=$row->remarkss;?></th>
<th><?=$row->booked_status;?></th>
<th style="display:none"  id="docketid<?php echo $i; ?>"><?=$row->id;?></th>

<script>
function mainshut(d)
{
	
var regex = /(\d+)/g;
nn= d.match(regex)
id=nn;
//alert(id);


var shipment_delivered_on=document.getElementById("shipment_delivered_on"+id).value;
var shipment_delivered_on_time=document.getElementById("shipment_delivered_on_time"+id).value;
var remarks=document.getElementById("remarks"+id).value;

var cont=document.getElementById("booked_status"+id).value;

var did=document.getElementById("docketid"+id).innerHTML;
var pro=cont+"^"+did+"^"+shipment_delivered_on+"^"+shipment_delivered_on_time+"^"+remarks;

 window.location.href="delivery_mail?comm="+pro;

}

</script>

<th style="width:200px;">
<a href="#" onClick="openpopup('update_docket',1200,500,'view',<?=$row->id;?>)"><i class="glyphicon glyphicon-zoom-in"></i></a><?php
$pri_col='id';
$table_name='tbl_docket_entry';
$pri_col_dtl='docket_dtl_id';
$table_name_dtl='tbl_docket_entry_dtl';
?>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=base_url();?>master/Account/print_docket?id=<?=$row->id;?>" target="_blank">Print</a>
</th>

</tr>
<?php } ?>
</tbody>
<input type="text" style="display:none;" id="table_name^table_name_dtl" value="tbl_docket_entry^tbl_docket_entry_dtl">  
<input type="text" style="display:none;" id="pri_col^pri_col_dtl" value="id^docket_dtl_id">
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
    filename = filename?filename+'.xls':'DocketDeliveredList_<?php echo date('d-m-Y');?>.xls';
    
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