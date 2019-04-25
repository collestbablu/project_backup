<?php

$ID=$_GET['ID'];
 
$lead=$this->db->query("select * from tbl_leads where lead_id='$ID' ");
$getLead=$lead->row();

?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add New Activity</h4>
</div>
<div class="modal-body overflow">
<center><strong>LEAD NO : <?php echo $getLead->lead_number;  ?></strong></center></br>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Next Action:</label> 
<div class="col-sm-4"> 
<select name="nxt_action" class="form-control ui fluid search dropdown email"   required >
			<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_master_data where status='A' and param_id='23'");
						foreach ($sqlgroup->result() as $fetchgroup){
					?>
		    <option value="<?php echo $fetchgroup->serial_number; ?>"><?php echo $fetchgroup->keyvalue ; ?></option>
		    <?php } ?>
</select>
</div> 
<input type="hidden" name="popup" value="<?php echo $_GET['popup'];?>" />

<input type="hidden" name="leadid" value="<?php echo $ID;  ?>" />

<label class="col-sm-2 control-label">*Next Action Date:</label> 
<div class="col-sm-4"> 
<input type="date" name="nxt_action_date" class="form-control" required >
</div> 
</div>

<!--<div class="form-group"> 
<label class="col-sm-2 control-label">*Communication:</label> 
<div class="col-sm-4"> 
<textarea name="communication" class="form-control" required ></textarea>
</div> 
<label class="col-sm-2 control-label">*Plan Next Activity:</label> 
<div class="col-sm-4"> 
<textarea name="plan_nxt_activity" class="form-control" required></textarea>
</div> 
</div>-->

</div>

<div class="modal-footer" style="margin: -4px 0px -15px 0px;">
<h4 class="modal-title" style="text-align:left">View Activity Log</h4>
<input type="submit" style="margin:-40px 0 0px 0px;" class="btn btn-sm" data-dismiss="modal1" value="Save">&nbsp;
<button type="button" style="margin:-40px 0 0px 0px;" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>


<div class="modal-body overflow">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead style="background: beige;">
<tr> 
<th style="text-align:center">Next Action</th>
<th style="text-align:center">Next Action Date</th>
<th style="text-align:center">Communication</th>
<th style="text-align:center">Plan Next Activity</th>
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
