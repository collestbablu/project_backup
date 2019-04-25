<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Branch Delivery Cost</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_branch_delivery where branchd_id='$ID'");
         $fetch_list=$ItemQuery->row();

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Date:</label> 
<div class="col-sm-4"> 	
<input type="hidden"  name="id" class="form-control" readonly="" value="<?php echo $_GET['ID']; ?>" />
<input type="date" class="form-control" name="date" value="<?php echo $fetch_list->date; ?>" > 
</div> 
<label class="col-sm-2 control-label">*Branch:</label> 
<div class="col-sm-4"> 
<select name="branch" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select *from tbl_master_data where param_id='18'");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>" <?php if($fetch_protype->serial_number==$fetch_list->branch){ ?> selected <?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>

</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Vol. Weight:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" id="vol_wt" name="vol_wt" value="<?php echo $fetch_list->vol_wt; ?>" class="form-control" required >
</div> 
<label class="col-sm-2 control-label">*Total:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" id="tot" name="total" value="<?php echo $fetch_list->total; ?>" class="form-control" required >
</div> 
</div>

<div class="form-group"> 
<label class="col-sm-2 control-label">*Total Weight:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" id="total_vol_weight" name="total_vol_weight" value="<?php echo $fetch_list->total_vol_weight; ?>" class="form-control" required >
</div> 

</div>

<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>