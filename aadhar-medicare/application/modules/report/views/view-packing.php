<b style="display:none">
<?php
$this->load->view("header.php");
?>
</b>

<div class="modal-header">
<h4 class="modal-title">View Packing</h4>
</div>
<div class="modal-body overflow">

<table class="table table-striped table-bordered table-hover"  >
<thead>
<tr>
<th>Packed Qty</th>
<th>Date</th>
</tr>
</thead>
<?php 

	$query=$this->db->query("select * from tbl_production_log where packing_id='".$_GET['ID']."'");	
	//$fetchq=$query->row();
	foreach($query->result() as $fetchq)
	{
	
?>
<tr>
<th><?php 
//echo $rows;
/* if($rows==0){?>0<?php }else{echo $check=$fetchqrow->qty;}
$tot=$fetchq->qty;
$rest=$tot-$check; */
echo $fetchq->qty;
?></th>
<th><?php echo $fetchq->date;?></th>
</tr>
<?php } ?>
</table>

</div>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" >
<tbody>
<tr class="gradeA">
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th><a onclick="popupclose(this.value)" class="btn btn-secondary  btn-sm">Cancel</a></th>
</tr>
</tbody>
</table>
</div>


