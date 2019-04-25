<?php
$this->load->view("header.php");
//require_once(APPPATH.'modules/master/controllers/Item.php');
//$objj=new Item();

//$list='';

//$list=$objj->item_list();	
//require_once(APPPATH.'core/my_controller.php');
//$obj=new my_controller();
//$CI =& get_instance();
$id=$_GET['id'];
//echo $id;
$tableName='tbl_contact_m';

?>
<script>


function getCid(pnm,pr,pp,unt)
{

	window.close();
	var pid=pnm.split("^");
	var pids=pid[1];
	window.opener.document.getElementById("prd").value=pnm;
	window.opener.document.getElementById("qn").value=1;
	window.opener.document.getElementById("lpr").innerHTML=pp;
	window.opener.document.getElementById("lph").value=pp;
	window.opener.document.getElementById("tot").value=pp;
	window.opener.document.getElementById("nettot").value=pp;
	window.opener.document.getElementById("pri_id").value=pids;
	window.opener.document.getElementById("usunit").value=unt;
	window.opener.document.getElementById("qn").focus();
	
	
}
</script>
	 <!-- Main content -->
	 <div class="main-content">
			
			<!-- Breadcrumb -->
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h4 class="panel-title">Product List</h4>
							<ul class="panel-tool-options"> 
								<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<?php
$conqry=$this->db->query("select * from tbl_contact_m where status='A' and contact_id='$id'");
$sql2 = $conqry->row();?>
<thead>
<tr>
		<th>Serial No.</th>
		<th>Consignor Name</th>
        
</tr>
</thead>
<tbody>
<?php $c_name=$sql2->consignor_singal_id;
$conqry1=$this->db->query("select * from tbl_contact_m where status='A' and contact_id in ($c_name)");
$count=1;
foreach($conqry1->result() as $getCat)
{
?>
<tr class="gradeC record">
<td><?php echo $count++;?></td>
<td><?php echo $after=$getCat->first_name;?></td> 
</tr>
<?php
}?>
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