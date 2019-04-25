<?php 
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Tour</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_tour where tour_id='$ID'");
         $fetch_list=$ItemQuery->row();

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Customer.:</label> 
<div class="col-sm-4"> 	
<select name="contact_id"   class="form-control ui fluid search dropdown email"   required >
		<option value="">----Select ----</option>
				<?php 
				 $sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='4'");
				 foreach ($sqlgroup->result() as $fetchgroup){
				?>
	    <option value="<?php echo $fetchgroup->contact_id; ?>"<?php if($fetchgroup->contact_id==$fetch_list->contact_id){?>selected<?php }?>><?php echo $fetchgroup->first_name ; ?>				        </option>
        <?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">*Sales Person:</label> 
<div class="col-sm-4"> 
<select name="sales_person_id" required  class="form-control">
	<option value="">----Select ----</option>
			<?php 
				//$sqlgroup=$this->db->query("select * from tbl_contact_m where group_name='3'");
				//foreach ($sqlgroup->result() as $fetchgroup){						
			?>		
			<?php 
			if($this->session->userdata('user_id')=='1')
			 {
				$sqlgroup=$this->db->query("select * from tbl_user_mst where comp_id !='1' ");
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
<input type="hidden"  name="tour_id" class="form-control" value="<?php echo $fetch_list->tour_id; ?>" />
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person"   class="form-control" value="<?php echo $fetch_list->contact_person; ?>" required>
</div>  
<label class="col-sm-2 control-label">*Email Id:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="email_id"   class="form-control" value="<?php echo $fetch_list->email_id; ?>" required>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Phone:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="phone"   class="form-control" value="<?php echo $fetch_list->phone; ?>" required>
</div> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4" id="regid"> 
<input type="date" name="date" value="<?php echo $fetch_list->date; ?>" class="form-control" required>
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
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*State:</label> 
<div class="col-sm-4" id="regid"> 
<select name="state_id" required  class="form-control ui fluid search dropdown email">
	<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_state_m");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->stateid; ?>"<?php if($fetchgroup->stateid==$fetch_list->state){?>selected<?php }?>><?php echo $fetchgroup->stateName; ?></option>
    <?php } ?>
</select>
</div>
<label class="col-sm-2 control-label">*Source:</label> 
<div class="col-sm-4" id="regid"> 
<select name="source"  class="form-control" onChange="SourceEditOthers(this.value)" required>
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

<div class="form-group" id="sourceidedit" <?php if($fetch_list->source == 15){} else { ?> style="display:none" <?php } ?>> 
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
</div>
<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4" id="regid"> 
<input name="source_others" type="text"  class="form-control" value="<?=$fetch_list->source_others?>" >
</div>
 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Subject:</label> 
<div class="col-sm-4"> 
<textarea name="subject"   class="form-control" required><?php echo $fetch_list->subject; ?></textarea>
</div> 
<label class="col-sm-2 control-label">Remarks:</label> 
<div class="col-sm-4"> 
<textarea name="remarks"   class="form-control" ><?php echo $fetch_list->remarks; ?></textarea>
</div> 
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>