<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Salary</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_salary where id='$ID'");
         $fetch_list=$ItemQuery->row();

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Name of Employee:</label> 
<div class="col-sm-4"> 	
<input type="hidden"  name="id" class="form-control" readonly="" value="<?php echo $fetch_list->id; ?>" />
<select name="contact_id" class="form-control" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='7'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->contact_id){?> selected="selected" <?php }?>><?=$fetch_protype->first_name;?></option>

<?php }?>
</select></div> 
<label class="col-sm-2 control-label">*Department:</label> 
<div class="col-sm-4"> 
<select name="department" class="form-control">
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_master_data where param_id='22'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->serial_number;?>" <?php if($getPaymentMode->serial_number==$fetch_list->department){?> selected="selected" <?php }?>><?=$getPaymentMode->keyvalue;?></option>

<?php }?>
</select>

</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Location:</label> 
<div class="col-sm-4"> 
<select name="loc_id" class="form-control" >
<option value="">--Select--</option>
<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id='21'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
<option value="<?=$fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->loc_id){?> selected="selected" <?php }?>><?=$fetch_protype->keyvalue;?></option>

<?php }?>
</select>
</div> 
<label class="col-sm-2 control-label">*Basic Salary:</label> 
<div class="col-sm-4"> 
<input type="text" required  name="basic_salary" id="basic_salary" onkeyup="cal();" value="<?=$fetch_list->basic_salary;?>" class="form-control" readonly="readonly"/></div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*HRA:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="hra" onkeyup="cal();" readonly="readonly" id="hra" value="<?=$fetch_list->hra;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">*Conveyance:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number"  name="conveyance" onkeyup="cal();" readonly="readonly" id="conveyance" value="<?=$fetch_list->conveyance;?>" class="form-control" required/>

</div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">*EFP%:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="epf" id="epf" readonly="readonly" onkeyup="cal();" value="<?=$fetch_list->epf;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">*TDS Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number"  name="tds_amount" readonly="readonly" id="tds_amount" onkeyup="cal();" value="<?=$fetch_list->tds_amount;?>" class="form-control" required/>

</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">Advance:</label> 
<div class="col-sm-4" > 
<input type="text"  name="advance" id="advance"  onkeyup="Advcal();" value="<?=$fetch_list->advance;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">Deduction:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number"  name="deduction" id="deduction" onkeyup="Dedcal();" value="<?=$fetch_list->deduction;?>" class="form-control" required/>

</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Work Days:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="work_days" onkeyup="cal();" id="work_days" value="<?=$fetch_list->work_days;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">*EPF Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" readonly="readonly" id="epf_amount"  name="epf_amount" value="<?=$fetch_list->epf_amount;?>" class="form-control" required/>

</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Net Pay:</label> 
<div class="col-sm-4" > 
<input type="text" required readonly="readonly" id="net_pay500"  name="net_pay" value="<?=$fetch_list->net_pay;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">&nbsp;</label> 
<div class="col-sm-4" id="regid"> 
&nbsp;

</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Payment Mode:</label> 
<div class="col-sm-4" > 
<select name="payment_mode" class="form-control" required>
<option value="">--Select--</option>
<?php
$paymentModeQuery=$this->db->query("select *from tbl_master_data where param_id='19'");
foreach($paymentModeQuery->result() as $getPaymentMode)
{

?>
<option value="<?=$getPaymentMode->serial_number;?>" <?php if($getPaymentMode->serial_number==$fetch_list->payment_mode){?> selected="selected" <?php }?>><?=$getPaymentMode->keyvalue;?></option>
<?php }?>
</select>
</div> 
<label class="col-sm-2 control-label"><?php if($fetch_list->payment_mode=='26')
{
	?>
Paid To <?php }?></label> 
<div class="col-sm-4" id="regid"> 
<?php if($fetch_list->payment_mode=='26')
{
	?>
<input type="text" name="paid_to" value="<?=$fetch_list->paid_to;?>"  class="form-control" /><?php }?>

</div> 
</div>



<?php
if($fetch_list->payment_mode=='27')
{

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">Cheque Date:</label> 
<div class="col-sm-4" > 
<input type="date" name="cheque_date" value="<?=$fetch_list->cheque_date;?>" class="form-control" />
</div>

<label class="col-sm-2 control-label">Cheque Number</label> 
<div class="col-sm-4" id="regid"> 
<input type="text" name="cheque_number" value="<?=$fetch_list->cheque_number;?>"  class="form-control" /></div> 
</div>
<?php }?>


<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>