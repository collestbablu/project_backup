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
<h4 class="panel-title">CONTACT REPORT </h4>
<ul class="panel-tool-options"> 
<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
</ul>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" action="searchContact">
<div class="form-group panel-body-to"> 
<label class="col-sm-2 control-label">Name</label> 
<div class="col-sm-3"> 
<input type="text" name="p_name" class="form-control" value="" />
</div>
<label class="col-sm-2 control-label">Group Name:</label> 
<div class="col-sm-4"> 
<select name="groupname" class="form-control">
<option value="">---select---</option>
<?php
$ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");
foreach ($ugroup2->result() as $fetchunit){
?>

<option value="<?php  echo $fetchunit->account_id ;?>"><?php echo $fetchunit->account_name;?></option>
<?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">&nbsp;</label>
<label class="col-sm-2 control-label">&nbsp;</label>
<label class="col-sm-2 control-label">&nbsp;</label>
<label class="col-sm-2 control-label">&nbsp;</label>
<label class="col-sm-2 control-label">&nbsp;</label>
<label class="col-sm-2 control-label"><button type="submit" name="Show" class="btn btn-sm" value="Show">Show</button></label>  
</div>
</form>
</div>

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
 		 <th> Name</th>
		<th>Group Name</th>
        <th>Email Id</th>
		<th>Mobile No.</th>
		<th>Phone No.</th>
</tr>
</thead>
<tbody>
<?php
$yy=1;
if(!empty($searchContact)) {
foreach($searchContact as $rows) {
?>
<tr class="gradeC record">
<th><?php echo $rows->first_name;?></th>
<?php
$contactQuery=$this->db->query("select *from tbl_account_mst where account_id='$rows->group_name'");
$getContact=$contactQuery->row();
?>
<th><?=$getContact->account_name;?></th>
<th><?php echo $rows->email; ?>
<th><?php echo $rows->mobile ?></th>	
<th><?php echo $rows->phone ?></th>	
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
$this->load->view("footer.php");
?>