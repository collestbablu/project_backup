<?php 
$ID=$_GET['ID'];
?>

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Contact</h4>
</div>

<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_contact_m where contact_id='$ID'");
     $fetch_list=$ItemQuery->row();

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Company Name:</label> 
<div class="col-sm-4"> 						
<input type="hidden" name="contact_id" value="<?php echo $fetch_list->contact_id;?>" />
<input type="text" class="form-control" name="first_name" required value="<?php echo $fetch_list->first_name;?>"> 
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
<select name="maingroupname" class="form-control" required id="contact_id_copy5">
	<option value="">-------select---------</option>
	<?php $ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");
	foreach ($ugroup2->result() as $fetchunit){
	?>
	<option value="<?php  echo $fetchunit->account_id ;?>"<?php if($fetchunit->account_id==$fetch_list->group_name){?>selected<?php }?>><?php echo $fetchunit->account_name;?></option>
	<?php } ?>
</select>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Primary Contact:</label> 
<div class="col-sm-4"> 
<input type="text" name="primary_contact" value="<?php echo $fetch_list->contact_person;?>" class="form-control">
</div>
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4"> 
<input type="text" name="email" value="<?php echo $fetch_list->email;?>" class="form-control"></div>  
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="tel" minlength="10" maxlength="10" name="mobile" value="<?php echo $fetch_list->mobile;?>" class="form-control" required>
</div>  
<label class="col-sm-2 control-label">Fax:</label> 
<div class="col-sm-4"> 
<input type="text" name="fax" value="<?php echo $fetch_list->fax;?>" class="form-control">
</div>
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Code:</label> 
<div class="col-sm-4"> 
<input type="text" name="code" value="<?php echo $fetch_list->code_name;?>" class="form-control" required>
</div>  
<label class="col-sm-2 control-label">*State:</label> 
<div class="col-sm-4"> 
<select name="state_id" class="form-control" required>
<option value="">--Select--</option>
<?php
$stateQquery=$this->db->query("select * from tbl_state_m where status='A'");
foreach($stateQquery->result() as $getState){
?>

<option value="<?=$getState->stateid;?>"<?php if($getState->stateid==$fetch_list->state_id){?>selected<?php }?>><?=$getState->stateName;?></option>
<?php
}
?>
</select>
</div>
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">Address1:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" style="height:150px;" name="address1" ><?php echo $fetch_list->address1;?></textarea>
</div>  
</div>

<div class="form-group" style="display:none;"> 

<table id="button_pro1" class="table table-striped table-bordered table-hover" style="width:96%; margin:auto;">
	<th>Name</th>
	<th>Email Address</th>
	<th>Mobile</th>
	<th>Designation</th>
	<th></th>

 <?php
 
$preQuery=$this->db->query("SELECT * FROM tbl_contact_person where contact_id='$ID'");
foreach($preQuery->result() as $preFetch){  ?>

<input type="hidden" name="contact_person_id[]" value="<?php echo $preFetch->person_id; ?>" />

<tr>
<td><input id="input_1" type="text" name="val[]" class='form-control' value="<?php echo $preFetch->p_name; ?>"/></td><td><input id="input_1"  type="email" name="valemail[]" class='form-control' value="<?php echo $preFetch->p_email; ?>"/></td><td><input id="input_1"  type="text" name="valmobile[]" class='form-control' value="<?php echo $preFetch->p_phone; ?>"/></td><td><input id="input_1" type="text" name="desi[]" value="<?php echo $preFetch->designation; ?>" class='form-control'/></td><td><img class="add right" style="width:20px;float: none;" onclick="addRow('button_pro1')" src="<?php echo base_url();?>assets/image_icon/add.png" /></td>
</tr>
<?php } ?>
</table>

</div>

</div>

<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>