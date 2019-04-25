<?
 $ID=$_GET['ID'];
?>
<!--<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Activity</h4>
</div>
<div class="modal-body overflow">
<center><strong>LEAD NO : <?php echo $ID;  ?></strong></center></br>

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

<div class="form-group"> 
<label class="col-sm-2 control-label">*Current Date:</label> 
<div class="col-sm-4"> 
<input type="date" name="crnt_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required >
</div> 
<label class="col-sm-2 control-label">*Communication:</label> 
<div class="col-sm-4"> 
<textarea name="communication" class="form-control" required ></textarea>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Plan Next Activity:</label> 
<div class="col-sm-4"> 
<textarea name="plan_nxt_activity" class="form-control" required></textarea>
</div> 
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>-->

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Activity Log</h4>
</div>

<div class="modal-body overflow">
<center><strong>LEAD ID : <?php echo $ID;  ?></strong></center></br>
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead style="background: beige;">
<tr> 
<th>Next Action</th>
<th>Current Date</th>
<th>Communication</th>
<th>Next Action Date</th>
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
<th><?php echo $fetchgroup->crnt_date;?></th>
<th><?php echo $fetchgroup->communication;?></th>
<th><?php echo $fetchgroup->nxt_action_date;?></th>
<th><?php echo $fetchgroup->plan_nxt_activity;?></th>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>