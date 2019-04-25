<?php
$contactQuery=$this->db->query("select *from tbl_contact_m where contact_id='$consin'");
$getContact=$contactQuery->row();

?>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Origin:</label> 
<div class="col-sm-4"> 
<select name="origin" class="form-control" id="origin" required >
<option value="">----select----</option>

<?php

$ugroup2=$this->db->query("select distinct(frmOrg) from tbl_contact_dtl where status='A' and contact_id='$consin'");

foreach ($ugroup2->result() as $fetchunit){

$cityQuery=$this->db->query("select * from tbl_master_data where status='A' and serial_number='".$fetchunit->frmOrg."'");
$getCityName=$cityQuery->row();


?>

<option value="<?php  echo $fetchunit->frmOrg ;?>"><?=$getCityName->keyvalue;?></option>
<?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">*Destination:</label> 
<div class="col-sm-4" id="regid"> 
<select name="destination" class="form-control" id="destination" required >
<option value="">--Select--</option>
<?php

$ugroup2=$this->db->query("select * from tbl_contact_dtl where status='A' and contact_id='$consin'");

foreach ($ugroup2->result() as $fetchunit){

$cityQuery=$this->db->query("select * from tbl_master_data where status='A' and serial_number='".$fetchunit->toOrg."'");
$getCityName=$cityQuery->row();


?>

<option value="<?php  echo $fetchunit->toOrg ;?>"><?=$getCityName->keyvalue;?></option>
<?php } ?>
</select>

</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Consignee:</label> 
<div class="col-sm-4" id="regid"> 


<select name="consignee" id='consi' onchange="consinee(this.value);" class="form-control" required >

<option value="">-------select---------</option>
<?php
$ugroup2=$this->db->query("select * from tbl_contact_m where status='A' and group_name='4' ");
foreach ($ugroup2->result() as $fetchunit){



?>

<option value="<?php  echo $fetchunit->contact_id ;?>"<?php if($fetchunit->contact_id==$hrdrow->contact_id){ ?> selected <?php } ?>><?php echo $fetchunit->first_name;?></option>
<?php } ?>
</select>

</div> 
<label class="col-sm-2 control-label">Consignor Mobile No.</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="consignor_mobile" class="form-control" value="<?php echo $getContact->mobile; ?>" required />
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Consignor Email Id.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="consignor_email_id" value="<?php echo $getContact->email; ?>" class="form-control" required <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div> 
<label class="col-sm-2 control-label">Consignee Mobile No.</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" name="consignee_mobile" id="idMobile" class="form-control" value="<?php $branchFetch->consignee_mobile; ?>" required />
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Consignee Email Id.:</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="consignee_email_id" id="idEmail" class="form-control" required <?php if(@$_GET['view']!=''){ ?> readonly="" <?php }?>>
</div> 
<label class="col-sm-2 control-label">Mode</label> 
<div class="col-sm-4" id="regid"> 
<select name="mode" id="mode" onchange="getModeFee(this.value);" class="form-control">
<option value="">--Select--</option>
<option value="Air">Air</option>
<option value="Train">Train</option>
<option value="Surface">Surface</option>
<option value="FTL">FTL</option>
<option value="Dedicated Vehicle">Dedicated Vehicle</option>
</select></div> 
</div>