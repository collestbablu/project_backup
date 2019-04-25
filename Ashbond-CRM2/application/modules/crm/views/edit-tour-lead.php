<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Lead</h4>
</div>

<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_tour where tour_id='$ID'");
         $fetch_list=$ItemQuery->row();
?>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Lead Number:</label> 
<div class="col-sm-4"> 
<input type="number" name="lead_number"   class="form-control" value="<?php echo $fetch_list->lead_number; ?>" required>
</div>
<label class="col-sm-2 control-label">*Customer:</label> 
<div class="col-sm-4"> 
<select name="contact_id"   class="form-control ui fluid search dropdown email"   required >
	<option value="">----Select ----</option>
		<?php 
			$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4'");
			foreach ($sqlgroup->result() as $fetchgroup){
		?>
	<option value="<?php echo $fetchgroup->contact_id; ?>"<?php if($fetchgroup->contact_id==$fetch_list->contact_id){?>selected<?php }?>><?php echo $fetchgroup->first_name ; ?>
	</option>
   <?php } ?>
</select>
</div> 
<input type="hidden" name="popup" value="<?php echo $_GET['popup'];?>" />
<input type="hidden" name="tour_id" value="<?php echo $fetch_list->tour_id;  ?>" />
<input type="hidden" name="leadid" value="<?php echo $fetch_list->lead_id;  ?>" />
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Sales Person:</label> 
<div class="col-sm-4"> 
<select name="sales_person_id"   class="form-control" required >
	<option value="">----Select ----</option>
		<?php 
		if($this->session->userdata('user_id')=='1')
		{
			$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='3'");
		}
		else
		{
			$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='3' and comp_id='".$this->session->userdata('comp_id')."' ");
		}
		foreach ($sqlgroup->result() as $fetchgroup){
		?>
	<option value="<?php echo $fetchgroup->contact_id; ?>"<?php if($fetchgroup->contact_id==$fetch_list->sales_person){?>selected<?php }?>><?php echo $fetchgroup->first_name; ?>
	</option>
    <?php } ?>
</select>
</div> 

<label class="col-sm-2 control-label">Expected Closure Date:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="exptd_closer_date" class="form-control" value="<?php echo $fetch_list->exptd_closer_date; ?>">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Priority:</label> 
<div class="col-sm-4" id="regid"> 
<select name="priority"  class="form-control" required>
<option value="">--Select--</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='17'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->priority){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div> 
<label class="col-sm-2 control-label">*Source:</label> 
<div class="col-sm-4" id="regid"> 
<select name="source"  class="form-control" required>
<option value="">--Select--</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='18'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->source){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div> 
</div>


<div class="form-group"> 

<label class="col-sm-2 control-label">Potential Revenue:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="potential_revenue" value="<?php echo $fetch_list->potential_revenue;?>" class="form-control" >
</div>  
<label class="col-sm-2 control-label">*State:</label> 
<div class="col-sm-4" id="regid"> 
<select name="territory" class="form-control" required>
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_state_m where status='A'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->stateid; ?>"<?php if($fetchPrio->stateid==$fetch_list->city){?>selected<?php }?>><?php echo $fetchPrio->stateName ; ?></option>
<?php }?>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Price List:</label> 
<div class="col-sm-4" id="regid"> 
<select name="price_list" class="form-control">
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='20'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->price_list){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div>
<label class="col-sm-2 control-label">Competitor:</label> 
<div class="col-sm-4" id="regid"> 
<input name="competitor" type="text"  class="form-control" value="<?php echo $fetch_list->competitor;?>">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Stage:</label> 
<div class="col-sm-4" id="regid"> 
<select name="stage" class="form-control" required>
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='21'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->tour_status){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div>
<label class="col-sm-2 control-label">*Industry:</label> 
<div class="col-sm-4" id="regid"> 
<select name="industry" class="form-control" required>
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='22'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->industry){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Subject:</label> 
<div class="col-sm-4"> 
<textarea name="subject"   class="form-control" required><?php echo $fetch_list->subject; ?></textarea>
</div> 
<label class="col-sm-2 control-label">Remarks:</label> 
<div class="col-sm-4" id="regid"> 
<textarea name="remarks" class="form-control"><?php echo $fetch_list->remarks;?></textarea>
</div>
</div>

</div>

<div class="modal-header">
<h4 class="modal-title">Add Activity</h4>
</div>

<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4"> 
<input type="date" name="crnt_date" class="form-control" value="" required >
</div> 
</div>

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
<label class="col-sm-2 control-label">*Next Action Date:</label> 
<div class="col-sm-4"> 
<input type="date" name="nxt_action_date" class="form-control" required >
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Communication:</label> 
<div class="col-sm-4"> 
<textarea name="communication" class="form-control" required ></textarea>
</div> 
<label class="col-sm-2 control-label">*Plan Next Activity:</label> 
<div class="col-sm-4"> 
<textarea name="plan_nxt_activity" class="form-control" required></textarea>
</div> 
</div>

</div>


<div class="modal-footer">
<!--<h4 class="modal-title" style="text-align:left">View Activity Log</h4>-->
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>

<!--<div class="modal-body overflow">
<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
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
</div>-->


