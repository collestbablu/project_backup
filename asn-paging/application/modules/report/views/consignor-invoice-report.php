<?php
$tableName="tbl_docket_entry";
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
<h4 class="panel-title">CONSIGNOR INVOICE REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal panel-body-to" method="get">
<div class="form-group"> 
<label class="col-sm-2 control-label">Docket No.</label> 
<div class="col-sm-3"> 
<input type="text" name="d_no" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Consignor</label> 
<div class="col-sm-3"> 
<select name="consignor" class="form-control" > 
<option value="">----Select----</option>
<?php $res=$this->db->query("select *from  tbl_contact_m where status='A' and group_name='5'");
foreach ($res->result() as $sql2){
?>
<option value="<?php  echo $sql2->contact_id ;?>"><?php echo $sql2->first_name;?></option>
<?php }?>
</select>
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Consignee</label> 
<div class="col-sm-3"> 
<select name="consignee" class="form-control" >
<option value="">----Select----</option>
<?php $res=$this->db->query("select *from  tbl_contact_m where status='A' and group_name='4'");
foreach ($res->result() as $sql2){
?>
<option value="<?php  echo $sql2->contact_id ;?>"><?php echo $sql2->first_name;?></option>
<?php }?>
</select>
</div>
<label class="col-sm-2 control-label">Mode</label> 
<div class="col-sm-3"> 
<input type="text" name="mode" class="form-control" value="" /> 
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">From Date</label> 
<div class="col-sm-3"> 
<input type="date" name="fdate" class="form-control" value="<?php // echo date('Y-m-d');?>" />
</div>
<label class="col-sm-2 control-label">To Date</label> 
<div class="col-sm-3"> 
<input type="date" name="tdate" class="form-control" value="<?php //echo date('Y-m-d');?>" /> 
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Status</label> 
<div class="col-sm-3"> 
<select name="status" class="form-control">
	<option value="">----Select----</option>
	<option value="Booked">Booked</option>
	<option value="Intransit">Intransit</option>
	<option value="OFD">OFD</option>
	<option value="Delivered">Delivered</option>
	<option value="Not Delivered">Not Delivered</option>
	<option value="Not Delivered Return">Not Delivered Return</option>
</select>
</div>
<label class="col-sm-2 control-label"></label>
<label class="col-sm-2 control-label"><button type="submit" name="filter" value="filter" class="btn btn-info">Search</button></label>  
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
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('/report/Report/searchConsignorInvoice');?>" class="form-control input-sm">
	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
	<option value="1000" <?=$entries=='1000'?'selected':'';?>>1000</option>
</select>
entries</label>

<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -8px;margin-left: 12px;float: right;">
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
 		<th>Sr No.</th>
		<th>AWB No.</th>
        <th>Date</th>
		<th>Invoice No.</th>   
        <th>Invoice Value</th>   
		<th>Consignor</th>
		<th>Consignee</th>
		<th>Origin</th>
		<th>Destination</th>
		<th>Mode</th>
		<th>Boxes</th>
		<th>Actual wt.</th>
		<th>Dimensional Wt.</th>
		<th>Chargeable wt.</th>
		<th>Rate</th>
		<th>Value</th>
        <th>FSC</th>
        <th>FOV</th>
		<th>OP/OD</th>
		<th>Oda</th>
		<th>Others</th>
		<th>Total value</th>
		<th>Delivery Date</th>
		<th>Delivery Time</th>
		<th>Remarks</th>
		<th>EDD</th>
		<th>Booked Status</th>
</tr>
</thead>
<tbody id="getDataTable">
<?php
/*	@extract($_GET);
	if($Show!='')
	{
		$queryy="select * from $tableName where status='A'";
		if($d_no!='')
		{				
			$queryy.=" and docket_no  = '$d_no'";	  
		}
		
		if($consignor!='')
		{				
			$queryy.=" and consignor  = '$consignor'";	  
		}
		
		if($consignee!='')
		{				
			$queryy.=" and consignee  = '$consignee'";	  
		}
		
		if($mode!='')
		{				
			$queryy.=" and mode  = '$mode'";	  
		}
		
		if($status!='')
		{				
			$queryy.=" and booked_status  = '$status'";	  
		}
		
		//echo $tdate;
		//echo $fdate;
		if($fdate!='' && $tdate!='')
		{
		
			$tdate=explode("-",$tdate);
			
			$fdate=explode("-",$fdate);

			$todate1=$tdate[0]."-".$tdate[1]."-".$tdate[2];
	        $fdate1=$fdate[0]."-".$fdate[1]."-".$fdate[2];
			$queryy .="and booking_date >='$fdate1' and booking_date <='$todate1'";
		}
	}
	else
	{
		$queryy="select * from $tableName where status='A'";
	}
   $result=$this->db->query($queryy);
 */
 
$yy=1;
foreach($result as $rows) {

?>
<tr class="gradeC record">
<th><?php echo $yy++; ?></th>
<th><?php echo $rows->docket_no; ?></th>
<th><?php 
$dt=$rows->booking_date;
echo $newDate = date("d-m-Y", strtotime($dt));
 ?></th>
 
<th><?php echo $rows->customer_invoice_no; ?></th>
<th><?php echo $rows->invoice_value; ?></th>
<th><?php 
	$sql1 = $this->db->query("select * from tbl_contact_m where contact_id='".$rows->consignor."' ");
	$sql2 = $sql1->row();
	echo $sql2->first_name; ?></th>
<th><?php  
	$sql1 = $this->db->query("select * from tbl_contact_m where contact_id='".$rows->consignee."' ");
	$sql2 = $sql1->row();
	echo $sql2->first_name; ?></th>	
<th><?php 
	$sql1 = $this->db->query("select * from tbl_master_data where serial_number='".$rows->origin."' ");
	$sql2 = $sql1->row();
	echo $sql2->keyvalue;?></th>	
<th><?php 
	$sql1 = $this->db->query("select * from tbl_master_data where serial_number='".$rows->destination."' ");
	$sql2 = $sql1->row();
	echo $sql2->keyvalue;?></th>
<th><?php echo $rows->mode; ?></th>
<th><?php echo ceil($rows->no_of_package); ?></th>
<th><?php echo ceil($rows->actual_weight); ?></th>
<th><?php echo ceil($rows->dimension_weight); ?></th>
<th><?php echo $ch_wt=ceil($rows->chargeable_weight); ?></th>
<th><?php echo $rate=$rows->rate;?></th>
<th><?php echo $value=$ch_wt*$rate;?></th>
<th><?php  echo round($value*$rows->fuel_charge/100,2);?></th>
<th><?php echo round($rows->invoice_value*$rows->fov/100,2); ?></th>
<th><?php  ?></th>
<th><?php echo $oda=$rows->oda_charge; ?></th>
<th><?php ?></th>
<th><?php echo $total=$value+$oda;?></th>
<th><?php echo $rows->shipment_delivered_on; ?></th>
<th><?php echo $rows->shipment_delivered_on_time; ?></th>
<th><?php echo $rows->remarks; ?></th>
<th><?php echo $rows->edd;?></th>
<th><?php echo $rows->booked_status; ?></th>
</tr>
<?php }  ?>
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
    filename = filename?filename+'.xls':'ConsignorInvoiceReport_<?php echo date('d-m-Y');?>.xls';
    
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