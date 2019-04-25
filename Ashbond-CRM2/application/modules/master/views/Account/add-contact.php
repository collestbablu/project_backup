<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Contact List</h4>
</div>
<div class="modal-body overflow">

<div class="form-group"> 
<label class="col-sm-2 control-label">*Company Name:</label> 
<div class="col-sm-4"> 						
<input type="text" class="form-control" name="first_name"  value="" required> 
</div> 
<label class="col-sm-2 control-label">*Group Name:</label> 
<div class="col-sm-4"> 
<select name="maingroupname" class="form-control" required>

<option value="">-------select---------</option>
<?php $ugroup2=$this->db->query("select * from tbl_account_mst where status='A'");
foreach ($ugroup2->result() as $fetchunit){
?>
<option value="<?php  echo $fetchunit->account_id ;?>"><?php echo $fetchunit->account_name;?></option>
<?php } ?>
</select>
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Primary Contact:</label> 
<div class="col-sm-4"> 
<input type="text" name="primary_contact" value=""class="form-control">
</div>
<label class="col-sm-2 control-label">Email Id:</label> 
<div class="col-sm-4"> 
<input type="text" name="email" value="" class="form-control">
</div>  
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Mobile No.:</label> 
<div class="col-sm-4"> 
<input type="number" name="mobile" value="" class="form-control" required >
</div>  
<label class="col-sm-2 control-label">Fax:</label> 
<div class="col-sm-4"> 
<input type="text" name="fax" value="" class="form-control">
</div>
</div>

<div class="form-group"> 
<!--<label class="col-sm-2 control-label">Gst No:</label> 
<div class="col-sm-4"> 
<input type="text" name="gst_no" value="" class="form-control">
</div>  -->
<!--<label class="col-sm-2 control-label">IT Pan:</label> 
<div class="col-sm-4"> 
<input type="text" name="it_pan" value=""  class="form-control">
</div> -->

</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Code:</label> 
<div class="col-sm-4"> 
<input type="text" name="code" value="" class="form-control" required >
</div>  
<label class="col-sm-2 control-label">*State:</label> 
<div class="col-sm-4"> 
<select name="state_id" class="form-control" required>
<option value="">--Select--</option>
<?php
$stateQquery=$this->db->query("select * from tbl_state_m where status='A'");
foreach($stateQquery->result() as $getState){
?>
<option value="<?=$getState->stateid;?>"><?=$getState->stateName;?></option>
<?php } ?>
</select>
</div>
</div>

<div class="form-group"> 
<!--<label class="col-sm-2 control-label">Currency:</label> 
<div class="col-sm-4"> 
<select name="currency" class="form-control">
<option value="">--Select--</option>
<option value="USD $">USD $</option>
<option value="EUR &euro;">EUR &euro;</option>
<option value="GBP &pound;">GBP &pound;</option>
<option value="INR &#8377;">INR &#8377;</option>
</select>
</div>
-->
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Address1:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" style="height:150px;" name="address1" ></textarea>
</div>  
<!--<label class="col-sm-2 control-label">Address2:</label> 
<div class="col-sm-4"> 
<textarea class="form-control" name="address3" style="height:150px;"></textarea>
</div>-->
</div>

</div>
<div class="modal-footer">
<input type="button" class="btn btn-sm"  id="formContact" value="Save" onclick="contactSave();">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</div>
