<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">View Lead</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_leads where lead_id='$ID'");
         $fetch_list=$ItemQuery->row();
?>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Customer:</label> 
<div class="col-sm-4"> 
<select name="contact_id"   class="form-control ui fluid search dropdown email"   disabled="disabled" >
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
<label class="col-sm-2 control-label">*Sales Person:</label> 
<div class="col-sm-4"> 
<select name="sales_person_id"   class="form-control" disabled="disabled" >
	<option value="">----Select ----</option>
				 <?php 
						$sqlgroup=$this->db->query("select * from tbl_user_mst where comp_id !='1'");
						foreach ($sqlgroup->result() as $fetchgroup){
				 ?>
    <option value="<?php echo $fetchgroup->user_id; ?>"<?php if($fetchgroup->user_id==$fetch_list->sales_person_id){?>selected<?php }?>><?php echo $fetchgroup->user_name; ?>    </option>
    <?php } ?>
</select>
</div> 
<input type="hidden" name="popup" value="<?php echo $_GET['popup'];?>" />
<input type="hidden" name="leadid" value="<?php echo $fetch_list->lead_id;  ?>" />
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Lead Number:</label> 
<div class="col-sm-4"> 
<input type="text" name="lead_number"   class="form-control" value="<?php echo $fetch_list->lead_number; ?>" readonly>
</div>

<label class="col-sm-2 control-label">*Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person"   class="form-control" value="<?php echo $fetch_list->contact_person; ?>" readonly>
</div>  
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email_id"   class="form-control" value="<?php echo $fetch_list->email_id; ?>" readonly>
</div> 
<label class="col-sm-2 control-label">*Phone:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="phone"   class="form-control" value="<?php echo $fetch_list->phone; ?>" readonly>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Potential Revenue:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="potential_revenue" value="<?php echo $fetch_list->potential_revenue;?>" class="form-control" readonly >
</div>
<label class="col-sm-2 control-label">Expected Closure Date:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="exptd_closer_date" class="form-control" value="<?php echo $fetch_list->exptd_closer_date; ?>" readonly>
</div>
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Priority:</label> 
<div class="col-sm-4" id="regid"> 
<select name="priority"  class="form-control" disabled="disabled">
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
<select name="source"  class="form-control" disabled="disabled">
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

<?php if($fetch_list->source == 15) { ?>
<div class="form-group">  
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
</div> 
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
<input name="source_others" type="text"  class="form-control" value="<?php echo $fetch_list->source_others ; ?>" readonly="">
</div> 
</div>

<?php  }  ?>

<div class="form-group"> 
<label class="col-sm-2 control-label">Price List:</label> 
<div class="col-sm-4" id="regid"> 
<select name="price_list" class="form-control" disabled="disabled">
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
<input name="competitor" type="text"  class="form-control" value="<?php echo $fetch_list->competitor;?>" readonly />
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Stage:</label> 
<div class="col-sm-4" id="regid"> 
<select name="stage" class="form-control" disabled="disabled">
<option value="">----select----</option>
<?php 
	$sqlprio=$this->db->query("select * from tbl_master_data where param_id='21'");
	foreach ($sqlprio->result() as $fetchPrio){
?>
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->lead_status){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div>
<label class="col-sm-2 control-label">Industry:</label> 
<div class="col-sm-4" id="regid"> 
<select name="industry" class="form-control" disabled="disabled">
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
<textarea name="subject"   class="form-control" readonly><?php echo $fetch_list->subject; ?></textarea>
</div>
<label class="col-sm-2 control-label">Remarks:</label> 
<div class="col-sm-4" id="regid"> 
<textarea name="remarks" class="form-control" readonly ><?php echo $fetch_list->remarks;?></textarea>
</div>
</div>

</div>



<div class="modal-footer" style="margin: -4px 0px -15px 0px;">
<h4 class="modal-title" style="text-align:left">View Activity Log</h4>
<button type="button" style="margin:-40px 0 0px 0px;" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
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
<textarea class="form-control" readonly style="width: 250px;" ><?php echo $fetchgroup->communication;?></textarea>
</div>
</th>
<th>
<div class="col-sm-4"> 
<textarea class="form-control" readonly style="width: 250px;" ><?php echo $fetchgroup->plan_nxt_activity;?></textarea>
</div>
</th>
</tr>
<?php } ?>
</tbody>
</table>
</div>

