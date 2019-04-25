<?php
//$this->load->view("header.php");
$id=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Dispatch</h4>
</div>
<?php 
$dispatchQuery=$this->db->query("select * from tbl_dispatch where dispatch_id='".$_GET['ID']."'");
$dispatchFetch=$dispatchQuery->row();
?>
<div class="modal-body overflow">
<div class="form-group"> 
<label class="col-sm-2 control-label">*Dispatch Item:</label> 
<div class="col-sm-4"> 
<input name="dispatch_id"  type="hidden" value="<?=$dispatchFetch->dispatch_id;?>" class="form-control">
<select name="dipatch_item" class="form-control" onchange="checkCust(this.value)" >
	<option value="">----Select----</option>
    <?php
		$contQuery=$this->db->query("select * from tbl_product_stock where type='14'");
		foreach($contQuery->result() as $contRow)
		{
		?>
        	<option value="<?php echo $contRow->Product_id; ?>"<?php if($dispatchFetch->item_id==$contRow->Product_id){?>selected<?php }?>>
			<?php echo $contRow->productname; ?>
			</option>
		<?php } ?>
</select>
</div> 
<label class="col-sm-2 control-label">*Dispatch Qty:</label> 
<div class="col-sm-4"> 
<input name="qty"  type="text" value="<?php echo $dispatchFetch->qty; ?>" class="form-control" required> 
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Dispatch:</label> 
<div class="col-sm-4"> 
<select name="dispatch" class="form-control" onchange="checkCust1(this.value)" >
	<option value="">----Select----</option>
    <?php
		$contQuery=$this->db->query("select * from tbl_master_data where param_id='20'");
		foreach($contQuery->result() as $contRow)
		{
		?>
        	<option value="<?php echo $contRow->serial_number; ?>"<?php if($dispatchFetch->dispatch_status==$contRow->serial_number){?>selected<?php }?>>
			<?php echo $contRow->keyvalue; ?>
			</option>
		<?php } ?>
</select>
</div> 
<div id="check1" <?php if($dispatchFetch->dispatch_status=='24'){?> style="display:none"<?php }?>>
<label class="col-sm-2 control-label">Contact Name:</label> 
<div class="col-sm-4"> 
<select name="contact_id" id="cont_id1" class="form-control" >
	<option value="">----Select----</option>
    <?php
		$contQuery=$this->db->query("select * from tbl_contact_m where group_name='4'");
		foreach($contQuery->result() as $contRow)
		{
		?>
        	<option value="<?php echo $contRow->contact_id; ?>"<?php if($dispatchFetch->contact_id==$contRow->contact_id){?>selected<?php }?>>
			<?php echo $contRow->first_name; ?>
			</option>
		<?php } ?>
</select>
</div> 
</div>
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4"> 
<input name="date"  type="date" value="<?php echo $dispatchFetch->date; ?>" class="form-control" required> 
</div>
<label class="col-sm-2 control-label">Rrmarks:</label> 
<div class="col-sm-4"> 
<textarea name="remarks" class="form-control"><?php echo $dispatchFetch->remarks; ?></textarea> 
</div> 
</div>


</div>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" id="sv1" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
