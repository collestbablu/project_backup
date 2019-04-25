<?php
$tableName="tbl_docket_entry";
$this->load->view("header.php");
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
<h4 class="panel-title">DOCKET REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal panel-body-to" method="get" action="totalsearchStock">
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
<input type="date" name="fdate" class="form-control" value="<?php echo date('Y-m-d');?>" />
</div>
<label class="col-sm-2 control-label">To Date</label> 
<div class="col-sm-3"> 
<input type="date" name="tdate" class="form-control" value="<?php echo date('Y-m-d');?>" /> 
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
<label class="col-sm-2 control-label"><button type="submit" name="Show" class="btn btn-info" value="Show">Show</button></label>  
</div>
</form>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
 		<th>Serial No.</th>
		<th>Docket No.</th>
        <th>Docket Date</th>  
		<th>Consignor</th>
		<th>Consignee</th>
		<th>Origin</th>
		<th>Destination</th>
		<th>Mode</th>
		<th>No of Packg</th>
		<th>Actual wt.</th>
		<th>Dimensional Wt.</th>
		<th>Chargeable wt.</th>
		<th>Rate</th>
		<th>Value</th>
		<th>Open pickup/delivery</th>
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
<tbody>
<?php
	@extract($_GET);
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
		$queryy.=" order by  booking_date asc ";
		
	}
	else
	{
		$queryy="select * from $tableName where status='I'";
}
		$result=$this->db->query($queryy);
$yy=1;
foreach(@$result->result() as $rows) {
?>
<tr class="gradeC record">
<th><?php echo $yy++; ?></th>
<th><?php echo $rows->docket_no; ?></th>
<th><?php 
$dt=$rows->booking_date;
echo $newDate = date("d-m-Y", strtotime($dt));
 ?></th>
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
<th><?php  ?></th>
<th><?php echo $oda=$rows->oda_charge; ?></th>
<th><?php echo $rows->other_charges;?></th>
<th><?php echo $total=$value+$oda;?></th>
<th><?php echo $rows->shipment_delivered_on; ?></th>
<th><?php echo $rows->shipment_delivered_on_time; ?></th>
<th><?php echo $rows->remarkss; ?></th>
<th><?php echo $rows->edd;?></th>
<th><?php echo $rows->booked_status; ?></th>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php
$this->load->view("footer.php");
?>