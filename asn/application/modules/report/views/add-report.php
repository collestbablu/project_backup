<?php
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
<h4 class="panel-title">CONSIGNEE/CONSGINOR REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal panel-body-to" method="post" action="searchStock">
<div class="form-group"> 
<label class="col-sm-2 control-label">Name</label> 
<div class="col-sm-3"> 
<input type="text" name="name" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Group Name</label> 
<div class="col-sm-3"> 
<select name="g_name" class="form-control">
<option value="">----Select----</option>
<?php 
$sql1 = $this->db->query("select * from tbl_account_mst where status='A' order by account_name asc");
	foreach ($sql1->result() as $sql2){
?>
<option value="<?php  echo $sql2->account_id ;?>"><?php echo $sql2->account_name;?></option>
<?php } ?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Mobile No.</label> 
<div class="col-sm-3"> 
<input type="text" name="m_no" class="form-control" value="" />
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
        <th>Name</th>
		<th>Group Name</th>   
		<th>Email Id</th>
		<th>Mobile No.</th>
		<th>Address</th>
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($stockSearch)) {
foreach($stockSearch as $rows) {
?>
<tr class="gradeC record">
<th><?php echo $yy++; ?></th>
<th><?php echo $rows->first_name; ?></th>
<th><?php 
$sql1 = $this->db->query("select * from tbl_account_mst where account_id='".$rows->group_name."' ");
	$sql2 = $sql1->row();
	$acc_name=$sql2->account_name; 
	if($acc_name==Consignor){
	?>
<a href='#' style="color:#ec407a" onclick="openpopup('<?=base_url();?>report/Report/viewContactName',1200,500,'id',<?=$rows->contact_id;?>)"><u><?php echo $acc_name;?></u></a>
<?php }else{
echo $acc_name;}?></th>
<th><?php echo $rows->email;?></th><th>
<?php echo $rows->mobile;?></th>	
<th><?php echo $rows->address;?></th>
</tr>
<?php } } ?>
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