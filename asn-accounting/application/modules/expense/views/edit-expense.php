<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Voucher</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_expense where id='$ID'");
         $fetch_list=$ItemQuery->row();

?>

<div class="form-group"> 
<label class="col-sm-2 control-label">Voucher No.</label> 
<div class="col-sm-4" > 
<input name="v_no"  type="number" value="<?php echo $fetch_list->voucherno; ?>"  class="form-control" required>
</div>
<label class="col-sm-2 control-label">&nbsp;</label> 
<div class="col-sm-4" id="regid"> 
&nbsp;
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4"> 	
<input type="hidden"  name="id" class="form-control" readonly="" value="<?php echo $fetch_list->id; ?>" />
<input type="date" class="form-control" id="date" onchange="gg(this.value);" name="date" value="<?php echo $fetch_list->date; ?>" > 
</div> 
<label class="col-sm-2 control-label">*Expense Type:</label> 
<div class="col-sm-4"> 
<select name="exp_type" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id='20'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->exp_type){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
                <?php }?>

					</select>

</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Expense Account:</label> 
<div class="col-sm-4"> 
<select name="exp_account" required class="form-control">
						
					<option value="">--Select--</option>
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='5' ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->exp_account){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>
</div> 
<label class="col-sm-2 control-label">*Name Of Person:</label> 
<div class="col-sm-4"> 
<select name="contact_id" required class="form-control" >
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m where group_name='7' ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->contact_id){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Goods Des.:</label> 
<div class="col-sm-4" > 
<input type="text" required  name="goods_name" value="<?=$fetch_list->goods_name;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">Amount:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number"  name="amount" value="<?=$fetch_list->amount;?>" class="form-control" />

</div> 
</div>


<div class="form-group"> 
<label class="col-sm-2 control-label">Provisional Amt:</label> 
<div class="col-sm-4" > 
<input type="number" min="0"   name="provisional_amount" value="<?=$fetch_list->provisional_amount;?>" class="form-control"/>
</div> 
<label class="col-sm-2 control-label">Paid To</label> 
<div class="col-sm-4" id="regid"> 
<select name="paidto" required class="form-control" >
						
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_contact_m ");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->contact_id;?>" <?php if($fetch_protype->contact_id==$fetch_list->paidTo){ ?> selected <?php }?>><?php echo $fetch_protype->first_name; ?></option>
					<?php } ?>

					</select>

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