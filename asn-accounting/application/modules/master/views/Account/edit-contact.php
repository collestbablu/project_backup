<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Contact</h4>
</div>
<div class="modal-body overflow">

<?php
	 $ContactQuery=$this->db->query("select * from tbl_contact_m where contact_id='$ID'");
         $branchFetch=$ContactQuery->row();

?>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Name:</label> 
<div class="col-sm-4"> 				
<input type="hidden" name="contact_id" value="<?php echo $branchFetch->contact_id; ?>" />
<input type="text" name="first_name" value="<?php echo $branchFetch->first_name; ?>" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 

	  <input type="hidden" name="grpname" value="<?php echo $branchFetch->contact_id;?>" />
<select name="maingroupname" class="form-control" required id="contact_id_copy5">

<option value="">-------select---------</option>

<?php

$ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");

foreach ($ugroup2->result() as $fetchunit){

?>
<option value="<?php  echo $fetchunit->account_id ;?>"<?php if($fetchunit->account_id==$branchFetch->group_name){ ?> selected <?php } ?>><?php echo $fetchunit->account_name;?></option>
<?php } ?>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Contact Person:</label> 
<div class="col-sm-4"> 
<input type="text" name="contact_person" value="<?php echo $branchFetch->contact_person?>" class="form-control">
</div> 
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4"> 
<input type="email" name="email" value="<?php echo $branchFetch->email; ?>" class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="tel" minlength="10" maxlength="10" id="mobile" name="mobile" title="10 digit mobile number"  value="<?php echo $branchFetch->mobile; ?>" class="form-control" >
</div> 

<label class="col-sm-2 control-label">Phone No.:</label> 
<div class="col-sm-4" id="regid"> 
 <input type="text" maxlength="10"  pattern="[0-9]{10}" title="Enter your 10 phone number" name="phone" value="<?php echo $branchFetch->phone; ?>" class="form-control">
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Pan No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="pan_no" pattern1=".{10,10}" maxlength="10" id="pan" placeholder="PAN No 10 digist" title="PAN Number must be 10 character" value="<?php echo $branchFetch->pan_no; ?>"  class="form-control">
</div> 
<label class="col-sm-2 control-label">GSTIN No:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="tin_no" id="gstin"  placeholder="GSTIN" value="<?php echo $branchFetch->tin; ?>" class="form-control">

</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Basic Salary:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="basic" value="<?php echo $branchFetch->basic_salary; ?>" class="form-control">
</div> 
<label class="col-sm-2 control-label">HRA:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="hra" value="<?php echo $branchFetch->hra; ?>" class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">Conveyance:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="convnc" value="<?php echo $branchFetch->conveyance; ?>" class="form-control">
</div> 
<label class="col-sm-2 control-label">EPF%:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="epf" value="<?php echo $branchFetch->epf; ?>" class="form-control">
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">TDS Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="tds_amt" value="<?php echo $branchFetch->tds; ?>" class="form-control">
</div> 
<label class="col-sm-2 control-label" style="display:none">CST No:</label> 
<div class="col-sm-4" id="regid" style="display:none"> 
<input type="text" name="cst_no" value="<?php echo $branchFetch->cst; ?>" class="form-control">
</div> 
</div>



<div class="form-group"> 
<label class="col-sm-2 control-label">Address1:</label> 
<div class="col-sm-4" id="regid"> 
<textarea class="form-control" name="address1"><?php echo $branchFetch->address1; ?> </textarea>
</div>  
<label class="col-sm-2 control-label">Address2:</label> 
<div class="col-sm-4" id="regid"> 
<textarea class="form-control" name="address3"><?php echo $branchFetch->address3; ?> </textarea>

</div> 
</div>
<div class="table-responsive">
<INPUT type="button" value="Add Row" class="btn btn-sm" onclick="addRow1('dataTable1')" />

	<INPUT type="button" class="btn btn-secondary btn-sm" value="Delete Row" onclick="deleteRow('dataTable')" />
<table class="table table-striped table-bordered table-hover" id="dataTable1" >
<tbody>
<tr class="gradeA">
<th>Check</th>

<th >Origin</th>
<th >Destination</th>
<th >Air</th>
<th >Train</th>
<th>Surface</th>
</tr>
<?php
$contactDataQuery=$this->db->query("select *from tbl_contact_dtl where contact_id='".$_GET['ID']."'");
foreach($contactDataQuery->result() as $getDataContact)
{


?>

<tr class="gradeA">
<th >
<input type="checkbox" name="chkbox[]"  />


</th>




<th >
<select name="frmOrg[]" class="form-control" >
<option value="">--Select--</option>
<?php

	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
<option value="<?=$getContact->serial_number;?>" <?php if($getContact->serial_number==$getDataContact->frmOrg){?> selected="selected" <?php }?>><?=$getContact->keyvalue;?></option>

<?php }?>
</select>

</th>


<th >
<select name="toOrg[]" class="form-control" >
<option value="">--Select--</option>
<?php

	$contactQuery=$this->db->query("select *from tbl_master_data where param_id='18'");
	foreach($contactQuery->result() as $getContact){
	?>
<option value="<?=$getContact->serial_number;?>" <?php if($getContact->serial_number==$getDataContact->toOrg){?> selected="selected" <?php }?>><?=$getContact->keyvalue;?></option>

<?php }?>
</select>

</th>


<th >
<input type="number" step="any" min="0"   name="rateAir[]" value="<?=$getDataContact->rateAir;?>"   class="form-control"> 
</th>


<th >
<input type="number" step="any" min="0"   name="rateTrain[]" value="<?=$getDataContact->rateTrain;?>"   class="form-control"> 
</th>

<th >
<input type="number" step="any" min="0"   name="rateSurface[]" value="<?=$getDataContact->rateSurface;?>"   class="form-control"> 
</th>
</tr>
<?php }?>


</tbody>
</table>

</div>
</div>

<div class="modal-footer">
<input type="submit" class="btn btn-sm" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
