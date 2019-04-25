<?
 $ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Activity Log</h4>
</div>
<div class="modal-body overflow">
<center><strong>LEAD ID : <?php echo $ID;  ?></strong></center></br>
</div>
<div class="modal-body overflow">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead style="background: beige;">
<tr> 
<th>Next Action</th>
<th>Next Action Date</th>
<th>Communication</th>
<th>Plan Next Activity</th>
</tr>
</thead>
<tbody>
<?php 
	$sqlgroup=$this->db->query("select * from tbl_activity_log where lead_id='$ID'");
	foreach ($sqlgroup->result() as $fetchgroup){
	?>
<tr>

<th>
<?php
$sqlgroup11=$this->db->query("select * from tbl_master_data where serial_number='$fetchgroup->nxt_action' and param_id='23'");
$rows=$sqlgroup11->row();
echo $rows->keyvalue;?>
</th>
<th><?php echo $fetchgroup->nxt_action_date;?></th>
<th>
<div class="col-sm-4"> 
<textarea  class="form-control" readonly style="width: 290px;" ><?php echo $fetchgroup->communication;?></textarea>
</div>
</th>
<th>
<div class="col-sm-4"> 
<textarea class="form-control" readonly style="width: 290px;" ><?php echo $fetchgroup->plan_nxt_activity;?></textarea>
</div>
</th>

</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>