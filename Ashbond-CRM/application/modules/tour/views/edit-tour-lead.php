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
<label class="col-sm-2 control-label">*Customer:</label> 
<div class="col-sm-4"> 
<select name="contact_id"  id="contact_id_tour" class="form-control ui fluid search dropdown email"  onchange="genrateLeadNoTour();" required >
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
<select name="sales_person_id" id="sales_person_id_tour"  class="form-control" onchange="genrateLeadNoTour();"  required >
	<option value="">----Select ----</option>
		<?php 
		if($this->session->userdata('user_id')=='1')
		{
			$sqlgroup=$this->db->query("select * from tbl_user_mst where comp_id !='1'");
		}
		else
		{
			$sqlgroup=$this->db->query("select * from tbl_user_mst where comp_id='".$this->session->userdata('comp_id')."' ");
		}
		foreach ($sqlgroup->result() as $fetchgroup){
		?>
	<option value="<?php echo $fetchgroup->user_id; ?>"<?php if($fetchgroup->user_id==$fetch_list->sales_person_id){?>selected<?php }?>><?php echo $fetchgroup->user_name; ?>
	</option>
    <?php } ?>
</select>
</div> 
<input type="hidden" name="tour_id" value="<?php echo $fetch_list->tour_id;  ?>" />
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Lead Number:</label> 
<div class="col-sm-4"> 
<input type="text" name="lead_number" id="lead_number_tour"  class="form-control" value="<?php echo $fetch_list->lead_number; ?>" readonly required>
</div>
<label class="col-sm-2 control-label">*Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person"   class="form-control" value="<?php echo $fetch_list->contact_person; ?>" required>
</div>  
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email_id"   class="form-control" value="<?php echo $fetch_list->email_id; ?>" required>
</div> 
<label class="col-sm-2 control-label">*Phone:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="phone"   class="form-control" value="<?php echo $fetch_list->phone; ?>" required>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Potential Revenue:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="potential_revenue" value="<?php echo $fetch_list->potential_revenue;?>" class="form-control" >
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
<select name="source"  class="form-control" onChange="SourceOthers(this.value)" required>
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

<div class="form-group" id="sourceid" <?php if($fetch_list->source == 15){} else { ?> style="display:none;"<?php } ?> >  
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
</div> 
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
<input name="source_others" type="text"  class="form-control" value="<?php echo $fetch_list->source_others;?>">
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
<option value="<?php echo $fetchPrio->serial_number; ?>"<?php if($fetchPrio->serial_number==$fetch_list->lead_status){?>selected<?php }?>><?php echo $fetchPrio->keyvalue ; ?></option>
<?php }?>
</select>
</div>
<label class="col-sm-2 control-label">Industry:</label> 
<div class="col-sm-4" id="regid"> 
<select name="industry" class="form-control" >
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


<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>



